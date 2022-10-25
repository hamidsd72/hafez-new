<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Models\FaqCat;
use App\Procomment;
use App\Proanswer;
use App\FaqCategory;
use App\Activity;
use App\ScoreType;
use App\User;
use App\UserScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{

    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }
    // Create Function
    public function create()
    {
        $cats=FaqCat::all();
        return view('admin.faq.create',compact('cats'), ['title' => 'افزودن پرسش و پاسخ']);
    }
    public function status($id)
    {
        $item = Faq::findOrFail($id);
        $old_title=$item->title;
        if ($item->status == 'active') {
            $item->status = 'pending';
            $item->save();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' پرسش و پاسخ : ' . '(' . $old_title . ')' . ' را غیرفعال کرد';
            $item->activity()->save($activity);
        } else {
            $item->status = 'active';
            $item->save();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' پرسش و پاسخ : ' . '(' . $old_title . ')' . ' را فعال کرد';
            $item->activity()->save($activity);
        }
        return redirect()->back()->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cat_id' => 'required',
            'title' => 'required',
            'question' => 'required',
//            'question_en' => 'required',
            'answer' => 'required',
//            'answer_en' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item = Faq::create([
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
//            store_lang($request,'faq',$item->id,['question','answer']);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' پرسش و پاسخ : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/faq-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = Faq::findOrFail($id);
        $cats=FaqCat::all();
        return view('admin.faq.edit', compact('item','cats'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = Faq::findOrFail($id);
        $old_title=$item->title;
        $validator = Validator::make($request->all(), [
            'cat_id' => 'required',
            'title' => 'required',
            'question' => 'required',
//            'question_en' => 'required',
            'answer' => 'required',
//            'answer_en' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->cat_id = $request->cat_id;
            $item->title = $request->title;
            $item->question = $request->question;
            $item->answer = $request->answer;
            $item->save();
//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    $lang->delete();
//                }
//            }
//            store_lang($request,'faq',$item->id,['question','answer']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' پرسش و پاسخ : ' . '(' . $old_title . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/faq-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index()
    {
        $items = Faq::orderBy('id','DESC')->paginate(20);
        return view('admin.faq.index', compact('items'), ['title' => 'پرسش و پاسخ ها']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = Faq::findOrFail($id);
        $old_title=$item->title;
        try {
            $item->delete();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' پرسش و پاسخ : ' . '(' . $old_title . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
