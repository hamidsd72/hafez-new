<?php

namespace App\Http\Controllers\Admin;

use App\NewsCategory;
use App\Models\Meta;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetaController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'seo';
        } elseif ('single') {
            return 'seo';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!is_null($request->search)) {
            $items = Meta::where('title_page', 'LIKE', '%' . $request->search . '%')->orwhere('name_page', $request->search)->paginate(30);
        } else {
            $items = Meta::orderBy('created_at' , 'DESC')->paginate(30);

        }
        return view('admin.meta.index', compact('items'), ['title' => $this->controller_title('sum')]);
    }

    /**
     * Sort Item.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function sort_item(Request $request)
    {
        $category_item_sort = json_decode($request->sort);
        $this->sort_category($category_item_sort, null);
    }

    /**
     * Sort ProductCategory.
     *
     *
     * @param $category_items
     * @param $parent_id
     */
    private function sort_category(array $category_items, $parent_id)
    {
        foreach ($category_items as $index => $category_item) {
            $item = NewsCategory::findOrFail($category_item->id);
            $item->sort_id = $index + 1;
            $item->parent_id = $parent_id;
            $item->save();
            if (isset($category_item->children)) {
                $this->sort_category($category_item->children, $item->id);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meta.create', ['title' => $this->controller_title('single')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_page' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'keyword' => 'required',
            'keyword_en' => 'required',
            'title_page' => 'required',
            'title_page_en' => 'required',
        ]);

        try {

                $item=Meta::create($request->only('name_page', 'description', 'keyword', 'title_page', 'priority'));

                store_lang($request,'meta',$item->id,['description','keyword','title_page']);

                return redirect()->route('meta-list')->with(['status' => 'success', "message" => 'seo با موفقیت افزوده شد.']);


        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Meta::findOrFail($id);
        return view('admin.meta.edit', compact('item'), ['title' => $this->controller_title('single')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Meta::findOrFail($id);
        $this->validate($request, [
            'name_page' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'keyword' => 'required',
            'keyword_en' => 'required',
            'title_page' => 'required',
            'title_page_en' => 'required',
        ]);

        try {

            $category->name_page = $request->name_page;
            $category->description = $request->description;
            $category->keyword = $request->keyword;
            $category->title_page = $request->title_page;
            $category->priority = $request->priority;
            $category->save();

            if($category->langs)
            {
                foreach ($category->langs as $lang){
                    $lang->delete();
                }
            }
            store_lang($request,'meta',$category->id,['description','keyword','title_page']);

            return redirect()->route('meta-list')->with('flash_message', 'seo با موفقیت ویرایش شد.');

        } catch (\Exception $e) {

            return redirect()->back()->withInput()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Meta::findOrFail($id);


        try {

            $category->delete();
            return redirect()->route('meta-list')->with('flash_message', 'seo با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);

        }
    }
}
