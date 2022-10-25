<style>
    .bg-my-zard {
        width: 60px;
        height: 60px;
        background: #a57d24;
        text-align: center;
        border-radius: 50px;
        padding-top: 18px;
        display: inline-table;
        margin-bottom: 20px;
    }
    svg:not(:root).svg-inline--fa {
        font-size: 24px;
    }
</style>

<div class="mx-auto title">
    {!! $item->page_content !!}
</div>

<div class="container">
    <div class="row">
        @foreach ($items1 as $item)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="px-3 py-4 bg-light text-center">
                    <div class="text-center">
                        <div class="bg-my-zard">
                            <i class='fas fa-arrow-down'></i>
                        </div>
                    </div>
                    <a class="text-dark" href="{{ $item->picture->first()?url('/'.$item->picture->first()->pic):'' }}">{!! $item->text !!}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>