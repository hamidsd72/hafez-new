
<style>
    body path {
        color:#A57D24 !important;
    }
    @-webkit-keyframes slide-in-right{
        0%{-webkit-transform:translateX(150px);transform:translateX(150px);opacity:0}
        100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}
    }
    @keyframes slide-in-right{
        0%{-webkit-transform:translateX(150px);transform:translateX(150px);opacity:0}
        100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}
    }

    div.icons:hover svg {
        -webkit-animation:slide-in-right .5s cubic-bezier(.25,.46,.45,.94) both;animation:slide-in-right .5s cubic-bezier(.25,.46,.45,.94) both
    }
    #header div.container {
        padding: 0px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    #accordion .accordion-button:not(.collapsed) {
        box-shadow: none !important;
    }
    #accordion .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='rgb(165 125 36)' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
        transform: scale(.7) !important;
        margin-bottom: 8px;
        position: absolute;
        right: 18px !important;
    }
    #accordion .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='rgb(165 125 36)' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z' clip-rule='evenodd'/%3e%3c/svg%3e");
        margin-bottom: 8px;
        position: absolute;
        right: 18px !important;
    }
</style>
<div class="mx-auto title py-lg-5 my-lg-5">
    {!! $item->page_content !!}
</div>
{{-- <div class="col-lg-4 col-lg-5 col-md-10 mx-auto pb-lg-5">
    <img src="{{$item->pic?url('/'.$item->pic):asset('user/pic/SL-02.jpg')}}" class="d-block w-100 rounded my-5" alt="{{$item->slug}}">
</div> --}}
@foreach ($items1->where('position',1) as $item)
    {!! $item->text !!}
@endforeach
<div class="container">
    <div class="row text-center ipsum1">
        @foreach ($items1->where('position',2) as $item)
            <div class="col-lg-6 pb-lg-4">
                {{-- icons --}}
                <div class="icons" style="font-size: 44px;padding: 20px 0px;">
                    @if ($page=="بورس اوراق بهادار")
                        @switch($item->sort)
                            @case(1)
                                <i class="fontawesome-icon fa-tablet-alt fas circle-no"></i>
                                @break
                            @case(2)
                                <i class="fontawesome-icon fa-fingerprint fas circle-no"></i>
                                @break
                            @case(3)
                                <i class="fontawesome-icon fa-signal fas circle-no"></i>
                                @break
                            @case(4)
                                <i class="fontawesome-icon fa-hands-helping fas circle-no"></i>
                                @break
                            @default
                        @endswitch
                    @elseif($page=="بورس کالا")
                        @switch($item->sort)
                            @case(1)
                                <i class="fontawesome-icon fa-fingerprint fas circle-no"></i>
                                @break
                            @case(2)
                                <i class="fontawesome-icon fa-key fas circle-no"></i>
                                @break
                            @case(3)
                                <i class="fontawesome-icon fa-pen-alt fas circle-no"></i>
                                @break
                            @case(4)
                                <i class="fontawesome-icon fa-hands-helping fas circle-no"></i>
                                @break
                            @default
                        @endswitch
                    @elseif($page=="بورس انرژی")
                        @switch($item->sort)
                            @case(1)
                                <i class="fontawesome-icon fa-hand-holding-usd fas circle-no"></i>
                                @break
                            @case(2)
                                <i class="fontawesome-icon fa-charging-station fas circle-no"></i>
                                @break
                            @case(3)
                                <i class="fontawesome-icon fa-handshake fas circle-no"></i>
                                @break
                            @case(4)
                                <i class="fontawesome-icon fa-window-restore fas circle-no"></i>
                                @break
                            @default
                        @endswitch
                    @endif
                </div>
                {{-- end icons --}}
                {!! $item->text !!}
            </div>
        @endforeach
    </div>
</div>

