<style>
    div.icons svg {
        font-size: 50px;
    }
    body path {
        color:#A57D24 !important;
    }
    .h5-f-24:hover h5 {
        color:#A57D24 !important;
    }
</style>

<section id="c1">
    <div class="container">
        <div class="row my-lg-5 py-lg-5">
            <div class="col-lg-5 mt-lg-5 p-lg-5">
                @foreach ($items1->where('position',1) as $item)
                    <div class="py-4">
                        {!! $item->text !!}
                    </div>
                @endforeach 
                @foreach ($items1->where('position',2) as $item)
                    <div class="pb-3 pl-lg-4" style="text-align: justify;">
                        {!! $item->text !!}
                    </div>
                @endforeach 
                @foreach ($items1->where('position',3) as $item)
                    <div class="link-gold pt-lg-4">
                        {!! $item->text !!}
                    </div>
                @endforeach
            </div>
            <div class="col-lg text-center">
                <div class="img col-11 mx-auto" style="background: #e3e3e5;box-shadow: #f4f4f6 72px 72px 0px 0px;">
                    @foreach ($items1->where('position',4) as $item)
                        <img style="width: 100%;max-width: 520px;" src="{{ url('/'.$item->picture->first()->pic) }}" alt="">

                        <div class="abs2">
                            @foreach ($items1->where('position',5) as $item)
                                @if ($item->sort==1)
                                    <a target="_blank" href="{!! $item->text !!}">
                                        <img style="max-width: 128px;padding: 12px 0px;" src="{{ url('/'.$item->picture->first()->pic) }}" alt="">
                                    </a>
                                @else
                                    <div class="p-cusstome">
                                        {!! $item->text !!}
                                    </div>
                                @endif
                            @endforeach 
                            <img src="" alt="">
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</section>

