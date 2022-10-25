<?php

namespace App\Http\Controllers\User;

use App\Models\Blog;
use App\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller {
    public function controller_paginate() {
        return Setting::select('paginate')->latest()->firstOrFail()->paginate;
    }

    //index
    public function edit($id) {
        if($id=='news'){$title='اخبار';}
        elseif($id=='article'){$title='مقالات';}
        else{$title='بلاگ';}
        $items = Post::where('type',$id)->orderBy('id' , 'desc')->paginate($this->controller_paginate());
        return view('user.blog.index',compact('id','items'),['title' => $title]);
    }

    //show
    public function show($id) {
        $item = Post::where('slug',$id)->first();
        if(!$item) {
            return redirect()->route('user.index');
        }

        $last_items = Post::where('status','active')->where('type', $item->type)->where('id','!=',$item->id)->orderBy('id','desc')->take(4)->get();
        $item->seen+=1;
        $item->update();
        $comments = Comment::where('status','active')->where('type','post')->where('item_id' ,$item->id)->get();
        $like    = Like::where('status', 'like')->where('type','post')->where('item_id', $item->id)->count();
        $dislike = Like::where('status', 'dislike')->where('type','post')->where('item_id', $item->id)->count();
        return view('user.blog.show',compact('item','last_items','comments','like','dislike'), ['title' => set_lang($item,'title',app()->getLocale())]);
    }

    //search
    public function store(Request $request) {
        $items = Blog::where('status','active')->where( 'title' ,  'like' , '%'. $request->search .'%' )->orderByDesc('created_at')->paginate($this->controller_paginate());
        return view('user.blog.index',compact('type','items','last_items'),['title' => 'اطلاعیه ها , مقالات و آموزش ها']);
    }
}
