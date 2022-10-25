<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Models\HeadersLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HeadersLinksController extends Controller
{
    public function controller_paginate() {
        return 20;
    }

    public function __construct() {
        $this->middleware(['auth','Admin']);
    }

    public function create() {
        $items = Menu::orderBy('sort_id')->get();
        return view('admin.headers_links.create', compact('items'), ['title' => 'افزودن لینک']);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'label' => 'required',
            'link' => 'required',
        ]);
        if (HeadersLink::where('menu_id',$request->menu_id)->where('label',$request->label)->first()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'در این صفحه لینک ای با این عنوان تعریف شده.'
            ])->withErrors($validator)->withInput();
        }
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item = HeadersLink::create([
                'label' => $request->label,
                'link' => $request->link,
                'menu_id' => $request->menu_id
            ]);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = 'لینک هدر : ' . '(' . $request->name . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect()->route('admin-headers-links.index')->with(['status' => 'success', "message" => 'لینک با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    public function edit($admin_headers_link) {
        $item = HeadersLink::find($admin_headers_link);
        $items = Menu::orderBy('sort_id')->get();
        return view('admin.headers_links.edit', compact('item', 'items'), ['title' => $item->label]);
    }

    public function update(Request $request, $admin_headers_link) {
        $item = HeadersLink::find($admin_headers_link);
        $old_name = $item->name;
        try {
            if ($request->label) {
                $item->label = $request->label;
            }
            if ($request->link) {
                $item->link = $request->link;
            }
            if ($request->menu_id) {
                $item->menu_id = $request->menu_id;
            }
            if ($request->status) {
                $item->status = $request->status;
            }
            if ($request->sort) {
                $item->sort = $request->sort;
            }
            $item->save();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' لینک هدر : ' . '(' . $old_name . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect()->route('admin-headers-links.index')->with(['status' => 'success', "message" => 'لینک با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    public function index() {
        $items = HeadersLink::orderByDesc('id')->paginate($this->controller_paginate());
        if ($items->count()) {
            $menus = Menu::whereIn('id', $items->pluck('menu_id'))->get();
        } else {
            $menus = Menu::all()->first();
        }
        return view('admin.headers_links.index', compact('items','menus'), ['title' => 'لینک هدر']); 
    }

    public function destroy($admin_headers_link) {
        $item = HeadersLink::find($admin_headers_link);
        $old_name = $item->label;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' لینک هدر : ' . '(' . $old_name . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect()->back()->with(['status' => 'success', "message" => 'لینک با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }
}
