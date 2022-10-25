<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\About;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\AboutBranch;
use App\ProductCategoryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AboutBranchController extends Controller
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
            'title_branch' => 'required|max:200',
            'text_branch' => 'nullable|max:500',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item->title_branch = $request->title_branch;
            $item->text_branch = $request->text_branch;
            $item->update();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = 'عنوان و متن شعبه را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
    // Create Function
    public function create()
    {
        $items = [ 'آذربایجان شرقی', 'آذربایجان غربی', 'اردبیل', 'اصفهان', 'البرز', 'ایلام', 'بوشهر', 'تهران', 'چهارمحال و بختیاری', 'خراسان جنوبی', 'خراسان رضوی', 'خراسان شمالی', 'خوزستان', 'زنجان', 'سمنان', 'سیستان و بلوچستان', 'فارس', 'قزوین', 'قم', 'کردستان', 'کرمان', 'کرمانشاه', 'کهگیلویه وبویراحمد', 'گلستان', 'گیلان', 'لرستان', 'مازندران', 'مرکزی', 'هرمزگان', 'همدان', 'یزد'];
        return view('admin.about.branch.create', compact('items'), ['title' => 'افزودن شعبه']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:200',
            'city'      => 'required|max:200',
            'province'  => 'required|max:200',
            'address'   => 'required',
            'phone'     => 'required|max:100',
            'email'     => 'nullable|email',
            'pic'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = AboutBranch::create([
                'title'     => $request->title,
                'city'      => $request->city,
                'address'   => $request->address,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'province'  => $request->province,
            ]);
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/branch/photos/', 'pic-');;
                $item->save();
            }
//            store_lang($request,'about_f',$item->id,['title','text']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' شعبه : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $items = [ 'آذربایجان شرقی', 'آذربایجان غربی', 'اردبیل', 'اصفهان', 'البرز', 'ایلام', 'بوشهر', 'تهران', 'چهارمحال و بختیاری', 'خراسان جنوبی', 'خراسان رضوی', 'خراسان شمالی', 'خوزستان', 'زنجان', 'سمنان', 'سیستان و بلوچستان', 'فارس', 'قزوین', 'قم', 'کردستان', 'کرمان', 'کرمانشاه', 'کهگیلویه وبویراحمد', 'گلستان', 'گیلان', 'لرستان', 'مازندران', 'مرکزی', 'هرمزگان', 'همدان', 'یزد'];
        $item = AboutBranch::find($id);
        return view('admin.about.branch.edit', compact('item','items'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = AboutBranch::find($id);
        $old_name = $item->title;
        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:200',
            'city'      => 'required|max:200',
            'province'  => 'required|max:200',
            'address'   => 'required',
            'phone'     => 'required|max:100',
            'email'     => 'nullable|email',
            'pic'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->title    = $request->title;
            $item->city     = $request->city;
            $item->address  = $request->address;
            $item->phone    = $request->phone;
            $item->email    = $request->email;
            $item->province = $request->province;
            if ($request->hasFile('pic')) {
                if (is_file($item->pic)) {
                    $old_path = $item->pic;
                    File::delete($old_path);
                }
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/branch/photos/', 'pic-');;
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
            $activity->text = ' شعبه : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index(ProductCategoryHelper $ProductCategoryHelper)
    {
        $items = AboutBranch::orderBy('id', 'DESC')->get();
        $about=About::firstOrFail();
        return view('admin.about.branch.index', compact('items','about'), ['title' => 'شعبه ها']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = AboutBranch::find($id);
        $old_name = $item->title;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' شعبه : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = AboutBranch::find($id);
        $old_name = $item->title;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
                $item->$type='pending';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' شعبه : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' شعبه : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-branch-list')->with(['status' => 'success', "message" => ' با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
