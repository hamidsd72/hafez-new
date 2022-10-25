<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\About;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\AboutBank;
use App\ProductCategoryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AboutBankController extends Controller
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
            'title_bank' => 'required|max:200',
            'title_bank1' => 'required|max:200',
            'title_bank2' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item->title_bank = $request->title_bank;
            $item->title_bank1 = $request->title_bank1;
            $item->title_bank2 = $request->title_bank2;
            $item->update();

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = 'عنوان و متن بانکها را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
    // Create Function
    public function create()
    {
        return view('admin.about.bank.create', ['title' => 'افزودن بانک']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'title' => 'required|max:200',
            'shaba' => 'nullable|numeric',
            'hesab' => 'nullable|numeric',
            'card' => 'nullable|numeric',
            'pic' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = AboutBank::create([
                'type' => $request->type,
                'title' => $request->title,
                'shaba' => $request->shaba,
                'hesab' => $request->hesab,
                'card' => $request->card,
            ]);
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/bank/photos/', 'pic-');;
                $item->save();
            }
//            store_lang($request,'about_f',$item->id,['title','text']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' بانک : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = AboutBank::find($id);
        return view('admin.about.bank.edit', compact('item'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = AboutBank::find($id);
        $old_name = $item->title;
        $validator = Validator::make($request->all(), [
            'type' => 'required|numeric',
            'title' => 'required|max:200',
            'shaba' => 'nullable|numeric',
            'hesab' => 'nullable|numeric',
            'card' => 'nullable|numeric',
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
            $item->title = $request->title;
            $item->shaba = $request->shaba;
            $item->hesab = $request->hesab;
            $item->card = $request->card;
            if ($request->hasFile('pic')) {
                if (is_file($item->pic)) {
                    $old_path = $item->pic;
                    File::delete($old_path);
                }
                $item->pic = file_store($request->pic, 'includes/asset/uploads/about/bank/photos/', 'pic-');;
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
            $activity->text = ' بانک : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index(ProductCategoryHelper $ProductCategoryHelper)
    {
        $items = AboutBank::orderBy('id', 'DESC')->get();
        $about=About::firstOrFail();
        return view('admin.about.bank.index', compact('items','about'), ['title' => 'شماره حساب بانکها']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = AboutBank::find($id);
        $old_name = $item->title;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' بانک : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = AboutBank::find($id);
        $old_name = $item->title;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
                $item->$type='pending';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' بانک : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' بانک : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect('admin/about-bank-list')->with(['status' => 'success', "message" => ' با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
