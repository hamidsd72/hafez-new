@extends('layouts.user')
@section('css_style') @endsection
@section('body')
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
                            <div class="animated_text slider_text">
                                <h2>
                                    {{$slider->text1}}
                                </h2>
                                @if($slider->title)
                                    <span>{{$slider->title}}</span>
                                @endif
                                @if($slider->url)
                                    <a href="{{$slider->url}}" class="btn_default">مشاهده</a>
                                @endif
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
        <section class="section_category">
            <div class="container">
                <div class="row">
                    @foreach($menu_slider_downs as $key=>$page)
                        <div class="col-lg-3 col-sm-6 mx-auto">
                            <a
                                    href="{{$page->link!=null && $page->link!='#' && $page->link!=''?$page->link:route('user.page.show',app()->getLocale()=='fa'?$page->slug:$page->slug_en)}}"
                                    @if($page->link!=null && $page->link!='#' && $page->link!='') target="_blank" @endif
                            >
                                <div class="service__image @if(count($menu_slider_downs)>2) {{$key%2==0?'img-up-1':'img-up-2'}} @endif"
                                     style="background: url('{{$page->pic?url($page->pic):url('includes/asset/user/pic/nopic.jpg')}}')">
                                    <div class="custom-border-gap bg-image">
                                        <span class="custom-border-gap__border float-left"></span>
                                        <span class="custom-border-gap__border float-right"></span>
                                        <div class="service_title">
                                            <h3>{{set_lang($page,'name',app()->getLocale())}} </h3>
                                            {{--                                <p>--}}
                                            {{--                                    surgery--}}
                                            {{--                                </p>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                {{--                <div class="col-12">--}}
                {{--                    <a href="{{route('user.product.category.index','all_category')}}"--}}
                {{--                       class="fancy-btn">{{__('text.index.btn_view_cat')}}</a>--}}
                {{--                </div>--}}
            </div>
        </section>
    @endif
    {{-- about_us--}}
    <section class="section_about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_gif">
                        <video autoplay="" loop="" muted="">
                            <source src="https://adibhost.com/hafez/includes/asset/uploads/files/file-b4564e78466d72fe0066b59a8464d3f8.mp4"
                                    type="video/mp4">
                        </video>
                        {{--                        <img src="https://adibhost.com/hafez/includes/asset/uploads/files/file-3a8b15fcd0b324ba31c4c98d572b6732.gif" alt="چرا حافظ">--}}
                        <div class="about_gif_title1">
                            شرکت شما چه خدماتی در زمینه سرمایه گذاری ارائه میدهد؟
                        </div>
                        <div class="about_gif_title2">
                            کار ما سرمایه گذاری برای افرادی است که می خواهند بیش از تورم، سود کسب کنند
                        </div>
                    </div>
                </div>
                <div class="col-md-6 about_text">
                    <div class="text_sum">
                        <h1>با اطمینان سرمایه گذاری کنید</h1>
                        <h2>در حافظ، حرفه ای ها سرمایه شما را مدیریت می کنند.</h2>
                        <p>نخستین شرکت مدیریت دارایی در ایران </p>
                        <p>دارای بیش از چهل هزار مشتری فعال</p>
                        <p>مدیر بزرگترین صندوق با درآمد ثابت در بورس</p>
                        <p>تحت نظارت سازمان بورس و اوراق بهادار</p>

                        <a href="" class="btn_default fs-17">
                            چرا حافظ؟
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--    about--}}
    <section class="section_about_home">
        <div class="overlay sec-pad">
            <div class="container">
                <div class="sec_middle_title">
                    <h1>{{set_lang($about,'index_title',app()->getLocale())}}</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @if($about->photos && count($about->photos))
                            <div id="myCarousel_about" class="carousel slide my_carousel_about" data-ride="carousel"
                                 data-interval="5000">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach($about->photos as $key=>$photo)
                                        <div class="carousel-item {{$key==0?'active':''}}">
                                            <img src="{{$photo->path?url($photo->path):url('includes/asset/user/pic/nopic.jpg')}}"
                                                 alt="{{set_lang($about,'index_title',app()->getLocale())}}">
                                        </div>
                                    @endforeach
                                </div>
                            @if(count($about->photos)>1)
                                <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#myCarousel_about" role="button"
                                       data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true">
        {{--                                <i class="fas fa-chevron-left"></i>--}}
                                    </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel_about" role="button"
                                       data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true">
        {{--                                <i class="fas fa-chevron-right"></i>--}}
                                    </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8 col-md-10 mx-auto about_text">
                        {!! set_lang($about,'index_text',app()->getLocale()) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- about_us--}}
    <section class="section_about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_gif">
                        <video autoplay="" loop="" muted="">
                            <source src="https://adibhost.com/hafez/includes/asset/uploads/files/file-87687073463e09d900edc00717e5933d.mp4"
                                    type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-md-6 about_text">
                    <div class="text_sum">
                        <h1>مشاوره هوشمند حافظ</h1>
                        <h2>راهنمای شما برای انتخاب بهترین سرمایه گذاری</h2>
                        <p>افراد شرایط متفاوتی از نظر میزان ریسک پذیری و بازه زمانی مورد پذیرش برای سرمایه گذاری دارند.
                            مشاور هوشمند ما با بررسی شرایط و اهداف شما، بهترین توصیه را به شما خواهد کرد. </p>

                        <a href="" class="btn_default fs-17">
                            شروع مشاوره
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- parallax--}}
    <section class="section_parallax"
             style="background-image: url('https://adibhost.com/hafez/includes/asset/uploads/files/file-f2678527b8a341901579e490bfb879f4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="text">
                        <h2>در سرتاسر ایران زمین، حافظ سرمایه شماییم...</h2>
                        <p>
                            با ۲۲ شعبه فعال در سراسر ایران عزیز؛ کارگزاری حافظ آماده خدمت رسانی به تمامی هم میهنان عزیز
                            است.
                        </p>
                        <a href="" class="btn_default">شعب کارگزاری حافظ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- about_us--}}
    <section class="section_about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_gif">
                        <video autoplay="" loop="" muted="" class="mt-70-sm mt-2">
                            <source src="https://adibhost.com/hafez/includes/asset/uploads/files/file-b4564e78466d72fe0066b59a8464d3f8.mp4"
                                    type="video/mp4">
                        </video>
                        {{--                        <div class="about_gif_title1_1">--}}
                        {{--                            آیا می توانم نظارت کاملی روی سرمایه گذاری و سهامی که برایم خریداری میشود داشته باشم؟--}}
                        {{--                        </div>--}}
                        {{--                        <div class="about_gif_title2_1">--}}
                        {{--                            سبدگردانی اختصاصی این امکان  را به شما میدهد که ضمن آگاهی کامل از وضعیت پورتفوی خود، حتی بتوانید اعمال نظر هم بکنید--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-6 about_text">
                    <div class="text_sum">
                        <h1>سبدگردانی اختصاصی حافظ</h1>
                        <h2>کاملا متناسب با اهداف شما</h2>
                        <p>مدیریت سرمایه خود را به یک مدیر حرفه ای بسپارید تا در راستای اهداف شما، بازدهی سرمایه شما را
                            به حداکثر برساند. روشی ایده آل برای مدیریت سرمایه های بالای یک میلیارد تومان. </p>

                        <a href="" class="btn_default fs-17">
                            بیشتر بخوانید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    Targets--}}
    @if(count($abouts_f))
        <section class="section_target">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="flw-bg" style="background: url('{{url('includes/asset/user/pic/flw-bg.jpg')}}')">
                            <img src="{{url($setting->featur_pic)}}"
                                 alt="{{set_lang($setting,'title',app()->getLocale())}}">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="why-point">
                            <div class="sec_middle_title">
                                <p>{{__('text.index.target_titel_1')}}</p>
                                {{--                                <h1>{{__('text.index.target_titel_2')}}</h1>--}}
                            </div>

                            <ul>
                                @foreach($abouts_f as $key=>$about_f)
                                    <li>
                                        <div class="widget-icon padd-l-10">
                                            <img src="{{$about_f->pic?url($about_f->pic):url('includes/asset/user/pic/noicon.png')}}"
                                                 alt="{{set_lang($about_f,'title',app()->getLocale())}}">
                                        </div>
                                        <h3>{{set_lang($about_f,'title',app()->getLocale())}}</h3>
                                        <p>
                                            {{set_lang($about_f,'text',app()->getLocale())}}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{--    partners--}}
    @if(count($partners))
        <section class="section_partners">
            <div class="container">
                <div class="sec_middle_title partner">
                    <h1 class="uppercase">{{__('text.index.partners_title')}}
                        <span class="left"></span>
                        <span class="right"></span>
                    </h1>
                </div>
                <div class="row">
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
    {{--    certificate--}}
    @if(count($certs))
        <section class="section_certificate">
            <div class="container">
                <div class="sec_middle_title">
                    <h1 class="uppercase">{{__('text.index.cert_title')}}</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Swiper -->
                        <div class="swiper-container swiper-cert">
                            <div class="swiper-wrapper">
                                @foreach($certs as $key=>$cert)
                                    <div class="swiper-slide"
                                         href="{{$cert->pic?url($cert->pic):url('includes/asset/user/pic/nopic.jpg')}}"
                                         data-fancybox="cert_gallery">
                                        <div class="img_box">
                                            <img src="{{$cert->pic?url($cert->pic):url('includes/asset/user/pic/nopic.jpg')}}"
                                                 alt="{{set_lang($cert,'title',app()->getLocale())}}">
                                        </div>
                                        <div class="text_box">
                                            <h5>{{set_lang($cert,'title',app()->getLocale())}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next cert">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div class="swiper-button-prev cert">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{--    blogs--}}
    @if(count($blogs))
        <section class="section_blogs">
            <div class="container">
                <div class="sec_middle_title partner">
                    <h1 class="uppercase">{{__('text.index.blog_title')}}
                        <span class="left"></span>
                        <span class="right"></span>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="lts_blogpost_item"
                             onclick="return window.location.href='{{route('user.blog.show',[$blogs[0]->type,app()->getLocale()=='fa'?$blogs[0]->slug:$blogs[0]->slug_en])}}'">
                            <div class="lts_blg_image">
                                <img src="{{$blogs[0]->photo?url($blogs[0]->photo->path):url('includes/asset/user/pic/nopic.jpg')}}"
                                     alt="{{set_lang($blogs[0],'title',app()->getLocale())}}">
                            </div>
                            <div class="lts_blg_text">
                                <div class="author_rea_area">
                                    <a href="{{route('user.blog.show',[$blogs[0]->type,app()->getLocale()=='fa'?$blogs[0]->slug:$blogs[0]->slug_en])}}"><i
                                                class="fas fa-calendar-alt"></i><span> @if(app()->getLocale()=='fa') {{my_jdate($blogs[0]->created_at,'d F Y')}} @else {{date('d F Y', strtotime($blogs[0]->created_at))}} @endif </span></a>
                                    <a href="{{route('user.blog.show',[$blogs[0]->type,app()->getLocale()=='fa'?$blogs[0]->slug:$blogs[0]->slug_en])}}"><i
                                                class="far fa-comments"></i><span>{{__('text.comment')}}</span> {{count($blogs[0]->comments)}}
                                    </a>
                                </div>
                                <a href="{{route('user.blog.show',[$blogs[0]->type,app()->getLocale()=='fa'?$blogs[0]->slug:$blogs[0]->slug_en])}}">
                                    <h2>{{set_lang($blogs[0],'title',app()->getLocale())}}</h2></a>
                                <p>
                                    {{str_limit(set_lang($blogs[0],'short_text',app()->getLocale()),'150','...')}}
                                </p>
                                <a href="{{route('user.blog.show',[$blogs[0]->type,app()->getLocale()=='fa'?$blogs[0]->slug:$blogs[0]->slug_en])}}">{{__('text.read_more')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @foreach($blogs as $key=>$blog)
                            @if($key>0)
                                <div class="lts_blogpost_item"
                                     onclick="return window.location.href='{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}'">
                                    <div class="lts_blg_sm_image">
                                        <img src="{{$blog->photo?url($blog->photo->path):url('includes/asset/user/pic/nopic.jpg')}}"
                                             alt="{{set_lang($blog,'title',app()->getLocale())}}">
                                    </div>
                                    <div class="lts_blg_text padd-none">
                                        <div class="author_rea_area">
                                            <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}"><i
                                                        class="fas fa-calendar-alt"></i><span> @if(app()->getLocale()=='fa')
                                                        {{my_jdate($blog->created_at,'d F Y')}} @else {{date('d F Y', strtotime($blog->created_at))}} @endif </span></a>
                                            <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}"><i
                                                        class="far fa-comments"></i><span>{{__('text.comment')}}</span>
                                                {{count($blog->comments)}}</a>
                                        </div>
                                        <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}">
                                            <h2>{{set_lang($blog,'title',app()->getLocale())}}</h2></a>
                                        <a href="{{route('user.blog.show',[$blog->type,app()->getLocale()=='fa'?$blog->slug:$blog->slug_en])}}">{{__('text.read_more')}}</a>
                                    </div>
                                </div><!-- / lts_blogpost_item-->
                                @if($key+1<count($blogs))
                                    <hr>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('js')

@endsection
