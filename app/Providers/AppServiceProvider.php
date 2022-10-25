<?php

namespace App\Providers;

use App\Activity;
use App\Procomment;
use App\Comment;
use App\Models\Meta;
use App\Contact;
use App\Menu;
use App\Models\ContactInfo;
use App\MessageSend;
use App\Employment;
use App\Models\Blog;
use App\Product;
use App\ProductCategory;
use App\Models\ProductType;
use App\Models\ProductCat;
use App\ArticleCategory;
use App\BroadcastCategory;
use App\Colleague;
use App\User;
use App\Sms;
use App\Hbd;
use App\UserScore;
use App\Slider;
use App\Models\Permission;
use App\Setting;
use App\NewsCategory;
use App\Basketclub;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public $url = '';


    public function boot(Request $request)
    {

        $this->url = $request->fullUrl();


        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', '300');
        

        Carbon::setLocale('fa');
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        view()->composer('layouts.admin', function ($view) {
            $view
                ->with('activities', Activity::orderBy('id', 'DESC')->take(4)->get())
                ->with('pending', User::where('status', 4)->get())
                ->with('alarm', User::where('alarm', 5)->get())
                ->with('contact', Contact::where('see', 0)->get())
                ->with('employment', Employment::where('see', 0)->get())
                ->with('comment_product', Comment::where('type','product')->where('reply_id',0)->where('see', 0)->get())
                ->with('comment_blog', Comment::where('type','blog')->where('reply_id',0)->where('see', 0)->get())
                ->with('setting', Setting::find(1))
                ->with('clubBasketC', Basketclub::where(['status' => 4, 'seen_id' => 0])->count())
                ->with('access', Permission::where('role_name', auth()->user()->getRoleNames()->first() )->first()->access );
        });
        view()->composer('layouts.auth', function ($view) {
            $view
                ->with('setting', Setting::find(1));
        });

        view()->composer('layouts.user', function ($view) {
            $sett=Setting::find(1);
            $titleSeo = set_lang($sett,'title',app()->getLocale());
            $keywordsSeo =set_lang($sett,'keywords',app()->getLocale());
            $descriptionSeo =set_lang($sett,'description',app()->getLocale());

            $seo = Meta::where('name_page', $this->url)->first();
            if (is_null($seo)) {
                $seo = Meta::where('name_page', $this->url . '/')->first();

                if (is_null($seo)) {
                    $seo = Meta::where('name_page', explode('?', $this->url)[0])->first();


                    if (is_null($seo)) {
                        $seo = Meta::where('name_page', explode('?', $this->url)[0] . '/')->first();

                    }

                }
            }


            if (!is_null($seo)) {
                $titleSeo = $seo->title_page;
                $keywordsSeo = $seo->keyword;
                $descriptionSeo = $seo->description;
            }
            $giahi=Product::where('cat_id',1)->get();
            $type_g=[];
            $category_g=[];
            foreach ($giahi as $p_g)
            {
                $p_type=ProductType::find($p_g->type_id);
                if($p_type->parent)
                {
                    array_push($type_g,$p_type->parent->id);
                }
                else
                {
                    array_push($type_g,$p_type->id);
                }
                $p_cat=ProductCategory::find($p_g->category_id);
                if($p_cat->parent)
                {
                    array_push($category_g,$p_cat->parent->id);
                }
                else
                {
                    array_push($category_g,$p_cat->id);
                }
            }
            $shimiaei=Product::where('cat_id',2)->get();
            $type_s=[];
            $category_s=[];
            foreach ($shimiaei as $p_s)
            {
                $p_type=ProductType::find($p_s->type_id);
                if($p_type->parent)
                {
                    array_push($type_s,$p_type->parent->id);
                }
                else
                {
                    array_push($type_s,$p_type->id);
                }
                $p_cat=ProductCategory::find($p_s->category_id);
                if($p_cat->parent)
                {
                    array_push($category_s,$p_cat->parent->id);
                }
                else
                {
                    array_push($category_s,$p_cat->id);
                }
            }
            $category_g1=ProductCategory::wherein('id',$category_g)->get();
            $category_s1=ProductCategory::wherein('id',$category_s)->get();
            $type_g1=ProductType::wherein('id',$type_g)->get();
            $type_s1=ProductType::wherein('id',$type_s)->get();
            $view->with([
                'titleSeo' => $titleSeo,
                'keywordsSeo' => $keywordsSeo,
                'descriptionSeo' => $descriptionSeo,
                'urlPage' => $this->url,
                'setting'=>$sett,
                'last_product'=>Product::where('site','active')->orderBy('id','desc')->take(5)->get(),
                'last_blog'=>Blog::where('status','active')->orderBy('id','desc')->take(5)->get(),
                'product_cat'=>ProductCat::orderBy('id','DESC')->get(),
                'product_category'=>ProductCategory::where('parent_id',0)->get(),
                'product_type'=>ProductType::where('parent_id',0)->get(),
                'contact_info'=>ContactInfo::find(1),
                'type_g'=>$type_g1,
                'type_s'=>$type_s1,
                'category_g'=>$category_g1,
                'category_s'=>$category_s1,
                'about_menu'=>Menu::where('status','active')->where('status_menu','active')->orderBy('id','desc')->get(),
                'menu_r'=>Menu::where('status','active')->where('status_footer','active')->where('place','right')->orderBy('sort_id','ASC')->get(),
                'menu_l'=>Menu::where('status','active')->where('status_footer','active')->where('place','left')->orderBy('sort_id','ASC')->get(),
                'menu_1'=>Menu::where('status','active')->where('menu_type','menu_1')->orderBy('sort_id')->get(),
                'menu_2'=>Menu::where('status','active')->where('menu_type','menu_2')->orderBy('sort_id')->get(),
                'menu_3'=>Menu::where('status','active')->where('menu_type','menu_3')->orderBy('sort_id')->get(),
                'menu_4'=>Menu::where('status','active')->where('menu_type','menu_4')->orderBy('sort_id')->get(),
            ]);
            
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
