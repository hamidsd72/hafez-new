<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;
use App\Models\Lang;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ContactInfoContaroller extends Controller
{

    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }


    // Edit Function
    public function edit($id)
    {
        $item = ContactInfo::find($id);
        return view('admin.contact.info.edit', compact('item'), ['title' => 'ویرایش اطلاعات تماس با ما']);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        $item = ContactInfo::find($id);
        $validator = Validator::make($request->all(), [
            'address' => 'required',
//            'address_en' => 'required',
            'phone1' => 'required',
            'email1' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->address = $request->address;
            $item->text = $request->text;
            $item->mobile1 = $request->mobile1;
            $item->mobile2 = $request->mobile2;
            $item->phone1 = $request->phone1;
            $item->phone2 = $request->phone2;
            $item->email1 = $request->email1;
            $item->email2 = $request->email2;
            $item->telegram = $request->telegram;
            $item->instagram = $request->instagram;
            $item->whatsapp = $request->whatsapp;
            $item->facebook = $request->facebook;
            $item->linkdin = $request->linkdin;
            $item->aparat = $request->aparat;
            $item->map = $request->map;

            $item->update();


//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    $lang->delete();
//                }
//            }
//            store_lang($request,'contact_info',$item->id,['address','mobile1','mobile2','phone1','phone2','text']);



            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' اطلاعات تماس با ما را ویرایش کرد';
            $item->activity()->save($activity);

            return redirect('admin/contact-info-edit/1')->with(['status' => 'success', "message" => 'تماس با ما با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
