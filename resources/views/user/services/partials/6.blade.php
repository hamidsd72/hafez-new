<div id="partial" class="col-12">
    <div class="row bg-light" style="direction: ltr;">
        <div class="col-lg"><img src="{{$item->pic?url('/'.$item->pic):asset('user/pic/SL-02.jpg')}}" class="d-block w-100 rounded" alt="{{$item->slug}}"></div>
        <div class="col-lg my-3 my-lg-auto">
            <div class="mx-auto" style="max-width: 280px">
                <h4 class="py-4">{{$item->name}}</h4>
                {{-- <h5 class="py-4 text-secondary">{{$item->name}}</h5> --}}
                <div class="my-3 mt-lg-4">
                    @foreach ($links as $link)
                        <a class="btn-b-g mx-1" style="background: #A57D24;" href="{{$link->link}}">{{$link->label}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>