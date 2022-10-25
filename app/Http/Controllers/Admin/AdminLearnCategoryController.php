<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LearnCategory;
use App\Http\Requests\AdminLearnCategoryRoles;

class AdminLearnCategoryController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth', 'clearance']);
        $this->middleware('auth');
    } 

    public function index()
    {
        $items = LearnCategory::all()->paginate(20)->sortDesc();
        return view('admin.learn_category.index', compact('items'), ['title' => 'دسته بندی های ویدیو های آموزشی']);   
    }
 
    public function create()
    { 
        return view('admin.learn_category.create', ['title' => 'ایجاد دسته بندی ویدیو های آموزشی']);  
    } 

    public function store(Request $request) // AdminLearnCategoryRoles <== validations
    {
        $item = LearnCategory::create($request->all());
        return redirect('/admin/admin-learn-category/'.$item->id);
    }

    public function show($id)
    {
        $item = LearnCategory::findOrFail($id);
        return view('admin.learn_category.show', compact('item'), ['title' => 'دسته بندی ویدیو های آموزشی']);  
    }

    public function edit($id)
    {
        $item = LearnCategory::findOrFail($id);
        return view('admin.learn_category.edit', compact('item'), ['title' => 'اصلاح دسته بندی ویدیو های آموزشی']);  
    }

    public function update(Request $request, $id) // AdminLearnCategoryRoles <== validations
    {
        $item = LearnCategory::findOrFail($id);
        $item->sort = $request->sort;
        $item->status = $request->status;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->update();
        return redirect()->route('admin-learn-category.index');
    }

    public function destroy($id)
    {
        LearnCategory::findOrFail($id)->delete();
        return redirect('/admin/admin-learn-category/');
    }
}
