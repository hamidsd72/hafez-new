
@extends('layouts.user')
@section('css_style')
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/about.css') }}"/>
<style>
    #team .mosav {
        background: #f7f7f7;
        padding: 15px 0px 30px;
        border-radius: 30px;
    }
    #team .mosav img.card1_img {
        margin-bottom: 24px;
        border: 2px solid #a57d24 !important;
    }
    #team .mosav .card1_in {
        position: initial;
        box-shadow: none;
        border-radius: 14px;
    }
    #team .teams2 .mosav img.card1_img {
        max-width: 200px;
        height: 200px;;
    }
    #team .teams2 .mosav img.card1_img {
        border: 1px solid #a57d24 !important;
    }
    #team .teams3 .mosav img.card1_img {
        max-width: 160px;
        height: 160px;;
        border-radius: 24px;
    }
    #team .teams3 .mosav img.card1_img {
        border: 0px solid #a57d24 !important;
    }
</style>
@endsection
@section('body')
    {{--about Head--}}
    <section id="top" class="fluid-section-one bg-f9">
        <div class="container py-5">
            <div class="col-lg-8 col-md-10 mx-auto t-center p-mb-0">
                {!! set_lang($item,'head_text',app()->getLocale()) !!}
            </div>
        </div>
    </section>
    {{--about--}}

    {{--vision--}}
    <section id="vision" id="s2-our_about_area" class="our_about_area">
        <div class="container">
            @if(app()->getLocale()=='fa')
                @if($item->vision_text || count($faqs2))
                    <div class="row py-lg-5">
                        <div class="col-md mt-4">
                            <div class="our_about_left_content w-100 px-5">
                                <h2 class="p-0 small-medium">{{set_lang($item,'title',app()->getLocale())}}</h2>
                                <div class="line-o"></div>
                                {!! set_lang($item,'text',app()->getLocale()) !!}
                                @if(count($faqs1))
                                    <div class="panel-group about_faq faq_ques" id="accordion1" role="tablist">
                                        @foreach($faqs1 as $key=>$faq1)
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="faq{{$key+1}}">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion1"
                                                           href="#faq_c{{$key+1}}" aria-expanded="false"
                                                           aria-controls="company_c{{$key+1}}" class="collapsed">
                                                            {{set_lang($faq1,'title',app()->getLocale())}}
                                                            <i class="fas fa-plus" aria-hidden="true"></i><i
                                                                    class="fas fa-minus" aria-hidden="true"></i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="faq_c{{$key+1}}" class="panel-collapse collapse" role="tabpanel"
                                                     aria-labelledby="faq{{$key+1}}" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <p>
                                                            {!! nl2br(e(set_lang($faq1,'text',app()->getLocale()))) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image_thumb">
                                <img src="{{url($item->vision_pic)}}"
                                     alt="{{set_lang($item,'vision_title',app()->getLocale())}}">
                            </div>
                        </div>
                    </div>
                @endif
            @else
                @if(check_lang($item,'about',app()->getLocale()) && check_lang($item,'about',app()->getLocale()))
                    <section class="fluid-section-one">
                        <div class="outer-container clearfix">

                            <!--Image Column-->
                            <div class="image-column hidden-xs"
                                 style="background-image:url('{{$item->vision_pic?url($item->vision_pic):url('includes/asset/user/pic/nopic.jpg')}}')">

                            </div>

                            <!--Content Column-->
                            <div class="content-column">
                                <div class="inner-column">
                                    <div class="clearfix">

                                        <!--Title Column-->
                                        <div class="title-box">
                                            <div class="box-inner">
                                                <h2>{{set_lang($item,'vision_title',app()->getLocale())}}</h2>
                                                <hr/>
                                                <div class="text">
                                                    {!! set_lang($item,'vision_text',app()->getLocale()) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
        </div>
    </section>

    {{--target--}}
    @if(count($items))
        <section id="target" class="why_choose">
            <div class="container">
                <div class="d-none d-lg-block">
                    <div class="line line-white d-flex mr-lg-38">
                        <span class="dot"></span>
                        <div class="line-left"></div>
                        <h4>{{__('text.about.feature')}}</h4>
                        <div class="line-right"></div>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="d-lg-none text-center"><h4>{{__('text.about.feature')}}</h4></div>
                <div class="row">
                    @foreach($items as $itemss)
                        <div class="col-md-4 mx-auto">
                            <div class="choose_outer text-center">
                                <figure style="background: transparent;box-shadow: none !important;">
                                    <img src="{{$itemss->pic?url($itemss->pic):url('includes/asset/user/pic/noicon.png')}}"
                                         alt="{{set_lang($itemss,'title',app()->getLocale())}}">
                                </figure>
                                <h3>{{set_lang($itemss,'title',app()->getLocale())}}</h3>
                                {{set_lang($itemss,'text',app()->getLocale())}}
                                <div class="border-top_bottom"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
    <section id="team" class="why_choose bg-white teams my-4 my-lg-5">
        <div class="container">
            <div class="sec_middle_title partner">
                <div class="d-none d-lg-block">
                    <div class="line d-flex" style="margin-right: 26%;">
                        <span class="dot"></span>
                        <div class="line-left"></div>
                        <h4>{{$item->title_team}}</h4>
                        <div class="line-right"></div>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="d-lg-none mb-5"><h4>{{$item->title_team}}</h4></div>
                <div class="col-lg-8 col-md-10 mx-auto t-center">
                    {{$item->text_team}}
                </div>
            </div>

            <div class="row pt-5 mt-lg-5 teams1">
                @foreach($teams1 as $team)
                    <div class="col-lg-4 mx-auto mb-4">
                        @include('user.about.component')
                    </div>
                @endforeach
            </div>

            <div class="row pt-5 mt-lg-5 teams2">
                @foreach($teams2 as $team)
                    <div class="col-lg-4 mx-auto mb-4">
                        @include('user.about.component')
                    </div>
                @endforeach
            </div>

            <div class="row pt-5 mt-lg-5 teams3">
                @foreach($teams3 as $team)
                    <div class="col-md-6 col-lg-3 mx-auto mb-4">
                        @include('user.about.component')
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
    
    {{-- banks --}}
    <section id="banks1" class="why_choose bg-f9 banks pb-5">
        <div class="container">
            <div class="sec_middle_title partner">
                <div class="d-none d-lg-block">
                    <div class="line line-white d-flex" style="margin-right: 29%;">
                        <span class="dot"></span>
                        <div class="line-left"></div>
                        <h4>{{$item->title_bank}}</h4>
                        <div class="line-right"></div>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="d-lg-none text-center">
                    <h4>{{$item->title_bank}}</h4>
                </div>
            </div>
            @if(count($banks1))
                <div class="row">
                    @foreach($banks1 as $bank)
                        <div class="col-md-6">
                            <div class="card_bank text-center">
                                <img src="{{$bank->pic}}" alt="بانک پارسیان شعبه بهشتی">
                                <div class="text w-100">
                                    <h3 class="pt-3">{{$bank->title}}</h3>
                                    <p class="py-2">
                                        <strong>شماره شبا: </strong>
                                        <input type="text" id="shaba{{$bank->id}}" class="copytextbox" value="{{$bank->shaba}}" readonly>

                                        <button onclick="shaba{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                    <p class="">
                                        <strong>شماره حساب: </strong>
                                        <input type="text" id="hesab{{$bank->id}}" class="copytextbox2" value="{{$bank->hesab}}" readonly>
                                        <button onclick="hesab{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                </div>
                            </div>
                            <script>
                                function shaba{{$bank->id}}() {
                                    var copyText = document.getElementById("shaba{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره شبا کپی شد");
                                }
                                function hesab{{$bank->id}}() {
                                    var copyText = document.getElementById("hesab{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره حساب کپی شد");
                                }
                            </script>
                        </div>
                    @endforeach   
                </div>
            @endif
        </div>
    </section>

    {{-- banks --}}
    <section id="banks2" class="why_choose bg-f9 banks bg-white mb-5">
        <div class="container">
            <div class="d-none d-lg-block">
                <div class="line line-white d-flex" style="margin-right: 29%;">
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>{{$item->title_bank1}}</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="d-lg-none text-center">
                <h4>{{$item->title_bank1}}</h4>
            </div>
            @if(count($banks2))
                <div class="row">
                    @foreach($banks2 as $bank)
                        <div class="col-md-6">
                            <div class="card_bank text-center">
                                <img src="{{$bank->pic}}" alt="بانک پارسیان شعبه بهشتی">
                                <div class="text w-100">
                                    <h3>{{$bank->title}}</h3>
                                    <p class="py-2">
                                        <strong>شماره شبا: </strong>
                                        <input type="text" id="shaba{{$bank->id}}" class="copytextbox" value="{{$bank->shaba}}" readonly>

                                        <button onclick="shaba{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                    <p>
                                        <strong>شماره حساب: </strong>
                                        <input type="text" id="hesab{{$bank->id}}" class="copytextbox2" value="{{$bank->hesab}}" readonly>
                                        <button onclick="hesab{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                </div>
                            </div>
                            <script>
                                function shaba{{$bank->id}}() {
                                    var copyText = document.getElementById("shaba{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره شبا کپی شد");
                                }
                                function hesab{{$bank->id}}() {
                                    var copyText = document.getElementById("hesab{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره حساب کپی شد");
                                }
                            </script>
                        </div>
                    @endforeach   
                </div>
            @endif
        </div>
    </section>

    {{-- banks --}}
    <section id="banks3" class="why_choose bg-f9 banks pb-5">
        <div class="container">
            <div class="d-none d-lg-block">
                <div class="line line-white d-flex" style="margin-right: 29%;">
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>{{$item->title_bank2}}</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="d-lg-none text-center">
                <h4>{{$item->title_bank2}}</h4>
            </div>
            @if(count($banks3))
                <div class="row">
                    @foreach($banks3 as $bank)
                        <div class="col-lg-4 col-md-6">
                            <div class="card_bank text-center">
                                <img src="{{$bank->pic}}" alt="بانک پارسیان شعبه بهشتی">
                                <div class="text w-100">
                                    <h3 class="pt-3">{{$bank->title}}</h3>
                                    <p class="py-2">
                                        <strong>شماره شبا: </strong>
                                        <input type="text" id="shaba{{$bank->id}}" class="copytextbox" value="{{$bank->shaba}}" readonly>
                                        <button onclick="shaba{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                    <p class="">
                                        <strong>شماره حساب: </strong>
                                        <input type="text" id="hesab{{$bank->id}}" class="copytextbox2" value="{{$bank->hesab}}" readonly>
                                        <button onclick="hesab{{$bank->id}}()" class="btn-copytextbox">
                                            کپی
                                        </button>
                                    </p>
                                </div>
                            </div>
                            <script>
                                function shaba{{$bank->id}}() {
                                    var copyText = document.getElementById("shaba{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره شبا کپی شد");
                                }
                                function hesab{{$bank->id}}() {
                                    var copyText = document.getElementById("hesab{{$bank->id}}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999)
                                    document.execCommand("copy");
                                    alert("شماره حساب کپی شد");
                                }
                            </script>
                        </div>
                    @endforeach   
                </div>
            @endif
        </div>
    </section>

    <script>
        function findPos(obj) {
            location.href = "#banks1";
        }
    </script>
    <script src="{{asset('user/front/numberToFarsi.js')}}"></script>

@endsection
@section('js') @endsection