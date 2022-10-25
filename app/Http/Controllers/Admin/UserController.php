<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\User;
use App\Activity;
use App\TypeUser;
use App\Models\SaveIp;
use App\Sms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function index()
    {
        $items = User::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.user.index', compact('items'), ['title' => 'لیست کاربران']);
    }

    public function user_search(Request $request)
    {
        $user_name = explode(' ', $request->search);
        if (count($user_name) > 1) {
            $items = User::where('name', 'LIKE', "%$user_name[0]%")->where('lname', 'LIKE', "%$user_name[1]%")->paginate(40);
        } else {
            $items = User::where('name', 'LIKE', "%$user_name[0]%")->paginate(40);
        }
        return view('admin.user.index', compact('items'), ['title' => 'لیست کاربران']);
    }

    public function send_message(Request $request)
    {
//        return $request->message;
        $numbers_array = [];
        $users = User::select('mobile')->distinct()->get();
        try {
            foreach ($users as $user) {
                if (strlen($user->mobile) == 11) {
                    array_push($numbers_array, $user->mobile);
                }
            }
            $numbers = implode(',', $numbers_array);
            Sms::sendMessage($request->message, $numbers);
            return redirect()->back()->with(['status' => 'success', "message" => 'پیام مورد نظر با موفقیت ارسال شد']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    public function asign_branch(Request $request, $id)
    {
        // try {
        //     $item = User::find($id);
        //     if ($request->branch_id == 0) {
        //         $item->branch_id = 0;
        //         $item->status = 4;
        //         $item->update();
        //         $item->removeRole('مدیریت انبار');
        //         return redirect()->back()->with(['status' => 'success', "message" => 'شعبه از کاربر گرفته شد']);
        //     }
        //     $item->branch_id = $request->branch_id;
        //     $item->status = 1;
        //     $item->update();
        //     $item->assignRole('مدیریت انبار');
        //     return redirect()->back()->with(['status' => 'success', "message" => 'شعبه اختصاص یافت']);

        // } catch (\Exception $e) {

        //     return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        // }
        // try {
        if (auth()->user()->getRoleNames()->first()=='ادمین ارشد') {
            $user = User::find($id);

            foreach ($user->getRoleNames() as $role_name) {
                $user->removeRole($role_name);
            }
            $user->assignRole($request->branch_id);

            return redirect()->back()->with(['status' => 'success', "message" => 'رول اختصاص یافت']);
        }
        abort(503, 'You Access Denied');
        // } catch (\Exception $e) {

        //     return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        // }
    }

    public function ban()
    {
        $items = User::where('alarm', 1)->get();
        return view('admin.club.user.ban', compact('items'), ['title' => 'کاربران متخلف']);

    }

    public function exitBan($id)
    {

        $items = User::find($id);

        try {
            $items->alarm = 0;
            $items->save();
            return redirect('admin/club-ban-user')->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);


        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);

        }
    }

    public function delete($id)
    {
        $item = User::find($id);
        try {

            $item->delete();

            return redirect('admin/club-black-user')->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);

        } catch (\Exception $e) {

            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::where('mobile', $request->mobile)->first();
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => "رمزعبورها یکسان نیست"]);
        }
        if ($user) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'این شماره قبلا برای ' . $user->name . ' ' . $user->lname . ' ثبت شده است']);
        }
        $user = new User();
        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->birthday = \Carbon\Carbon::now();
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        
        foreach ($user->getRoleNames() as $role_name) {
            $user->removeRole($role_name);
        }
        $user->assignRole('کاربر');

        return redirect()->back()->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);
    }

    public function fast_login($id) 
    {
        if(auth()->user()->getRoleNames()->first() == "ادمین ارشد") {
            auth()->loginUsingId($id);
            return redirect('admin');
        }
        return false;
    }

    public function update(Request $request, $id)
    {
//        $this->validate($request,[
//            'mobile' => 'required|unique:users'.$id
//        ]);

        $user = User::where('id', '!=', $id)->where('mobile', $request->mobile)->first();
        if ($user) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'این شماره قبلا برای ' . $user->name . ' ' . $user->lname . ' ثبت شده است']);
        }




        $user = User::find($id);

        $score = (int)$request->score  - (int)$user->score;


        if ($user->score != $request->score) {
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' ادمین  ' . '(' . $score . ')' . 'امتیاز از امتیاز کاریر : ' . '(' .$user->name . '' . $user->lname .') تغییر داد. ' ;
            $user->activity()->save($activity);
        }


        $user->name = $request->name;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->score = $request->score;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        return redirect()->route('admin-user-list')->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);
    }

    public function show_ip() {
        return view('admin.user.ip.edit', ['title' => 'لیست نشست ها']);
    }

    public function edit_ip(Request $request) {
        if (auth()->user()->getRoleNames()->first()=='ادمین ارشد') {
            $ip = SaveIp::findOrFail($request->id);
        } else {
            $ip = auth()->user()->ip()->findOrFail($request->id);
        }
        $ip->status = $request->status;
        $ip->save();
        return redirect()->back()->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);
    }
}
