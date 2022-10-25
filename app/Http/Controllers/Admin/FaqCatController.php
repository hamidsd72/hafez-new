<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\FaqCat;
use App\ProductCategoryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FaqCatController extends Controller
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
        return view('admin.faq.cat.create', ['title' => 'افزودن دسته پرسش و پاسخ']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:250',
            'slug' => 'required|max:255|unique:faq_cats',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = FaqCat::create([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);

//            store_lang($request,'about_f',$item->id,['title','text']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' دسته بندی پرسش و پاسخ : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/faq-cat-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = FaqCat::find($id);
        return view('admin.faq.cat.edit', compact('item'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = FaqCat::find($id);
        $old_name = $item->title;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:250',
            'slug' => 'required|max:255|unique:faq_cats,slug,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->title = $request->title;
            $item->slug = $request->slug;
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
            $activity->text = 'دسته پرسش و پاسخ : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/faq-cat-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index(ProductCategoryHelper $ProductCategoryHelper)
    {

        $items = FaqCat::orderBy('id', 'DESC')->get();
        return view('admin.faq.cat.index', compact('items'), ['title' => 'دسته پرسش و پاسخ']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = FaqCat::find($id);
        $old_name = $item->title;
        try {
            if(count($item->faqs))
            {
                return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، دسته دارای پرسش و پاسخ می باشد']);
            }
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = 'دسته پرسش و پاسخ : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/faq-cat-list')->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = FaqCat::find($id);
        $old_name = $item->title;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
                $item->$type='pending';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' دسته پرسش و پاسخ : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/faq-cat-list')->with(['status' => 'success', "message" => ' با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' دسته پرسش و پاسخ : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/faq-cat-list')->with(['status' => 'success', "message" => ' با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
