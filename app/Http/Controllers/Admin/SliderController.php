<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Slider;
use App\Models\Lang;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
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
        return view('admin.slider.create', ['title' => 'افزودن اسلایدر']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sort_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg|max:2048',
            'img_top' => 'nullable|image|mimes:png|max:2048',
            'url' => 'nullable|url'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item = new Slider();
            $item->sort_id = $request->sort_id;
            $item->title = $request->title;
            $item->text1 = $request->text1;
            $item->place_pic = $request->place_pic;
            $item->show = $request->show;
            //            $item->animate_pic = $request->animate_pic;
            //            $item->animate_text = $request->animate_text;
            //            $item->place_text = $request->place_text;
            //            $item->place_pic = $request->place_text=='left'?'right':'left';
            $item->url =mb_convert_encoding($request->url, 'HTML-ENTITIES', "UTF-8");
            if ($request->hasFile('img_top')) {
                $item->img_top = file_store($request->img_top, 'includes/asset/uploads/sliders/photos/', 'slider-top-');;
            }
            $item->save();

            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/sliders/photos/', 'slider-photo-');;
                $item->photo()->save($photo);
            }

            //            store_lang($request,'slider',$item->id,['title','text1','text2']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' اسلایدر : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/slider-list')->with(['status' => 'success', "message" => 'اسلایدر با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = Slider::find($id);
        return view('admin.slider.edit', compact('item'), ['title' => $item->title]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = Slider::find($id);
        $old_title = $item->title;
        $validator = Validator::make($request->all(), [
            'sort_id' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg|max:2048',
            'img_top' => 'nullable|image|mimes:png|max:2048',
            'url' => 'nullable|url'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->sort_id = $request->sort_id;
            $item->title = $request->title;
            $item->show = $request->show;
            $item->text1 = $request->text1;
            $item->place_pic = $request->place_pic;
            $item->show = $request->show;
            //            $item->animate_pic = $request->animate_pic;
            //            $item->animate_text = $request->animate_text;
            //            $item->place_text = $request->place_text;
            //            $item->place_pic = $request->place_text=='left'?'right':'left';
            $item->url =mb_convert_encoding($request->url, 'HTML-ENTITIES', "UTF-8");
            if ($request->hasFile('img_top')) {
                if (is_file($item->img_top)) {
                    $old_path = $item->img_top;
                    File::delete($old_path);
                    $item->photo->delete();
                }
                $item->img_top = file_store($request->img_top, 'includes/asset/uploads/sliders/photos/', 'slider-top-');;
            }
            if ($request->hasFile('photo')) {
                if ($item->photo) {
                    $old_path = $item->photo->path;
                    if(is_file($item->photo->path))
                    {
                        File::delete($old_path);
                    }
                    $item->photo->delete();
                }
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/sliders/photos/', 'slider-');;
                $item->photo()->save($photo);
            }
            $item->save();

            //            if($item->langs)
            //            {
            //                foreach ($item->langs as $lang){
            //                    $lang->delete();
            //                }
            //            }
            //            store_lang($request,'slider',$item->id,['title','text1','text2']);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' اسلایدر : ' . '(' . $old_title . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/slider-list')->with(['status' => 'success', "message" => 'اسلایدر با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index()
    {
        $items = Slider::orderBy('id' , 'desc')->get();
        return view('admin.slider.index', compact('items'), ['title' => 'اسلایدر ها']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = Slider::find($id);
        $old_title = $item->title;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' اسلایدر : ' . '(' . $old_title . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/slider-list')->with(['status' => 'success', "message" => 'اسلایدر با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect('admin/slider-list')->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
