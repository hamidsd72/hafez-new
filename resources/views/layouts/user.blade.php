<!DOCTYPE html>
<html dir="{{app()->getLocale()=='fa'?'rtl':'ltr'}}" lang="{{ app()->getLocale() }}">
<head>

    @yield('seo')
    @if (trim($__env->yieldContent('title')))
        @yield('title')
    @else
        <title>
            {{$titleSeo}}
            </title>
    @endif
    @if (trim($__env->yieldContent('meta')))
        @yield('meta')
    @else
        <meta name="description" content="{{$descriptionSeo}}"/>
        <meta http-equiv="keyword" name="keyword" content="{{ $keywordsSeo }}"/>
        <meta property="og:title" content="{{$titleSeo}}"/>
        <meta property="og:description" content="{{$descriptionSeo}}"/>
    @endif
    <meta property="og:url" content="{{$urlPage}}"/>
    <meta property="og:site_name" content="{{set_lang($setting,'title',app()->getLocale())}}"/>
    <meta property="og:image" content="{{url($setting->icon)}}"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <link rel="canonical" href="{{$urlPage}}"/>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link rel="icon" type="image/png" sizes="32x32" href="{{url($setting->icon)}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.3/swiper-bundle.css" integrity="sha512-A2XlrIz+6ozKVA/ySfcVrioNpqK0UchJNW7/df1rmjgv7kfncmEq4rhCaTwWC/ebfWYl1R2szvOGB66bzNa6hg==" crossorigin="anonymous" />
    @if(app()->getLocale()=='en')
        <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style_ltr.css') }}"/>
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('css/some-font.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style_rtl.css') }}"/>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.css') }}"/>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        ul.navbar-nav .nav-item a.nav-link svg>path { color: #FFF !important; }
        #btn_mobile_menu svg>path { color: #FFF !important; }
    </style>
    @yield('css_style')
</head>
<body class="{{app()->getLocale()=='fa'?'d-rtl':'d-ltr'}}">
@include('layouts.header_user1',['setting'=>$setting,'contact_info'=>$contact_info,'product_cat'=>$product_cat,'product_category'=>$product_category,'product_type'=>$product_type])
<div class="wat_sapp wat_sapp1 ">
    <a target="_blank" rel="noreferrer" href="tel:{{str_replace(['-',' '],'',set_lang($contact_info,'phone1',app()->getLocale()))}}">
        <img class="social_img" src="{{asset('user/pic/phone.png')}}" alt="تماس با حافظ">
    </a>
    <a class="top mr-lg-3" href="#" onclick="$('html, body').animate({ scrollTop: 0 }, 'slow');">
        <img class="social_img" style="border: 1px solid #A57D24" src="{{asset('user/pic/home.jpg')}}" alt="خانه">
    </a>
</div>
<main class="mt-4 mt-lg-0">
    @yield('body')
</main>
<footer class="footer">
    <div class="position-relative">
        {{-- <iframe src="{{$contact_info->map}}" width="100%" height="450" frameborder="0" allowfullscreen=""></iframe> --}}
        <div class="mx-auto mt-4" style="width: 100%;max-width: 1200px;">
            <div class="container p-4">
                <div class="row d-sm-pt-100">
                    <div class="col-6 col-lg-2">
                        <aside class="f_widget">
                            <div class="f_title">
                                <h3 style="padding-bottom: 18px;">{{__('text.footer_down.quick_link')}}</h3>
                            </div>
                            <div class="link_widget">
                                <ul>
                                    @foreach($menu_r as $page_r)
                                        <li><a href="{{$page_r->link}}">{{$page_r->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-6 col-lg-2" style="margin-top: 41px;">
                        <aside class="f_widget">
                            {{-- <div class="f_title">
                                <h3>
                                    {{__('text.footer_down.page')}}
                                </h3>
                            </div> --}}
                            <div class="link_widget">
                                <ul>
                                    @foreach($menu_l as $page_l)
                                        <li><a href="{{$page_l->link}}">{{$page_l->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                    {{-- <div class="col-sm-3">
                        <aside class="f_widget">
                            <div class="f_title">
                            <h3>{{__('text.footer_up.address')}}</h3>
                            </div>
                            <div class="link_widget">
                                <ul class="light">
                                    <li style="padding-left: 45px;">
                                        <a href="https://www.google.com/maps/place/Darou+Darman+Pars+Co./@35.7614003,51.3946474,17z/data=!3m1!4b1!4m5!3m4!1s0x3f8e06fe93bac66d:0xe133c8a7dc9ca5ea!8m2!3d35.7614084!4d51.3924578" target="_blank">
                                            {{__('text.footer_up.address')}} : 
                                            {{set_lang($contact_info,'address',app()->getLocale())}}
                                        </a>
                                    </li>
                                    <li>
                                        @if(!is_null(set_lang($contact_info,'phone1',app()->getLocale())))
                                            <a href="tel:{{str_replace('-','',set_lang($contact_info,'phone1',app()->getLocale()))}}">
                                                {{__('text.footer_up.phone')}} : 
                                                {{set_lang($contact_info,'phone1',app()->getLocale())}}
                                            </a>
                                        @endif
                                        @if(!is_null(set_lang($contact_info,'phone2',app()->getLocale())))
                                            <br><br>
                                            <a href="tel:{{str_replace('-','',set_lang($contact_info,'phone2',app()->getLocale()))}}">
                                                {{__('text.footer_up.phone')}} : 
                                                {{set_lang($contact_info,'phone2',app()->getLocale())}}
                                            </a>
                                        @endif
                                    </li>
                                    <li> 
                                        @if(!is_null($contact_info->email1))
                                            <a href="mailto:{{$contact_info->email1}}">
                                                {{__('text.footer_up.email')}} :
                                                {{$contact_info->email1}}
                                            </a>
                                        @endif
                                        @if(!is_null($contact_info->email2))
                                            <a href="mailto:{{$contact_info->email2}}">
                                                {{__('text.footer_up.email')}} :
                                                {{$contact_info->email2}}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div> --}}
                    {{-- <div class="col-sm-3">
                        <aside class="f_widget">
                            <div class="f_title">
                                <h3>{{__('text.footer_up.social_networks')}}</h3>
                            </div>
                            <div class="link_widget py-3">
                                <ul class="header_social footer_social">
                                    @if(!is_null($contact_info->aparat))
                                        <li><a href="{{$contact_info->aparat}}"><img src="{{asset('user/pic/aparat.png')}}" alt="آپارات حافظ"></a></li>
                                    @endif
                                    @if(!is_null($contact_info->linkdin))
                                        <li><a href="{{$contact_info->linkdin}}"><i class="fab fa-linkedin"></i></a></li>
                                    @endif
                                    @if(!is_null($contact_info->facebook))
                                        <li><a href="{{$contact_info->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if(!is_null($contact_info->instagram))
                                        <li><a href="{{$contact_info->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if(!is_null($contact_info->telegram))
                                        <li><a href="{{$contact_info->telegram}}"><i class="fab fa-telegram-plane"></i></a></li>
                                    @endif
                                    @if(!is_null($contact_info->whatsapp))
                                        <li><a href="{{$contact_info->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </aside>
                    </div> --}}
                    <div class="d-none d-lg-block col-lg text-left">
                        <img src="{{ url($setting->featur_pic) }}" style="max-height: 184px;opacity: 0.2;" alt="حافظ">
                    </div>
                </div>
            </div>
        
            <div class="text-center">
                <ul class="header_social footer_social">
                    @if(!is_null($contact_info->facebook))
                        <li><a href="{{$contact_info->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if(!is_null($contact_info->instagram))
                        <li><a href="{{$contact_info->instagram}}"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if(!is_null($contact_info->aparat))
                    @if(!is_null($contact_info->telegram))
                        <li><a href="{{$contact_info->telegram}}"><i class="fab fa-telegram-plane"></i></a></li>
                    @endif
                    @if(!is_null($contact_info->whatsapp))	
                        <li><a href="{{$contact_info->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                    @endif
                        <li><a href="{{$contact_info->aparat}}">
                            <i class="fab fa-youtube"></i>
                            {{-- <img src="{{asset('user/pic/aparat.png')}}" alt="آپارات حافظ"> --}}
                        </a></li>
                    @endif
                    @if(!is_null($contact_info->linkdin))
                        <li><a href="{{$contact_info->linkdin}}"><i class="fab fa-linkedin"></i></a></li>
                    @endif
                    <div class="text-secondary" href="#">تمامی حقوق این صفحات متعلق به شرکت کارگزاری حافظ است</div>
                </ul>
            </div>
            <hr/>
            {{-- <div class="my-3 my-lg-0 footer_copy d-ltr">
                <p>
                    Design by:
                    <a href="https://adib-it.com/" target="_blank" rel="noreferrer">Adib Groups</a>
                </p>
            
                <p dir="rtl">
                    تمامی حقوق این صفحات متعلق به شرکت کارگزاری حافظ است.
                </p>
            </div> --}}
        </div>
    </div>
</footer>
{{--scripts--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.3/swiper-bundle.min.js" integrity="sha512-f5raXjCuok1zLkRjJJm7AMVZ65Kgr8SK85CMOZJ5ytAoHLi/Z+c3T78tm1fYuAVaeo6qLUySmE1rqY8hjSy6mA==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('user/js/script.js')}}"></script>
{{--msg--}}
<script>
    // google recapcha3
    function onSubmit(token) {
        document.getElementById("hafez_form").submit();
    }

  @if(session()->has('err_message'))
  $(document).ready(function () {
      Swal.fire({
          title: "{{__('text.success_not')}}",
          text: "{{ session('err_message') }}",
          icon: "warning",
          timer: 6000,
          timerProgressBar: true,
      })
  });
  @endif
  @if(session()->has('flash_message'))
  $(document).ready(function () {
      Swal.fire({
          title: "{{__('text.success')}}",
          text: "{{ session('flash_message') }}",
          icon: "success",
          timer: 6000,
          timerProgressBar: true,
      })
  })
  ;@endif
{{--  @if ($errors && count($errors) > 0)--}}
{{--  $(document).ready(function () {--}}
{{--      Swal.fire({--}}
{{--          title: "ناموفق",--}}
{{--          icon: "warning",--}}
{{--          html:--}}
{{--                  @foreach ($errors->all() as $key => $error)--}}
{{--                      '<p class="text-right mt-2 ml-5" dir="rtl"> {{$key+1}} : ' +--}}
{{--              '{{ $error }}' +--}}
{{--              '</p>' +--}}
{{--                  @endforeach--}}
{{--                      '<p class="text-right mt-2 ml-5" dir="rtl">' +--}}
{{--              '</p>',--}}
{{--          timer: parseInt('{{count($errors)}}') * 1500,--}}
{{--          timerProgressBar: true,--}}
{{--      })--}}
{{--  });--}}
{{--  @endif--}}
</script>
@yield('js')
</body>
</html>
