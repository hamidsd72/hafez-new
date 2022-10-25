
@extends('layouts.user')
@section('css_style') @endsection
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/about.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{asset('user/front/index.css')}}"/>
@section('body')
    @if ($item->pic)
        @include('user.services.partials.6')
        <div class="d-none">{{$page = $item->name}}</div>
    @endif
    <div id="partials">
        @switch($item->name)
            @case("قوانین و آیین نامه ها")
                @include('user.services.partials.2')  
                @break
            @case("بورس اوراق بهادار")
                @include('user.services.partials.1')  
                @break
            @case("بورس کالا")
                @include('user.services.partials.1')  
                @break
            @case("بورس انرژی")
                @include('user.services.partials.1')  
                @break
            @case("صندوق‌های سرمایه‌گذاری")
                @include('user.services.partials.4')  
                @break
            @case("صندوق سرمایه گذاری حافظ")
                @include('user.services.partials.4')  
                @break
            @case("احراز هویت سجام")
                @include('user.services.partials.ehraz')  
                @break
            @default  
        @endswitch
    </div>
@endsection
