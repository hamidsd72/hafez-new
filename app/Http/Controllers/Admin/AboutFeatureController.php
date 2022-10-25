<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\AboutFeature;
use App\ProductCategoryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AboutFeatureController extends Controller
{

    // Construct Function
    public function __construct()
    {
//        $this->middleware(['auth', 'clearance']);
        $this->middleware(['auth','Admin']);
    }

    // Create Function
    public function create()
    {
        return view('admin.about.feature.create', ['title' => 'افزودن ویژگی ما']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
//            'title_en' => 'required',
            'text' => 'required',
//            'text_en' => 'required',
            'pic' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = AboutFeature::create([
                'title' => $request->title,
                'text' => $request->text,
            ]);
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'includes/asset/uploads/aboutfeature/photos/', 'photo-');;
                $item->save();
            }

//            store_lang($request,'about_f',$item->id,['title','text']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' ویژگی های ما : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-feature-list')->with(['status' => 'success', "message" => 'ویژگی با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = AboutFeature::find($id);
        return view('admin.about.feature.edit', compact('item'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = AboutFeature::find($id);
        $old_name = $item->title;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
//            'title_en' => 'required',
            'text' => 'required',
//            'text_en' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->title = $request->title;
            $item->text = $request->text;
            if ($request->hasFile('pic')) {
                if (is_file($item->pic)) {
                    $old_path = $item->pic;
                    File::delete($old_path);
                }
                $item->pic = file_store($request->pic, 'includes/asset/uploads/aboutfeature/photos/', 'photo-');;
            }
            $item->save();

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
            $activity->text = ' ویژگی های ما : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-feature-list')->with(['status' => 'success', "message" => 'ویژگی با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index(ProductCategoryHelper $ProductCategoryHelper)
    {
        $items = AboutFeature::orderBy('id', 'DESC')->get();
        return view('admin.about.feature.index', compact('items'), ['title' => 'دستاوردهای ما']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = AboutFeature::find($id);
        $old_name = $item->title;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' ویژگی های ما : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-feature-list')->with(['status' => 'success', "message" => 'ویژگی با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = AboutFeature::find($id);
        $old_name = $item->title;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
               $item->$type='pending';
               $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' ویژگی های ما : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-feature-list')->with(['status' => 'success', "message" => 'ویژگی با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' ویژگی های ما : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-feature-list')->with(['status' => 'success', "message" => 'ویژگی با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
