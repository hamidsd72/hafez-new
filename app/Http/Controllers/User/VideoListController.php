<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoList;
use App\Models\LearnCategory;

class VideoListController extends Controller
{
    public function index()
    {
        $category = LearnCategory::where('status','active')->get();
        $items = VideoList::where('status','active')->paginate(12);
        return view('user.video.index', compact('category','items'), ['title' => 'ویدیو های آموزشی']); 
    }

    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $title = LearnCategory::findOrFail($id);
        $category = LearnCategory::where('status','active')->get();
        $items = VideoList::where('status','active')->where('cat_id',$id)->paginate(3);
        return view('user.video.index', compact('category','items'), ['title' => 'ویدیو های آموزشی دسته '.$title->pluck('name')]);
    }

    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
