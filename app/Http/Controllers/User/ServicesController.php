<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\MenuInformation;
use App\Models\MenuInformationPicture;
use App\Http\Controllers\Controller;
use App\About;
use App\Models\HeadersLink;
use App\Menu;
class ServicesController extends Controller
{
    public function show($service)
    {
        $item = Menu::where('slug',$service)->first();
        if ($item) {
            $items  = MenuInformation::where('menu_id',$item->id)->where('status','active')->get();
            $items1 = $items->where('section_number',1)->sortBy('sort');
            $items2 = $items->where('section_number',2)->sortBy('sort');
            $items3 = $items->where('section_number',3)->sortBy('sort');
            $items4 = $items->where('section_number',4)->sortBy('sort');
            $items5 = $items->where('section_number',5)->sortBy('sort');
            $items6 = $items->where('section_number',6)->sortBy('sort');
            $links  = HeadersLink::where('status','active')->where('menu_id',$item->id)->orderBy('sort')->get();
        }
        // return view('user.services.index',compact('item'), ['title' => __('text.page_name.banks')]);
        return view('user.services.index',compact('item','items1','items2','items3','items4','items5','items6','links'));
    }
}
