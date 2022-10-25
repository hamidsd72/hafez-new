@extends('layouts.user')
@section('css_style')
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/index.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/about.css') }}"/>
<style>
    .copytextbox {

    }
    .btn-copytextbox {
        background: red;
        border: 1px solid red;
        border-radius: 4px;
        padding: 4px 12px;
    }
</style>
@endsection
@section('body')

        <section class="why_choose bg-f9 banks pb-5">
            <div class="container">
                <div class="sec_middle_title partner">
                    <div class="d-none d-lg-block">
                        <div class="line line-white d-flex" style="margin-right: 29%;">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>{{$item->title_branch}}</h4>
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="d-lg-none text-center">
                        <h4>{{$item->title_branch}}</h4>
                    </div>
                </div>
                @if(count($banks1))
                    <div class="row">
                        @foreach($banks1 as $bank)
                            <div class="col-lg-3 col-md-6">
                                <div class="card_bank text-center">
                                    <img src="{{$bank->pic}}" alt="بانک پارسیان شعبه بهشتی">
                                    <div class="text w-100">
                                        <h3 class="pt-3">{{$bank->title}}</h3>
                                        <p class="pt-1 pb-2">
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

        <section class="why_choose bg-f9 banks bg-white mb-5">
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
                                        <p class="pt-1 pb-2">
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

        <section class="why_choose bg-f9 banks pb-5">
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
                                        <h3 class="pt-3 text-white">{{$bank->title}}</h3>
                                        <p class="pt-1 pb-2 text-white">
                                            <strong>شماره شبا: </strong>
                                            <input type="text" id="shaba{{$bank->id}}" class="copytextbox text-white" value="{{$bank->shaba}}" readonly>

                                            <button onclick="shaba{{$bank->id}}()" class="btn-copytextbox">
                                                کپی
                                            </button>
                                        </p>
                                        <p class="text-white">
                                            <strong>شماره حساب: </strong>
                                            <input type="text" id="hesab{{$bank->id}}" class="copytextbox2 text-white" value="{{$bank->hesab}}" readonly>
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

@endsection
@section('js') @endsection