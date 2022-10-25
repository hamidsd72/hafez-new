<?php

namespace App\Http\Controllers\User;

use App\Menu;
use App\Models\FaqCat;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function show() {
        $item = Menu::where('slug','سوالات-متداول')->first();
        $items=FaqCat::where('status','active')->orderBy('id','DESC')->get();
        $links  = \App\Models\HeadersLink::where('status','active')->where('menu_id',$item->id)->orderBy('sort')->get();
        return view('user.faq.show',compact('item','items','links'), ['title' => __('text.page_name.faq')]);
    }

}
