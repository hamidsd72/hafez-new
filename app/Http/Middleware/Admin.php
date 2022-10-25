<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Activity;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $blogListController     = ['HomeController','BlogController','ArticleCommentController'];
        $formListController     = ['HomeController','ContactController'];
        $designListController   = ['HomeController','SliderController','AboutBranchController','AboutController','AboutTeamController','AboutBankController','AboutFeatureController',
        'FaqCatController','FaqController','ContactController','MenuInformationController','CertificateController','MenuController','ContactInfoContaroller','PartnerController','HeadersLinksController'];
        $settingListController  = ['HomeController','SettingController','UserController','PermissionController','MetaController'];

        $user_permissions   = explode(",",Permission::where('role_name', auth()->user()->getRoleNames()->first() )->first()->access);

        preg_match('/([a-z]*)@/i', request()->route()->getActionName(), $matches);
        $controllerName = $matches[1];

        if ( in_array( $controllerName , $blogListController ) ) {
            $permission = 'بلاگ';
        } elseif ( in_array( $controllerName , $formListController ) ) {
            $permission = 'فرم';
        } elseif ( in_array( $controllerName , $designListController ) ) {
            $permission = 'طراحی';
        } elseif ( in_array( $controllerName , $settingListController ) ) {
            $permission = 'تنظیمات';
        }

        if ( $controllerName=='HomeController' || auth()->user()->getRoleNames()->first()=='ادمین ارشد' || in_array( 'همه' , $user_permissions ) || in_array( $permission , $user_permissions ) ) {
            return $next($request);
        }
        abort(503, 'You Access Denied');
    }
}