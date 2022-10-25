<a href="{{route('admin-home')}}" class="sidebar-title list-group-item active"><i class="fa fa-bars text-size-large ml-2"></i>کارگزاری حافظ</a>
{{-- {{}} --}}
<div id="accordion" class="border">
    @if ( in_array( 'بلاگ', explode(",", $access) ) || in_array( 'همه', explode(",", $access) ) )
        <div class="card m-0">
            <div class="card-header p-1" id="headingFour">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fas fa-circle-notch text-size-small ml-2"></i>بلاگ و مجله
                </button>
            </div>
            <div id="collapseFour" class="collapse {{in_array( \Request::route()->getName() , ['admin-blog-list','admin-article-comment-list'])?'show':'' }}" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{ route('admin-blog-list','news') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-blog-list' && \Request::route()->type=='news')?'active':'' }}"></i>اخبار</a>
                    <a href="{{ route('admin-blog-list','article') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-blog-list' && \Request::route()->type=='article')?'active':'' }}"></i>مقالات</a>
                    <a href="{{ route('admin-article-comment-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-article-comment-list')?'active':'' }}">
                        </i>نظرات @if(count($comment_blog))<span style="color: red;">({{count($comment_blog)}} جدید )</span>@endif</a>
                </div>
            </div>
        </div>
    @endif
    @if ( in_array( 'فرم', explode(",", $access) ) || in_array( 'همه', explode(",", $access) ) )
        <div class="card m-0">
            <div class="card-header p-1" id="headingFive">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <i class="fas fa-circle-notch text-size-small ml-2"></i>فرم ها
                </button>
            </div>
            <div id="collapseFive" class="collapse {{in_array( \Request::route()->getName() , ['admin-contact-list','admin.employment.list'])?'show':'' }}" aria-labelledby="headingFive" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{ route('admin-contact-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-contact-list')?'active':'' }}">
                        </i>تماس با ما@if(count($contact))<span style="color: red;"> ({{count($contact)}} جدید )</span>@endif</a>
        
                    <a href="{{ route('admin.employment.list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin.employment.list')?'active':'' }}">
                            </i>استخدام ها @if(count($employment))<span style="color: red;">({{count($employment)}} جدید )</span>@endif</a></a>
                </div>
            </div>
        </div>
    @endif
    @if ( in_array( 'طراحی', explode(",", $access) ) || in_array( 'همه', explode(",", $access) ) )
        <div class="card m-0">
            <div class="card-header p-1" id="headingOne">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-circle-notch text-size-small ml-2"></i>طراحی صفحات
                </button>
                {{-- <a href="#" data-target="[data-parent='#child1']" data-toggle="collapse" class="my-2 float-right">close all</a> --}}
            </div>
            <div id="collapseOne" class="collapse {{in_array( \Request::route()->getName() , ['admin-slider-list','admin-about-edit','admin-about-team-list','admin-about-bank-list','admin-about-feature-list','admin-about-branch-list','admin-faq-cat-list','admin-faq-list','admin.employment.page.edit','admin.employment.page.list','admin-menu-information.index','admin_show_certificate','admin-menu-list','admin-contact-info-edit','admin-partner-list','admin-headers-links.index'])?'show':''}}" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" id="child1">
                    <a href="{{ route('admin-slider-list') }}" class="list-group-item list-group-item-action"> <i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-slider-list')?'active':'' }}"></i>اسلایدر</a>
                    <a href="{{route('admin-about-branch-list')}}" class="list-group-item list-group-item-action"> <i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-about-branch-list')?'active':'' }}"></i>لیست شعب</a>

                    <div class="card m-0">
                        <div class="card-header border-none p-1">
                            <button class="btn btn-link btn-block border-light" data-toggle="collapse" data-target="#collapseOneA">صفحه درباره ما</button>
                        </div>
                        <div class="card-body collapse {{in_array( \Request::route()->getName() , ['admin-about-edit','admin-about-team-list','admin-about-bank-list','admin-about-feature-list'])?'show':''}}" data-parent="#child1" id="collapseOneA">
                
                            <a href="{{route('admin-about-edit',1) }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-about-edit')?'active':'' }}"></i>درباره ما</a>
                            <a href="{{route('admin-about-team-list')}}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-about-team-list')?'active':'' }}"></i>سرمایه انسانی</a>
                            <a href="{{route('admin-about-bank-list')}}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-about-bank-list')?'active':'' }}"></i>بانک ها</a>
                            <a href="{{route('admin-about-feature-list')}}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-about-feature-list')?'active':'' }}"></i>دستاوردها</a>

                        </div>
                    </div>
                    <div class="card m-0">
                        <div class="card-header border-none p-1">
                            <button class="btn btn-link btn-block border-light" data-toggle="collapse" data-target="#collapseOneB">سوالات متداول</button>
                        </div>
                        <div class="card-body collapse {{in_array( \Request::route()->getName() , ['admin-faq-cat-list','admin-faq-list'])?'show':''}}" data-parent="#child1" id="collapseOneB">
                            
                            <a href="{{ route('admin-faq-cat-list') }}" class="list-group-item list-group-item-action"> <i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-faq-cat-list')?'active':'' }}"></i>دسته بندی ها</a>
                            <a href="{{ route('admin-faq-list') }}" class="list-group-item list-group-item-action"> <i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-faq-list')?'active':'' }}"></i>سوالات</a>

                        </div>
                    </div>
                    <div class="card m-0">
                        <div class="card-header border-none p-1">
                            <button class="btn btn-link btn-block border-light" data-toggle="collapse" data-target="#collapseOneC">فرصت های شغلی</button>
                        </div>
                        <div class="card-body collapse {{in_array( \Request::route()->getName() , ['admin.employment.page.edit','admin.employment.page.list'])?'show':''}}" data-parent="#child1" id="collapseOneC">
                            
                            <a href="{{ route('admin.employment.page.edit') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin.employment.page.edit')?'active':'' }}"></i>ویرایش فرم</a>
                            <a href="{{ route('admin.employment.page.list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin.employment.page.list')?'active':'' }}"></i>لیست فرصت ها</a>

                        </div>
                    </div>
                    <div class="card m-0">
                        <div class="card-header border-none p-1">
                            <button class="btn btn-link btn-block border-light" data-toggle="collapse" data-target="#collapseOneD">محتوا</button>
                        </div>
                        <div class="card-body collapse {{in_array( \Request::route()->getName() , ['admin-menu-information.index','admin_show_certificate','admin-menu-list','admin-contact-info-edit','admin-partner-list','admin-headers-links.index'])?'show':'' }}" data-parent="#child1" id="collapseOneD">
                
                            <a href="{{ route('admin-menu-information.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-menu-information.index')?'active':'' }}"></i>محتوا داخلی صفحات</a>
                            {{-- <a href="{{ route('admin_show_certificate') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin_show_certificate')?'active':'' }}"></i>گواهینامه ها</a> --}}
                            <a href="{{ route('admin-menu-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-menu-list')?'active':'' }}"></i>صفحات داینامیک</a>
                            <a href="{{ route('admin-headers-links.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-headers-links.index')?'active':'' }}"></i>لینک های تصاویر هدر</a>
                            <a href="{{ route('admin-contact-info-edit',1) }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-contact-info-edit')?'active':'' }}"></i>تماس با ما</a>
                            <a href="{{ route('admin-partner-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-partner-list')?'active':'' }}"></i>شرکای استراتژیک</a>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endif
    @if ( in_array( 'تنظیمات', explode(",", $access) ) || in_array( 'همه', explode(",", $access) ) )
        <div class="card m-0">
            <div class="card-header p-1" id="headingTwo">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-circle-notch text-size-small ml-2"></i>تنظیمات
                </button>
            </div>
            <div id="collapseTwo" class="collapse {{in_array( \Request::route()->getName() , ['admin-setting-edit','admin-user-list','meta-list','permissions.index'])?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                
                    <a href="{{ route('admin-setting-edit',1)}}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-setting-edit')?'active':'' }}"></i>تنظیمات سایت</a>
                    <a href="{{ route('admin-user-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-user-list')?'active':'' }}"></i>لیست کاربران</a>
                    <a href="{{ route('permissions.index') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='permissions.index')?'active':'' }}"></i>گروه های کاربری</a>
                    <a href="{{ route('meta-list') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='meta-list')?'active':'' }}"></i>متاهای سایت</a>
                    <a href="{{ route('sitemap') }}" class="list-group-item list-group-item-action"><i class="fas fa-circle-notch text-size-small ml-2"></i>سایت مپ</a>

                </div>
            </div>
        </div>
    @endif
    @if ( in_array( 'گزارش', explode(",", $access) ) || in_array( 'همه', explode(",", $access) ) )
        <div class="card m-0">
            <div class="card-header p-1" id="headingThree">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-circle-notch text-size-small ml-2"></i>گزارشات
                </button>
            </div>
            <div id="collapseThree" class="collapse {{(\Request::route()->getName()=='admin-activities')?'show':'' }}" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{ route('admin-activities') }}" class="list-group-item list-group-item-action "><i class="fas fa-circle-notch text-size-small ml-2 {{(\Request::route()->getName()=='admin-activities')?'active':'' }}"></i>گزارشات</a>
                </div>
            </div>
        </div>
    @endif
