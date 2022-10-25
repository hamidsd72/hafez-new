<link rel="stylesheet" type="text/css" href="{{ asset('user/front/header.css') }}"/>
<header id="header" style="background: transparent ;">
    <nav id="nav_id" class="navbar navbar-expand-lg navbar-dark pt-0">
        <div class="container d-block mb-1">
            <a class="navbar-brand" href="{{route('user.index')}}">
                <img src="{{url($setting->logo)}}" id="logohone" class="logo1" alt="{{set_lang($setting,'title',app()->getLocale())}}">
                <img src="{{url($setting->logo2)}}" id="logotwo" class="logo1" alt="{{set_lang($setting,'title',app()->getLocale())}}">
            </a>
            <button id="btn_mobile_menu" class="navbar-toggler collapsed position-relative z-index-9 btn-sm-icon-mobile" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="icon_menu_mobile fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse edit mt-0 pb-0" id="navbarSupportedContent">
                <div class="d-none d-lg-block">
                    <ul class="navbar-nav {{app()->getLocale()=='en'?'mr-auto':'ml-auto'}}">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.index')}}">{{__('text.header_down.home')}} <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">خدمات</a>

                            <div class="dropdown-menu dropdown-menu-right" 
                            style="top: 40px !important;padding-top: 16px;background: none;box-shadow: 0 2px 2px 1px transparent !important;" aria-labelledby="servicesDropdown">
                                <div class="bg-light rounded">
                                    <div class="dropdown-divider" style="border-top: 2px solid #A57D24;"></div>
                                        <div class="d-md-flex align-items-start justify-content-start text-right"><div>   
                                        <div class="dropdown-header">خدمات حافظ</div>
                                        <div class="row" style="width: 850px;">
                                            <div class="col-6">
                                                <a class="dropdown-item py-2" href="{{route('services.show',$menu_1[0]->slug)}}">{{$menu_1[0]->name}}</a>
                                                <div style="background: #A57D24;padding: 10px 14px;" id="lorem">
                                                    {!! $menu_1[3]->page_content !!}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-item py-2" href="{{route('services.show',$menu_1[1]->slug)}}">{{$menu_1[1]->name}}</a>
                                                <a class="dropdown-item py-2 mt-5" href="{{route('services.show',$menu_1[4]->slug)}}">{{$menu_1[4]->name}}</a>
                                                {{-- <a class="dropdown-item py-2 mt-4" href="{{route('video.index')}}">آموزش</a> --}}
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-item py-2" href="{{route('services.show',$menu_1[2]->slug)}}">{{$menu_1[2]->name}}</a>
                                                <a class="dropdown-item py-2 mt-5" target="_blank" href="{{$menu_1[5]->link}}">{{$menu_1[5]->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('user.faq.show')}}">سوالات متداول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('user.blog.index','article')}}">مجله حافظ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false"> درباره حافظ</a>

                            <div class="dropdown-menu dropdown-menu-right" 
                            style="top: 40px !important;padding-top: 16px;background: none;box-shadow: 0 2px 2px 1px transparent !important;" aria-labelledby="servicesDropdownAbout">
                                <div class="bg-light rounded">
                                    <div class="dropdown-divider" style="border-top: 2px solid #A57D24;"></div>
                                        <div class="d-md-flex align-items-start justify-content-start text-right"><div>   
                                        {{-- <a class="dropdown-item" href="{{route('user.about.show')}}">درباره حافظ</a> --}}
                                        <div class="row" style="width: 590px;">
                                            <div class="col">
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[0]->link}}">{{$menu_2[0]->name}}</a>
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[2]->link}}">{{$menu_2[2]->name}}</a>
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[4]->link}}">{{$menu_2[4]->name}}</a>
                                                <a class="dropdown-item py-2 mt-1 mb-4" href="{{route('user.employment.show')}}">فرصت های شغلی</a>

                                            </div>
                                            <div class="col">
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[1]->link}}">{{$menu_2[1]->name}}</a>
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[3]->link}}">{{$menu_2[3]->name}}</a>
                                                <a class="dropdown-item py-2 my-4" href="{{$menu_2[5]->link}}">{{$menu_2[5]->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.contact.show')}}">تماس با ما</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="{{$menu_4->where('place','left')->first()->link}}" target="_blank">{{$menu_4->where('place','left')->first()->name}}</a>
                        </li>
                        <li class="nav-item" style="padding-top: 20px;">
                            <div class="dropdown">
                                <a class="nav-link" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div style="background: #A57D24;color: white;border-radius: 20px;padding: 4px 10px;">
                                        معاملات آنلاین
                                    </div>
                                </a>
                                <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                                    @foreach ($menu_3 as $item)
                                        <a href="{{$item->link}}" target="_blank" class="dropdown-item {{app()->getLocale()=='fa'?'text-right':'text-left'}}">{{$item->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item" style="padding-top: 20px;">
                            <a class="nav-link" href="{{$menu_4->where('place','right')->first()->link}}" target="_blank">
                                <div style="background: #24441E ;color: white;border-radius: 20px;padding: 4px 10px;"><i class='fas fa-user-check mx-1'></i>{{$menu_4->where('place','right')->first()->name}}</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="fa-search" class="nav-link" data-toggle="modal" data-target="#searchModal" href="#"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                </div>
                <ul class="d-lg-none nav-sm navbar-nav {{app()->getLocale()=='en'?'mr-auto':'ml-auto'}}">
                    <form action="{{ route('user.blog.search') }}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="جستجوی اخبار و مقالات" class="form-control" 
                        style="border: 2px solid #a57d24;padding: 16px 12px;border-radius: 20px;margin: 4px 0px 12px;">
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.index')}}">{{__('text.header_down.home')}} <span class="sr-only">(current)</span></a>
                    </li>
                    <div id="accordion">

                        <div class="">
                            <div id="headingOne">
                                <button class="btn text-white p-0 mb-3" data-toggle="collapse" style="font-size: 14px;" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <img src="{{ asset('img/arrow.png') }}" width="18px" style="border-radius: 50px;padding: 2px;" alt="arrow">
                                    خدمات
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse pb-3" aria-labelledby="headingOne" data-parent="#accordion">
                                <a class="dropdown-item " href="{{route('services.show',$menu_1[0]->slug)}}">{{$menu_1[0]->name}}</a>
                                <a class="dropdown-item " href="{{route('services.show',$menu_1[1]->slug)}}">{{$menu_1[1]->name}}</a>
                                <a class="dropdown-item " href="{{route('services.show',$menu_1[4]->slug)}}">{{$menu_1[4]->name}}</a>
                                <a class="dropdown-item " href="{{route('services.show',$menu_1[2]->slug)}}">{{$menu_1[2]->name}}</a>
                                <a class="dropdown-item " target="_blank" href="{{$menu_1[5]->link}}">{{$menu_1[5]->name}}</a>
                            </div>
                        </div>

                        <div class="">
                            <div id="headingTwo">
                                <button class="btn text-white p-0 mb-3 collapsed" style="font-size: 14px;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img src="{{ asset('img/arrow.png') }}" width="18px" style="border-radius: 50px;padding: 2px;" alt="arrow">
                                    درباره حافظ
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse pb-3" aria-labelledby="headingTwo" data-parent="#accordion">
                                <a class="dropdown-item" href="{{$menu_2[0]->link}}">{{$menu_2[0]->name}}</a>
                                <a class="dropdown-item" href="{{$menu_2[2]->link}}">{{$menu_2[2]->name}}</a>
                                <a class="dropdown-item" href="{{$menu_2[4]->link}}">{{$menu_2[4]->name}}</a>
                                <a class="dropdown-item" href="{{$menu_2[1]->link}}">{{$menu_2[1]->name}}</a>
                                <a class="dropdown-item" href="{{$menu_2[3]->link}}">{{$menu_2[3]->name}}</a>
                                <a class="dropdown-item" href="{{$menu_2[5]->link}}">{{$menu_2[5]->name}}</a>
                            </div>
                        </div>

                        <div class="">
                            <div id="headingThree">
                                <button class="btn text-white p-0 mb-4 collapsed" style="font-size: 14px;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <img src="{{ asset('img/arrow.png') }}" width="18px" style="border-radius: 50px;padding: 2px;" alt="arrow">
                                    معاملات آنلاین
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse pb-3" aria-labelledby="headingThree" data-parent="#accordion">
                                @foreach ($menu_3 as $item)
                                    <a href="{{$item->link}}" target="_blank" class="dropdown-item {{app()->getLocale()=='fa'?'text-right':'text-left'}}">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </div>

                      </div>
                    <li class="nav-item" >
                        <a class="nav-link"
                           href="{{route('user.faq.show')}}"> سوالات متداول</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link"
                           href="{{route('user.blog.index','article')}}">مجله حافظ</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link"
                           href="{{route('user.about.show')}}">درباره حافظ</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link"
                           href="{{route('user.employment.show')}}">فرصت های شغلی</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link"
                           href="{{route('user.contact.show')}}">تماس با ما</a>
                    </li>
                    @foreach ($menu_4 as $item)
                        <li class="nav-item" >
                            <a class="nav-link" href="{{$item->link}}" target="_blank">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 10%;background-color: transparent;border: none;">
            <form action="{{ route('user.blog.search') }}" method="GET">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;"><span style="font-size: 28px;" aria-hidden="true">&times;</span></button>
                <input type="text" name="search" placeholder="جستجوی اخبار و مقالات" class="form-control" style="border: 2px solid #a57d24;padding: 20px 12px;border-radius: 30px;">
            </form>
        </div>
    </div>
</div>
{{-- 
<script>
    $(function() {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('header').addClass('activate') 
            } else {
                $('header').removeClass('activate')
            }
        });     
    });
</script> --}}
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            // document.getElementById("header").style.backgroundColor = "transparent";
            document.getElementById("logohone").style.display = "none";
            document.getElementById("logotwo").style.display = "block";
        } else {
            // document.getElementById("header").style.backgroundColor = "white";
            document.getElementById("logohone").style.display = "block";
            document.getElementById("logotwo").style.display = "none";
        }
    }
</script>