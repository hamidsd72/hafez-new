<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Models\Lang;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }


    // Edit Function
    public function edit($id)
    {
        $item = Setting::find($id);
        return view('admin.setting.edit', compact('item'), ['title' => 'ویرایش  تنظیمات سایت']);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = Setting::find($id);
//        $old_title = $item->title;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
//            'title_en' => 'required',
            'shoar' => 'required',
//            'shoar_en' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->title = $request->title;
            $item->site_key = $request->site_key;
            $item->keywords = $request->keywords;
            $item->description = $request->description;
            $item->shoar = $request->shoar;
//            $item->paginate = $request->paginate;
            if ($request->hasFile('logo')) {
                if (is_file($item->logo)) {
                    $old_path = $item->logo;
                    File::delete($old_path);
                }
                $item->logo = file_store($request->logo, 'includes/asset/uploads/setting/photos/', 'logo-');;
            }
            if ($request->hasFile('logo2')) {
                if (is_file($item->logo2)) {
                    $old_path = $item->logo2;
                    File::delete($old_path);
                }
                $item->logo2 = file_store($request->logo2, 'includes/asset/uploads/setting/photos/', 'logo2-');;
            }
            if ($request->hasFile('icon')) {
                if (is_file($item->icon)) {
                    $old_path = $item->icon;
                    File::delete($old_path);
                }
                $item->icon = file_store($request->icon, 'includes/asset/uploads/setting/photos/', 'icon-');;
            }
            if ($request->hasFile('header_pic_fa')) {
                if (is_file($item->header_pic_fa)) {
                    $old_path = $item->header_pic_fa;
                    File::delete($old_path);
                }
                $item->header_pic_fa = file_store($request->header_pic_fa, 'includes/asset/uploads/setting/photos/', 'header_pic_fa-');;
            }
            if ($request->hasFile('header_pic_en')) {
                if (is_file($item->header_pic_en)) {
                    $old_path = $item->header_pic_en;
                    File::delete($old_path);
                }
                $item->header_pic_en = file_store($request->header_pic_en, 'includes/asset/uploads/setting/photos/', 'header_pic_en-');;
            }
            if ($request->hasFile('featur_pic')) {
                if (is_file($item->featur_pic)) {
                    $old_path = $item->featur_pic;
                    File::delete($old_path);
                }
                $item->featur_pic = file_store($request->featur_pic, 'includes/asset/uploads/setting/photos/', 'featur_pic-');;
            }
            $item->update();


//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    if($lang->fild_name!='employ_text' &&
//                       $lang->fild_name!='employ_unit'
//                    )
//                    {
//                        $lang->delete();
//                    }
//                }
//            }
//            store_lang($request,'setting',$item->id,['title','keywords','description','shoar']);



            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' تنظیمات سایت را ویرایش کرد';
            $item->activity()->save($activity);

            return redirect('admin/setting-edit/1')->with(['status' => 'success', "message" => ' تنظیمات سایت با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
