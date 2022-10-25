
@extends('layouts.user')
@section('css_style') @endsection
@section('body')
    <link rel="stylesheet" type="text/css" href="{{asset('user/front/index.css')}}"/>
    <div id="carouselExampleCaptions" class="carousel slide slider_index carousel-fade" data-interval="7000"
        data-ride="carousel">
        <div class="carousel-inner">
            @if(count($sliders))
                @foreach($sliders as $key=> $slider)
                    <div class="carousel-item {{$key==0?'active':''}}">
                        <img src="{{$slider->photo && is_file($slider->photo->path)?url($slider->photo->path):asset('user/pic/SL-02.jpg')}}" class="d-block w-100"
                            alt="{{set_lang($slider,'title',app()->getLocale())}}">
                        @if(is_file($slider->img_top))
                            <div class="animated_img">
                                <img src="{{url($slider->img_top)}}">
                            </div>
                        @endif
                        @if($slider->text1)
                            <div class="d-sm-none text-light">
                                <div class="prime text-dark">
                                    <h5>{{$slider->text1}}</h5>
                                    @if($slider->title)
                                        <h6>{{$slider->title}}</h6>
                                    @endif
                                    <div class="sm-box-row m-0" >
                                        @if($slider->btn1_t || $slider->btn1_u)
                                            <a class="sm-box" href="{{$slider->btn1_u??'#'}}">{{$slider->btn1_t??'مشاهده'}}</a>
                                        @endif
                                        @if($slider->btn2_t || $slider->btn2_u)
                                                <a class="sm-box" href="{{$slider->btn2_u??'#'}}">{{$slider->btn2_t??'مشاهده'}}</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="animated_text slider_text text-center">
                                <h2>
                                    {{$slider->text1}}
                                    @if($slider->title)
                                        <div class="h4">{{$slider->title}}</div>
                                    @endif  
                                </h2>
                                <div class="row box-row m-0" >
                                    @if($slider->btn1_t || $slider->btn1_u)
                                    <div class="col bg-warning box-col" >
                                        <a href="{{$slider->btn1_u??'#'}}">{{$slider->btn1_t??'مشاهده'}}</a>
                                    </div>
                                    @endif
                                    @if($slider->btn2_t || $slider->btn2_u)
                                    <div class="col bg-secondary box-col">
                                        <a href="{{$slider->btn2_u??'#'}}">{{$slider->btn2_t??'مشاهده'}}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="{{asset('user/pic/SL-02.jpg')}}"
                        class="d-block w-100" alt="کارگزاری حافظ">
                </div>
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{--    category--}}
    @if(count($menu_slider_downs))
        <section id="menu_slider_downs" class="why_choose bg-white teams pb-0 mt-2" style="margin-bottom: 160px;">
            <div class="container">
                <div class="eval">
                    <div class="eval-body">
                        <div class="row">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>دسترسی سریع</h4>
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                {{-- <div>
                    <div class="line d-flex mb-4 mt-5 py-lg-5 pr-4 pr-lg-2">
                        <span class="dot"></span>
                        <div class="line-left"></div>
                        <h4>دسترسی سریع</h4>
                        <div class="line-right"></div>
                        <span class="dot"></span>
                    </div>
                </div> --}}
                <div class="row">
                    @foreach($menu_slider_downs as $key=>$page)
                    
                        <a class="col-lg-4 @if($key==1) my-100 @endif" href="{{$page->link}}">
                            <div class="card1">
                                <img alt="{{$page->name}}" class="card1_img" style="border-radius: 6px;" src="{{is_file($page->pic)?url($page->pic):url('includes/asset/user/pic/user.png')}}">
                            </div>
                            <div class="card1_in rounded" style="position: absolute;bottom: -184px;right: 50%;transform: translateX(50%);text-align: center;min-width: 190px;">
                                <div class="card1_text">
                                    <h4 class="card1_name p-1 px-3" style="border-radius: 6px;color: white;background: rgb(165, 125, 36);">{{$page->name}}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section id="two">  
        <div class="container">
            <div class="mt-5 pt-4 pt-lg-5">
                <div class="eval">
                    <div class="eval-body">
                        <div class="row">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>حافظ در یک نگاه</h4>
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="line d-flex my-4 pr-3 pr-lg-0 pt-5">
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>حافظ در یک نگاه</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg mb-5 mb-lg-0 mt-85">
                    <h4 class="fitish-mitish">چرا حافظ برای سرمایه گذاری مناسب است ؟</h4>
                    <div class="line-o"></div>
                    <ul class="fitish">
                        <li>
                            <div class="d-flex">
                                <span class="dot dot-2"></span>
                                <div class="line-e"></div>
                                <h6>مشاوره هوشمند حافظ</h6>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <span class="dot dot-2"></span>
                                <div class="line-e"></div>
                                <h6>سبدگردانی اختصاصی حافظ</h6>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <span class="dot dot-2"></span>
                                <div class="line-e"></div>
                                <h6>کاملا متناسب با اهداف شما</h6>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <span class="dot dot-2"></span>
                                <div class="line-e"></div>
                                <h6>با اطمینان سرمایه گذاری کنید</h6>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <span class="dot dot-2"></span>
                                <div class="line-e"></div>
                                <h6>راهنمای شما برای انتخاب بهترین</h6>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg">
                    <div class="row">
                        <div class="col white-box ">
                            <div class="one mb-5" style="background: #f8f9fa;border-radius: 0px 30px 0px 0px;">
                                <img src="{{ asset('user/pic/5.png') }}" alt="">
                                <div class="third-hover-one">
                                    ۷ امین کارگذاری از لحاظ حجم معاملات در سال ۹۹
                                </div>
                            </div> 
                            <div class="tree" style="background: #f8f9fa;border-radius: 0px 0px 30px;">
                                <img src="{{ asset('user/pic/7.png') }}" alt="">
                                <div class="third-hover-tree">
                                    ۱۵۳۰ هزار میلیارد ریال گردش مالی سال ۹۹
                                </div>
                            </div>
                        </div>
                        <div class="col mt-5 white-box ">
                            <div class="two mb-5" style="background: #f8f9fa;border-radius: 30px 0px 0px;"> 
                                <img src="{{ asset('user/pic/6.png') }}" alt="">
                                <div class="third-hover-two">
                                    ۵۰۰ میلیارد ریال سرمایه ثبتی
                                </div>
                            </div>
                            <div class="four" style="background: #f8f9fa;border-radius: 0px 0px 0px 30px;">
                                <img src="{{ asset('user/pic/8.png') }}" alt="">
                                <div class="third-hover-four">
                                    ۲۲ شعبه فعال در سراسر کشور
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    blogs--}}
    @if(count($blogs))
        <section id="blogs" class="section_blogs mt-5">
            <div class="container">
                <div class="eval">
                    <div class="eval-body">
                        <div class="row">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>مجله حافظ</h4>
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="line d-flex my-5 pl-2">
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>مجله حافظ</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div> --}}
                <div class="d-none">{{$i = 1}}</div>
                @foreach($blogs as $blog)
                    <div class="d-none">{{$i += 1}}</div>
                    <div class="lts_blogpost_item row">
                        @if ($i%2 == 0)
                            <div class="col-lg d-none d-lg-block">
                                <div class="lts_blg_sm_image">
                                    <img src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($blog,'title',app()->getLocale())}}">
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="lts_blg_text padd-none p-3 p-lg-4">

                                    <img class="d-lg-none" style="border-radius: 24px 4px;" src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($blog,'title',app()->getLocale())}}">

                                    <h2 class="mb-0" style="color: #a57d24">{{set_lang($blog,'title',app()->getLocale())}}</h2>
                                    <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}">
                                        <p class="d-none d-lg-block m-0 p-0" style="color: #646464 !important">
                                            {{str_limit(set_lang($blog,'short_text',app()->getLocale()),'300','...')}}
                                        </p>
                                        <p class="d-lg-none m-0 p-0" style="color: #646464 !important">
                                            {{str_limit(set_lang($blog,'short_text',app()->getLocale()),'200','...')}}
                                        </p>
                                        <div class="float-left" style="border-bottom: 1px solid #a57d24;">
                                            {{__('text.read_more')}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            {{-- <div class="d-lg-none col-lg">
                                <div class="lts_blg_sm_image">
                                    <img style="border-radius: 24px 4px;" src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($blog,'title',app()->getLocale())}}">
                                </div>
                            </div> --}}
                            <div class="col-lg-9">
                                <div class="lts_blg_text padd-none p-3 p-lg-4" style="margin-right: 0%;margin-left: 6%;">
                                    
                                    <img class="d-lg-none" style="border-radius: 24px 4px;" src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($blog,'title',app()->getLocale())}}">

                                    <h2 class="mb-0" style="color: #a57d24">{{set_lang($blog,'title',app()->getLocale())}}</h2>
                                    <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}">
                                        <p class="d-none d-lg-block m-0 p-0" style="color: #646464 !important">
                                            {{str_limit(set_lang($blog,'short_text',app()->getLocale()),'300','...')}}
                                        </p>
                                        <p class="d-lg-none m-0 p-0" style="color: #646464 !important">
                                            {{str_limit(set_lang($blog,'short_text',app()->getLocale()),'200','...')}}
                                        </p>
                                        <div class="float-left" style="border-bottom: 1px solid #a57d24;">
                                            {{__('text.read_more')}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="d-none d-lg-block col-lg d-none d-lg-block">
                                <div class="lts_blg_sm_image" style="margin-left: 0%;margin-right: 20%;">
                                    <img style="border-radius: 24px 4px;" src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($blog,'title',app()->getLocale())}}">
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section id="tree">
        <div class="container mt-5 pt-lg-5">
            <div class="row mx-lg-5 px-lg-5 mt-lg-5 pt-5">
                <div class="d-none d-lg-block col">
                    <img src="{{ asset('user/pic/12.png') }}" alt="">
                </div>
                <div class="col text-center text-white pb-5 pb-lg-0">
                    <img src="{{ asset('user/pic/11.png') }}" alt="">
                    <div>
                        <h5 class="my-3">هدف ما ایجاد ارتباط بین شما و موفقیت است</h5>
                        <h5>باشگاه مشتریان حافظ</h5>
                    </div> 
                    <div class="my-3">
                        <a href="https://club.hafezbroker.ir" class="bg-dark p-1 px-2 rounded text-white">ورود به باشگاه مشتریان</a>
                    </div>
                    <div class="mb-2">
                        @if($contact_info && $contact_info->phone1)
                            <span>
                                <i class="fas fa-phone-alt"></i>
                            </span>
                             تلفن :  
                            <a class="text-white" href="tel:{{str_replace('-','',$contact_info->phone1)}}">
                                {{set_lang($contact_info,'phone1',app()->getLocale())}}
                            </a>
                        @endif
                    </div>
                    <div >
                        @if($contact_info && $contact_info->email1)
                            <span>
                                <i class="fa fa-envelope" style="font-size: 16px;"></i>
                            </span>
                             ایمیل : 
                            <a class="text-white" href="mailto:{{$contact_info->email1}}">
                                {{$contact_info->email1}}
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if(count($partners))
        <section id="partners" class="section_partners">
            <div class="container">
                <div class="eval pt-lg-5">
                    <div class="eval-body">
                        <div class="row">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>شرکای استراتژیک</h4>
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="line d-flex mt-5 pr-1">
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>شرکای استراتژیک</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div> --}}
                <div class="row mb-lg-4">
                    <div class="col-12">
                        <!-- Swiper --> 
                        <div class="swiper-container swiper-partners">
                            <div class="swiper-wrapper">
                                @foreach($partners as $key=>$partner)
                                    @if($partner->photo)
                                        <div class="swiper-slide">
                                            @if($partner->link)
                                                <a href="{{$partner->link}}" target="_blank">
                                                    <img src="{{$partner->photo->path}}"
                                                        alt="{{set_lang($partner,'name',app()->getLocale())}}">
                                                    <p>{{$partner->name}}</p>
                                                </a>
                                            @else
                                                <span>
                                                    <img src="{{$partner->photo->path}}"
                                                        alt="{{set_lang($partner,'name',app()->getLocale())}}">
                                                <p>{{$partner->name}}</p>
                                            </span>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-button-next partners">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="swiper-button-prev partners">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection