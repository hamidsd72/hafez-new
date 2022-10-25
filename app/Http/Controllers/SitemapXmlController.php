<?php

namespace App\Http\Controllers;
use App\Models\Blog;    
use App\Menu;

class SitemapXmlController extends Controller
{
    public function index() {
        $links = Menu::orderByDesc('created_at')->get(['id','link','created_at']);
        $items = Blog::orderByDesc('created_at')->get(['id','type','slug','created_at']);
        return response()->view('index', [ 'items' => $items, 'links' => $links ])->header('Content-Type', 'text/xml');
    }
}
