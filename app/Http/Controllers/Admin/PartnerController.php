<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Models\Lang;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
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
        return view('admin.partner.create', ['title' => 'افزودن همکاران ما']);
    }

    // Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'sort_id' => 'required',
            'name' => 'required',
//            'name_en' => 'required',
            'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }

        try {
            $item = Partner::create([
                'name' => $request->name,
                'link' => $request->link,
            ]);
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/Partner/photos/', 'photo-');;
                $item->photo()->save($photo);
            }

//            store_lang($request,'partner',$item->id,['name']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' همکاران ما : ' . '(' . $request->name . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/partner-list')->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = Partner::find($id);
        return view('admin.partner.edit', compact('item'), ['title' => $item->name]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = Partner::find($id);
        $old_name = $item->name;
        $validator = Validator::make($request->all(), [
//            'sort_id' => 'required',
            'name' => 'required',
//            'name_en' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->name = $request->name;
            $item->link = $request->link;
            $item->save();
            if ($request->hasFile('photo')) {
                if ($item->photo) {
                    $old_path = $item->photo->path;
                    File::delete($old_path);
                    $item->photo->delete();
                }
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/Partner/photos/', 'photo-');;
                $item->photo()->save($photo);
            }
//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    $lang->delete();
//                }
//            }
//            store_lang($request,'partner',$item->id,['name']);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' همکاران ما : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/partner-list')->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index()
    {

        $items = Partner::orderBy('id', 'DESC')->get();
        return view('admin.partner.index', compact('items'), ['title' => 'همکاران ما']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = Partner::find($id);
        $old_name = $item->name;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' همکاران ما : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