<section id="c2">
    <div class="container">
        <div class="row text-center my-lg-5 pb-lg-5">
            @foreach ($items2->where('position',1) as $item)
                <div class="col-lg lorem1">
                    <div class="py-4 d-flex">
                        <img src="{{ asset('img/rss.png') }}" alt="welcome" style="width: 16px;border-radius: 2px;height: 16px;margin-left: 8px;">
                        {!! $item->text !!}
                    </div>
                    @foreach ($items2->where('position',2) as $next)
                        @if ($item->sort == $next->sort)
                            <div class="next">
                                {!! $next->text !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="c3" class="py-lg-5">
    <div class="container" style="background: #f4f4f6;">
        <div class="row">

            <div class="col-lg mammdad1">
                @foreach ($items3->where('position',1) as $item)
                    <img style="width: 100%;position: inherit;top: -38px;" src="{{ url('/'.$item->picture->first()->pic) }}" alt="">
                @endforeach
            </div>

            <div class="col-lg p-0 mammdad2">
                <div class="lorem2">
                    @foreach ($items3->where('position',2) as $item)
                        {!! $item->text !!}
                    @endforeach

                    <div class="py-4">
                        @foreach ($items3->where('position',3) as $item)
                            <div class="d-flex">
                                <i class="fusion-li-icon fa-check-circle fas" style="margin-top: 6px;margin-left: 12px;"></i>
                                {!! $item->text !!}
                            </div>
                        @endforeach
                    </div>
                    @foreach ($items3->where('position',4) as $item)
                        <div class="link-gold link-gold-full">
                            {!! $item->text !!}
                        </div>
                    @endforeach
                </div>
                
            </div>

        </div>
    </div>
</section>

<section id="c4" class="py-lg-5 mt-lg-5" style="background-image: url( {{ url('/'.$items4->where('position',7)->first()->picture->first()->pic) }} );">
    @foreach ($items4->where('position',8) as $item)
        <img src="{{ url('/'.$item->picture->first()->pic) }}" alt="">
    @endforeach

    <div class="abs3">
        @foreach ($items4->where('position',1) as $item)
            <div class="lorem5">
                {!! $item->text !!}
            </div>
        @endforeach
        @foreach ($items4->where('position',2) as $item)
            <div class="lorem6">
                {!! $item->text !!}
            </div>
        @endforeach
        <div class="lorem7">
            @foreach ($items4->where('position',3) as $item)
                {!! $item->text !!}
            @endforeach
            @foreach ($items4->where('position',4) as $item)
                {!! $item->text !!}
            @endforeach
        </div>

        <div class="row text-center mt-lg-4">
            @foreach ($items4->where('position',5) as $item)
                <div class="col-lg h5-f-24">
                    <div class="icons" style="font-size: 44px;padding: 20px 0px;">
                        @switch($item->sort)
                            @case(1)
                                <i class="fontawesome-icon fa-dice-six fas circle-no"></i>
                                @break
                            @case(2)
                                <i class="fontawesome-icon fa-bahai fas circle-no"></i>
                                @break
                            @case(3)
                                <i class="fontawesome-icon fa-crosshairs fas circle-no"></i>
                                @break
                            @case(4)
                                <i class="fontawesome-icon fa-redo fas circle-no"></i>
                                @break
                            @default
                        @endswitch
                    </div>
                    {!! $item->text !!}
                </div>
            @endforeach
        </div>

        @foreach ($items4->where('position',6) as $item)
            <div class="text-left link-gold mt-lg-5">
                {!! $item->text !!}
            </div>
        @endforeach
    </div>
</section>

<section id="c5" class="p-4">
    <div class="abbas1" style="background-image: url( {{ url('/'.$items4->where('position',7)->first()->picture->first()->pic) }} );">
        @foreach ($items4->where('position',8) as $item)
            <img class="img-abbas" src="{{ url('/'.$item->picture->first()->pic) }}" alt="">
        @endforeach
    </div>
    <div class="">
        @foreach ($items4->where('position',1) as $item)
            <div class="lorem5">
                {!! $item->text !!}
            </div>
        @endforeach
        @foreach ($items4->where('position',2) as $item)
            <div class="lorem6">
                {!! $item->text !!}
            </div>
        @endforeach
        <div class="lorem7">
            @foreach ($items4->where('position',3) as $item)
                {!! $item->text !!}
            @endforeach
            @foreach ($items4->where('position',4) as $item)
                {!! $item->text !!}
            @endforeach
        </div>

        <div class="row text-center mt-lg-4">
            @foreach ($items4->where('position',5) as $item)
                <div class="col-lg h5-f-24">
                    <div class="icons" style="font-size: 44px;padding: 20px 0px;">
                        @switch($item->sort)
                            @case(1)
                                <i class="fontawesome-icon fa-dice-six fas circle-no"></i>
                                @break
                            @case(2)
                                <i class="fontawesome-icon fa-bahai fas circle-no"></i>
                                @break
                            @case(3)
                                <i class="fontawesome-icon fa-crosshairs fas circle-no"></i>
                                @break
                            @case(4)
                                <i class="fontawesome-icon fa-redo fas circle-no"></i>
                                @break
                            @default
                        @endswitch
                    </div>
                    {!! $item->text !!}
                </div>
            @endforeach
        </div>

        @foreach ($items4->where('position',6) as $item)
            <div class="text-left link-gold mt-lg-5">
                {!! $item->text !!}
            </div>
        @endforeach
    </div>

</section>

<section id="c2">
    <div class="container">
        <div class="row text-center my-lg-5 pb-lg-5">
            @foreach ($items2->where('position',1) as $item)
                <div class="col-lg lorem1">
                    <div class="py-4 d-flex">
                        <img src="{{ asset('img/rss.png') }}" alt="welcome" style="width: 16px;border-radius: 2px;height: 16px;margin-left: 8px;">
                        {!! $item->text !!}
                    </div>
                    @foreach ($items2->where('position',2) as $next)
                        @if ($item->sort == $next->sort)
                            <div class="next">
                                {!! $next->text !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>