</div>





























{{-- <div class="sidebar list-group mb-2">
    <a href="{{route('admin-home')}}" class="sidebar-title list-group-item active"><i
            class="fa fa-bars text-size-large ml-2"></i>کارگزاری حافظ</a> --}}
    {{-- <a href="{{ route('email-list') }}" class="list-group-item list-group-item-action"><i
            class="fas fa-circle-notch text-size-small ml-2"></i>لیست خبرنامه</a>
    <a href="{{ route('live-list') }}" class="list-group-item list-group-item-action"><i
            class="fas fa-circle-notch text-size-small ml-2"></i>لیست ویدئو ها</a>
    <div class="sidebar-a list-group-item list-group-item-action" id="b1">
        <i class="fas fa-circle-notch text-size-small ml-2"></i>محصولات
        <div class="sidebar-ul" id="s1">
            <a href="{{ route('admin-product-category-list') }}"
                class="list-group-item list-group-item-action"><i
                    class="fas fa-circle-notch text-size-small ml-2"></i>دسته بندی</a>
            <a href="{{ route('admin-product-type-list') }}"
                class="list-group-item list-group-item-action"><i
                        class="fas fa-circle-notch text-size-small ml-2"></i>شکل داروئی</a>
            <a href="{{ route('admin-product-brand-list') }}"
                class="list-group-item list-group-item-action"><i
                        class="fas fa-circle-notch text-size-small ml-2"></i>برند</a>
            <a href="{{ route('admin-product-list') }}"
                class="list-group-item list-group-item-action"><i
                        class="fas fa-circle-notch text-size-small ml-2"></i>محصولات</a>
            <a href="{{ route('admin-product-comment-list') }}"
                class="list-group-item list-group-item-action"><i
                        class="fas fa-circle-notch text-size-small ml-2"></i>نظرات
                محصولات@if(count($comment_product))<span
                        style="color: red;"> ({{count($comment_product)}}
                    جدید )</span>@endif</a>

        </div>
    </div> --}}
    {{-- <div class="sidebar-a list-group-item list-group-item-action" id="b2">
        <i class="fas fa-circle-notch text-size-small ml-2"></i>بلاگ و مجله
        <div class="sidebar-ul" id="s2">
            <a href="{{ route('admin-blog-list','news') }}" class="list-group-item list-group-item-action">
               <i class="fas fa-circle-notch text-size-small ml-2"></i>اخبار</a>

            <a href="{{ route('admin-blog-list','article') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>مقالات</a>

            <a href="{{ route('admin-article-comment-list') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>نظرات @if(count($comment_blog))<span style="color: red;">
                    ({{count($comment_blog)}} جدید )</span>@endif</a>
        </div>
    </div>

    <div class="sidebar-a list-group-item list-group-item-action" id="b7">
        <i class="fas fa-circle-notch text-size-small ml-2"></i>فرم ها
        <div class="sidebar-ul" id="s7">
            <a href="{{ route('admin-contact-list') }}" class="list-group-item list-group-item-action">
               <i class="fas fa-circle-notch text-size-small ml-2"></i>تماس با ما@if(count($contact))
               <span style="color: red;"> ({{count($contact)}} جدید )</span>@endif</a>

            <a href="{{ route('admin.employment.list') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>استخدام ها @if(count($employment))<span style="color: red;">
                    ({{count($employment)}} جدید )</span>@endif</a></a>
        </div>
    </div> --}}
    {{-- <div class="sidebar-a list-group-item list-group-item-action" id="b12">
        <i class="fas fa-circle-notch text-size-small ml-2"></i>طراحی صفحات<div class="sidebar-ul" id="s12">

            <a href="{{ route('admin-slider-list') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>اسلایدر</a>

            <div class="sidebar-a list-group-item list-group-item-action" id="b3">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>صفحه درباره ما
                <div class="sidebar-ul" id="s3">

                    <a href="{{ route('admin-about-edit',1) }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>درباره ما</a>
                    
                    <a href="{{route('admin-about-team-list')}}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>سرمایه انسانی</a>

                    <a href="{{route('admin-about-bank-list')}}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>بانک ها</a>

                    <a href="{{route('admin-about-feature-list')}}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>دستاوردها</a>
                </div>
            </div>

            <a href="{{route('admin-about-branch-list')}}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>لیست شعب</a>
            
            <div class="sidebar-a list-group-item list-group-item-action" id="b4">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>سوالات متداول<div class="sidebar-ul" id="s4">

                    <a href="{{ route('admin-faq-cat-list') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>دسته بندی ها</a>
                        
                    <a href="{{ route('admin-faq-list') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>سوالات</a>

                </div>
            </div> --}}

            {{--<a href="{{route('admin-about-faq-list')}}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>سوالات متداول درباره ما</a>

            <a href="{{ route('admin-learn-category.index') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>مشاهده دسته بندی ها
            </a>
            
            <a href="{{route('admin-video.index')}}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>مشاهده ویدئو ها
            </a> --}}
            
            {{-- <div class="sidebar-a list-group-item list-group-item-action" id="b6">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>فرصت های شغلی<div class="sidebar-ul" id="s6">
                    
                    <a href="{{ route('admin.employment.page.edit') }}" class="list-group-item list-group-item-action">
                       <i class="fas fa-circle-notch text-size-small ml-2"></i>ویرایش فرم</a>

                    <a href="{{ route('admin.employment.page.list') }}" class="list-group-item list-group-item-action">
                       <i class="fas fa-circle-notch text-size-small ml-2"></i>لیست فرصت ها</a>

                </div>
            </div>

            <div class="sidebar-a list-group-item list-group-item-action" id="b5">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>محتوا<div class="sidebar-ul" id="s5">

                    <a href="{{ route('admin-menu-information.index') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>محتوا داخلی صفحات</a>

                    <a href="{{ route('admin_show_certificate') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>گواهینامه ها</a>
                    
                    <a href="{{ route('admin-menu-list') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>صفحات داینامیک</a> --}}

                    {{-- <a href="{{ route('admin_show_product_doctor') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>توصیه های پزشکی</a> --}}
                    
                    {{-- <a href="{{ route('admin-contact-info-edit',1) }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>تماس با ما</a>
                    
                    <a href="{{ route('admin-partner-list') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>شرکای استراتژیک</a> --}}

                    {{-- <a href="{{ route('upload') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-circle-notch text-size-small ml-2"></i>آپلود فایل</a> --}}
{{-- 
                </div>
            </div>

        </div>
    </div> --}}

    {{-- <div class="sidebar-a list-group-item list-group-item-action" id="b8">
        <i class="fas fa-circle-notch text-size-small ml-2"></i>تنظیمات <div class="sidebar-ul" id="s8">


            <a href="{{ route('admin-setting-edit',1)}}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>تنظیمات سایت</a>

            <a href="{{ route('admin-user-list') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>لیست کاربران</a>

            <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>گروه های کاربری (بزودی)</a>

            <a href="{{ route('meta-list') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-circle-notch text-size-small ml-2"></i>متاهای سایت</a>
        </div>
    </div>
    <a href="{{ route('admin-activities') }}"
       class="list-group-item list-group-item-action"><i
                class="fas fa-circle-notch text-size-small ml-2"></i>گزارشات</a>
</div> --}}