<section class="bg-ligh-gray py-3 mt-lg-5">

    <div class="row mx-auto" style="max-width: 1280px;">
        <div class="col-lg p-0">
            <div class="sec2">
                @foreach ($items2->where('position',1) as $item)
                    {!! $item->text !!}
                @endforeach
                @foreach ($items2->where('position',5) as $item)
                    <div class="small">
                        {!! $item->text !!}
                    </div>
                @endforeach

                <div id="accordion" style="border: none">
                    <div class="d-none">{{$show = true}}</div>
                    @foreach ($items2->where('position',2) as $item)
                        <div class="box mt-3">
                            <div class="head" id="heading{{$item->id}}">
                                @if ($page == "بورس اوراق بهادار")
                                    <button class="btn bg-white accordion-button @if( !$show )collapsed @endif" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                @else
                                    <button class="btn bg-white accordion-button collapsed" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                @endif
                                        {!! $item->text !!}
                                    </button>
                            </div>
                        
                            @if ($page == "بورس اوراق بهادار")
                                <div id="collapse{{$item->id}}" class="collapse @if( $show )show @endif" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
                            @else
                                <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
                            @endif
                                <div class="body bg-white px-4">
                                    @foreach ($items2->where('position',3) as $subitem)
                                        @if($subitem->sort == $item->sort) {!! $subitem->text !!} @endif
                                        <div class="d-none">{{$show = false}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg reza1">
            @foreach ($items2->where('position',4) as $item)
                <img style="width: 100%;max-width: 540px;" src="{{ url('/'.$item->picture->first()->pic) }}" alt="">
            @endforeach
        </div>
    </div>

</section>

<section style="margin-bottom: 140px;   ">
    @foreach ($items3->where('position',1) as $item)
        <div class="text-center mt-4 py-4">
            {!! $item->text !!}                
        </div>
    @endforeach
    @foreach ($items3->where('position',2) as $item)
        <div class="mx-auto text-center ipsum2" style="max-width: 900px;">
            {!! $item->text !!}                
        </div>
    @endforeach
</section>

<section class="bg-gray" style="@if($items4->count()) min-height: 680px; @endif">
    <div class="abs">
        <div class="row mx-auto" style="@if($items3->where('position',3)->count() == 3) max-width: 940px @else max-width: 1280px @endif">
            @foreach ($items3->where('position',3) as $item)
                <div class="col-lg">
                    <div class="trans mx-1">
                        {!! $item->text !!}
                        {{-- icons --}}
                        <div class="icons" style="font-size: 48px;padding: 20px 0px;">
                            @if ($page=="بورس اوراق بهادار")
                                @switch($item->sort)
                                    @case(1)
                                        <i class="fb-icon-element-1 fb-icon-element fontawesome-icon fa-laptop-medical fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(2)
                                        <i class="fb-icon-element-2 fb-icon-element fontawesome-icon fa-umbrella-beach fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(3)
                                        <i class="fb-icon-element-3 fb-icon-element fontawesome-icon fa-couch fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @default
                                @endswitch
                            @elseif($page=="بورس کالا")
                                @switch($item->sort)
                                    @case(1)
                                        <i class="fb-icon-element-1 fb-icon-element fontawesome-icon fa-donate fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(2)
                                        <i class="fb-icon-element-2 fb-icon-element fontawesome-icon fa-fire fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(3)
                                        <i class="fb-icon-element-3 fb-icon-element fontawesome-icon fa-cubes fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(4)
                                        <i class="fb-icon-element-4 fb-icon-element fontawesome-icon fa-gem fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(5)
                                        <i class="fb-icon-element-5 fb-icon-element fontawesome-icon fa-check-double fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @default
                                @endswitch
                            @elseif($page=="بورس انرژی")
                                @switch($item->sort)
                                    @case(1)
                                        <i class="fb-icon-element-1 fb-icon-element fontawesome-icon fa-chair fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(2)
                                        <i class="fb-icon-element-2 fb-icon-element fontawesome-icon fa-expand fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(3)
                                        <i class="fb-icon-element-3 fb-icon-element fontawesome-icon fa-signature fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(4)
                                        <i class="fb-icon-element-4 fb-icon-element fontawesome-icon fa-user-friends fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @case(5)
                                        <i class="fb-icon-element-5 fb-icon-element fontawesome-icon fa-comments fas circle-no icon-hover-animation-slide"></i>
                                        @break
                                    @default
                                @endswitch
                            @endif
                        </div>
                        {{-- end icons --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center text-white col-lg-8 mx-auto reza2">
        @foreach ($items4->where('position',1) as $item)
            <div class="py-3 h3-white">
                {!! $item->text !!}
            </div>
        @endforeach
        @foreach ($items4->where('position',2) as $item)
            {!! $item->text !!}
        @endforeach
    </div>

</section>