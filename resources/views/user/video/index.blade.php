
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/blogs.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/index.css') }}"/>
@extends('layouts.user')
@section('css') @endsection
@section('body')
    <section class="fluid-section-one bg-f9">
        <div class="container py-5">
            <div class="col-lg-8 col-md-10 mx-auto t-center p-mb-0 text-center">
                <div class="line d-flex pb-0 mr-lg-32" >
                    <span class="dot"></span>
                    <div class="line-left"></div>
                    <h4>ویکی بورس</h4>
                    <div class="line-right"></div>
                    <span class="dot"></span>
                </div>
                <h5 class="py-2">دقیق و اصولی، تنها در ۶۰ ثانیه</h5>
                <p>
                    مجموعه ویدئوهای ویکی بورس مختص شبکه‌های اجتماعی کارگزاری حافظ است و توسط تیم تولید محتوای هدف حافظ تولید شده است. در این ویدئوهای کوتاه، مفاهیم اولیه و شناختی بورس با زبانی ساده توضیح داده می‌شوند. برای دنبال کردن این ویدئوها و مشاهده ویدئوهای بیشتر «ویکی بورس» صفحات اجتماعی کارگزاری حافظ را دنبال کنید
                </p>
            </div>
        </div>
    </section>

    <section class="why_choose bg-white teams py-0 pb-lg-4">
        <div class="container">
            @if(count($items))
                <div class="main_blog_items pr-0">
                    <div class="row pr-1 mt-3 mb-4">
                        @foreach ($category as $cat)
                            <a class="text-secondary mx-2" href="{{route('video.show',$cat->id)}}">{{$cat->name}}</a>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-lg-4 col-md-4 mb-5 mb-lg-0">
                                <div class="card1 rounded">
                                    <div id="{{$item->id}}">
                                        {!! $item->video !!}
                                    </div>
                                    <div class="card1_in" style="top: -35px !important;">
                                        <div class="card1_text">
                                            <h4 class="card1_name mb-0">{{$item->description}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <nav aria-label="Page navigation" class="blog_pagination my-5 mr-5">
                    {{$items->appends(Request::except('page'))->links()}}
                </nav>
            @else
                <div class="col-4 alert alert-danger text-center">
                    {{__('text.not_found_msg')}} 
                </div>
            @endif
        </div>
    </section>

@endsection
@section('js') @endsection