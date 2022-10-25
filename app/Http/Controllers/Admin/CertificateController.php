<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Models\Lang;
use App\Activity;
use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function show_certificate()
    {

        $items=Certificate::orderBy('id','DESC')->get();
        return view('admin.certification.show_certificate', compact('items'));
    }

    public function add_certificate()
    {
        return view('admin.certification.add_certificate');
    }

    public function store_certificate(Request $request)
    {
        try{
        if ($request->hasFile('pic')) {
            $pic = file_store($request->pic, 'includes/asset/img/bc_cv/', 'C-');
            $pic='/'.$pic;
        }
        $cer=new Certificate();
        $cer->pic=$pic;
        $cer->title=$request->title;
//        $cer->c_content=$request->c_content;
//        $cer->for=0;
        $cer->save();

            store_lang($request,'cert',$cer->id,['title']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = 'گواهینامه : '.$request->title.' را ایجاد کرد';
            $cer->activity()->save($activity);

        return redirect('admin/admin_show_certificate')->with(['status' => 'success', "message" => 'گواهی نامه اضافه شد . ']);
        }catch (\Exception $e) {
            return redirect('admin/admin_show_certificate')->with(['status' => 'danger - 600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید . ']);
        }
    }

    public function del_certificate($id)
    {
        try{
            $cer=Certificate::find($id);
                $old_t=$cer->title;
                $cer->delete();

                 $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'destroy';
            $activity->text = 'گواهینامه : '.$old_t.' را حذف کرد';
            $cer->activity()->save($activity);
            return redirect('admin/admin_show_certificate')->with(['status' => 'success', "message" => 'گواهی نامه حذف شد . ']);
        }catch (\Exception $e) {
            return redirect('admin/admin_show_certificate')->with(['status' => 'danger - 600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید . ']);
        }
    }

    public function edit_certificate($id)
    {
        $item=Certificate::find($id);
        return view('admin.certification.edit_certificate',compact('item'));
    }

    public function update_certificate(Request $request, $id)
    {
        try{
            $cer=Certificate::find($id);
            $old_t=$cer->title;
        if ($request->hasFile('pic')) {
            if(is_file($cer->pic))
            {
                File::delete($cer->pic);
            }
            $pic = file_store($request->pic, 'includes/asset/img/pharmacy/map/', 'map-');
            $pic='/'.$pic;
            $cer->pic=$pic;
        }
        $cer->title=$request->title;
//        $cer->c_content=$request->c_content;
        $cer->save();

            if($cer->langs)
            {
                foreach ($cer->langs as $lang){
                    $lang->delete();
                }
            }
            store_lang($request,'cert',$cer->id,['title']);


            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = 'گواهینامه : '.$old_t.' را ویرایش کرد';
            $cer->activity()->save($activity);
            return redirect('admin/admin_show_certificate')->with(['status' => 'success', "message" => 'گواهی نامه با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}