<link rel="stylesheet" type="text/css" href="{{ asset('user/front/blogs.css') }}"/>
@extends('layouts.user')
@section('css') @endsection
@section('body')
    <section class="main_blog_area p-0 pt-lg-1">
        <div class="container">
            <div class="row main_blog_inner">
                <div class="col-lg-9">
                    @if(count($items))
                        <div class="row">
                            @foreach($items->chunk(2) as $key => $blogs)
                                <div class="d-none">{{ $key%2==0 ? $circle = 'big' : $circle = 'small'}}</div>
                                @foreach($blogs as $item)
                                    <div class="main_blog_items-new p-1 @if( $circle == 'big' ) col-lg-7 @else col-lg-5 @endif
                                        @if($item->id==($first ?? '')) main_blog_items-new-first @elseif($item->id==($second ?? '')) main_blog_items-new-second @endif">
                                    {{-- <div class="main_blog_items-new p-1 @if( $circle == 'big' ) col-lg-7 @else col-lg-5 @endif> --}}
                                        <div class="card_blog">
                                            <a href="{{route('user.blog.show',[$item->type,app()->getLocale()=='fa'?$item->slug:$item->slug_en])}}">
                                                <img style="width: 100%;max-height: 220px;" src="{{$item->photo?url($item->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($item,'title',app()->getLocale())}}">
                                            </a>
                                            <div class="content" style="color: white;padding: 30px 20px 0px;">
                                                <a class="blog-text" href="{{route('user.blog.show',[$item->type,app()->getLocale()=='fa'?$item->slug:$item->slug_en])}}">
                                                    <h5>{{set_lang($item,'title',app()->getLocale())}}</h5>
                                                    @if( $circle == 'big' )
                                                        {{str_limit(set_lang($item,'short_text',app()->getLocale()),'200','...')}}
                                                    @else
                                                        {{str_limit(set_lang($item,'short_text',app()->getLocale()),'130','...')}}
                                                    @endif
                                                </a>
                                                <p class="time_p mt-2">
                                                    <span class="cal"><i class="fas fa-calendar-alt"></i> @if(app()->getLocale()=='fa') {{my_jdate($item->created_at,'d F Y')}} @else {{date('d F Y', strtotime($item->created_at))}} @endif</span>
                                                    <span class="cal"><i class="fas fa-eye ml-2"></i>{{$item->seen}}</span>
                                                </p>
                                            </div>
                
                                        </div>
                                    </div>
                                    @if($circle == 'big') <div class="d-none">{{ $circle = 'small' }}</div> @else <div class="d-none">{{ $circle = 'big' }}</div> @endif
                                @endforeach
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation" class="blog_pagination my-5 mr-5">
                            {{$items->appends(Request::except('page'))->links()}}
                        </nav>
                    @else
                        <div class="col-12 alert alert-danger text-center">
                            {{__('text.not_found_msg')}}
                        </div>
                    @endif


                    {{-- @if(count($items))
                        <div class="main_blog_items pr-0">
                            @foreach($items as $item)
                                <div class="card_blog row">
                                    <div class="col">
                                        <img style="transition: 1s;border: 1px solid rgb(165, 125, 36);border-radius: 40px 4px 40px 4px;" src="{{$item->photo?url($item->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($item,'title',app()->getLocale())}}">
                                    </div>
                                    <div class="col">
                                        <div class="content">
                                            <h5>{{set_lang($item,'title',app()->getLocale())}}</h5>
                                            <a href="{{route('user.blog.show',[$item->type,app()->getLocale()=='fa'?$item->slug:$item->slug_en])}}">
                                                <p class="text_news">
                                                    {{str_limit(set_lang($item,'short_text',app()->getLocale()),'280','...')}}
                                                    <span>
                                                        {{__('text.read_more')}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left pr-1" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                        </svg>
                                                    </span>
                                                </p>
                                            </a>
                                            <p class="time_p">
                                                <span class="cal"><i class="fas fa-calendar-alt"></i> @if(app()->getLocale()=='fa') {{my_jdate($item->created_at,'d F Y')}} @else {{date('d F Y', strtotime($item->created_at))}} @endif</span>
                                                <span class="cal"><i class="fas fa-eye ml-2"></i>{{$item->seen}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation" class="blog_pagination my-5 mr-5">
                            {{$items->appends(Request::except('page'))->links()}}
                        </nav>
                    @else
                        <div class="col-12 alert alert-danger text-center">
                            {{__('text.not_found_msg')}}
                        </div>
                    @endif --}}
                </div>
                <div class="col-lg-3 p-0 pt-lg-1">
                    <div class="blog_sidebar_area p-3">
                        <aside class="mrgn_widget categories_widget">
                            <div class="blog_widget_title" >
                                <h3>{{__('text.blog.category')}}</h3>
                            </div>
                            <ul>
                                <li class="{{$type=='all'?'active':''}}"><a href="{{route('user.blog.index','all')}}">{{__('text.blog.all')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                                <li class="{{$type=='news'?'active':''}}"><a href="{{route('user.blog.index','news')}}">{{__('text.blog.news')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                                <li class="{{$type=='article'?'active':''}}"><a href="{{route('user.blog.index','article')}}">{{__('text.blog.article')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                            </ul>
                        </aside>
                        @if(count($last_items))
                        <aside class="mrgn_widget recent_news_widget">
                            <div class="blog_widget_title" >
                                <h3>{{__('text.blog.last')}}</h3>
                            </div>
                            <div class="recent_inner">
                                @foreach($last_items as $last_item)
                                <div class="recent_item">
                                    <a class="linke" href="{{route('user.blog.show',[$last_item->type,app()->getLocale()=='fa'?$last_item->slug:$last_item->slug_en])}}">
                                        <h4>{{set_lang($last_item,'title',app()->getLocale())}}</h4>
                                    </a>
                                    <h5> <i class="fas fa-calendar-alt"></i>
                                        @if(app()->getLocale()=='fa') {{my_jdate($last_item->created_at,'d F Y')}} @else {{date('d F Y', strtotime($last_item->created_at))}} @endif
                                    </h5>
                                </div>
                                @endforeach
                            </div>
                        </aside>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="{{asset('user/front/numberToFarsi.js')}}"></script>

@endsection
@section('js') @endsection