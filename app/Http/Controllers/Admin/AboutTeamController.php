<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\About;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\AboutTeam;
use App\ProductCategoryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AboutTeamController extends Controller
{

    // Construct Function
    public function __construct()
    {
//        $this->middleware(['auth', 'clearance']);
        $this->middleware(['auth','Admin']);
    }

    // update title Function
    public function title_update(Request $request)
    {
        $item = About::findOrFail(1);
        $validator = Validator::make($request->all(), [
            'title_team' => 'required|max:200',
            'text_team' => 'nullble|max:500',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item->title_team = $request->title_team;
            $item->text_team = $request->text_team;
            $item->update();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = 'عنوان و متن سرمایه انسانی را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
    // Create Function
    public function create()
    {
        return view('admin.about.team.create', ['title' => 'افزودن سرمایه انسانی']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'name' => 'required|max:200',
            'job' => 'required|max:200',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'phone' => 'nullable|regex:/(0)[0-9]{10}/|digits:11|numeric',
            'pic' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = AboutTeam::create([
                'type' => $request->type,
                'name' => $request->name,
                'job' => $request->job,
                'email' => $request->email,
                'linkedin' => $request->linkedin,
                'phone' => $request->phone,
            ]);
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/team/photos/', 'pic-');;
                $item->save();
            }
//            store_lang($request,'about_f',$item->id,['title','text']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' سرمایه انسانی : ' . '(' . $request->name . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = AboutTeam::find($id);
        return view('admin.about.team.edit', compact('item'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = AboutTeam::find($id);
        $old_name = $item->name;
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'name' => 'required|max:200',
            'job' => 'required|max:200',
            'email' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'phone' => 'nullable|regex:/(0)[0-9]{10}/|digits:11|numeric',
            'pic' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->type = $request->type;
            $item->name = $request->name;
            $item->job = $request->job;
            $item->email = $request->email;
            $item->linkedin = $request->linkedin;
            $item->phone = $request->phone;
            if ($request->hasFile('pic')) {
                if (is_file($item->pic)) {
                    $old_path = $item->pic;
                    File::delete($old_path);
                }
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/team/photos/', 'pic-');;
            }
            $item->update();


//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    $lang->delete();
//                }
//            }
//            store_lang($request,'about_f',$item->id,['title','text']);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' سرمایه انسانی : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index(ProductCategoryHelper $ProductCategoryHelper)
    {
        $items = AboutTeam::orderBy('id', 'DESC')->get();
        $about=About::firstOrFail();
        return view('admin.about.team.index', compact('items','about'), ['title' => 'سرمایه انسانی']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = AboutTeam::find($id);
        $old_name = $item->name;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' سرمایه انسانی : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = AboutTeam::find($id);
        $old_name = $item->name;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
                $item->$type='pending';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' سرمایه انسانی : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' سرمایه انسانی : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-team-list')->with(['status' => 'success', "message" => ' با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
