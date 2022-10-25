@extends('layouts.user')
@section('meta')
    @if($item->titleseo && $item->keywordsseo && $item->descriptionseo)
    <meta name="description" content="{{set_lang($item,'descriptionseo',app()->getLocale())}}"/>
    <meta http-equiv="keyword" name="keyword" content="{{set_lang($item,'keywordsseo',app()->getLocale())}}"/>
    <meta property="og:title" content="{{set_lang($item,'titleseo',app()->getLocale())}}"/>
    <meta property="og:description" content="{{set_lang($item,'descriptionseo',app()->getLocale())}}"/>
    @endif
@endsection
@section('css') @endsection
@section('body')
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/blog.css') }}"/>
    <section class="main_blog_area single_blog_details">
        <div class="container">
            <div class="row main_blog_inner">
                <div class="col-lg py-lg-4">
                    <div class="main_blog_items">
                        <div class="main_blogpost_item m-0">
                            <a href="#"><h3 class="text-dark text-center mb-3">{{set_lang($item,'title',app()->getLocale())}}</h3></a>
                            
                            <div class="rounded" style="background: #5d5c60">

                                <div class="blog_image">
                                    <img class="photos" src="{{$item->photo?url($item->photo->path):url('includes/asset/user/pic/nopic.jpg')}}" alt="{{set_lang($item,'title',app()->getLocale())}}">
                                    <div class="date">
                                        @if(app()->getLocale()=='fa')
                                            <h5>{{my_jdate($item->created_at,'d')}} <span>{{my_jdate($item->created_at,'F')}}</span></h5>
                                        @else
                                            <h5>{{date('d', strtotime($item->created_at))}} <span>{{date('F', strtotime($item->created_at))}}</span></h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="blog_quote">
                                    <p><i class="fa fa-quote-left" aria-hidden="true"></i>
                                        {{set_lang($item,'short_text',app()->getLocale())}}
                                    </p>
                                </div>

                            </div>

                            <div class="main_blog_text pt-lg-3">
                                {{-- <div class="blog_author_area">
                                    <a><i class="fas fa-calendar-alt"></i><span> @if(app()->getLocale()=='fa') {{my_jdate($item->created_at,'d F Y')}} @else {{date('d F Y', strtotime($item->created_at))}} @endif</span></a>
                                    <a><i class="far fa-comments"></i>{{__('text.comment')}} {{$comments->count()}}</a>
                                    <a><i class="far fa-comments"></i>{{__('لایک ها')}} {{$like}}</a>
                                </div> --}}
                                {!! set_lang($item,'text',app()->getLocale()) !!}
                            </div>
                        </div>
                        @if(count($comments)>0)
                            <div class="comment_list_area">
                                <h3>{{__('text.comment1')}} ({{count($comments)}})</h3>
                                <div class="comment_list_inner">
                                    @foreach($comments as $comment)
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{url('includes/asset/user/pic/user.png')}}" alt="">
                                            </div>
                                            <div class="media-body">
                                                <a><h4>{{$comment->name}}</h4></a>
                                                <p>{!! nl2br(e($comment->text)) !!}</p>
                                                <div class="date_rep">
                                                    <a>@if(app()->getLocale()=='fa') {{my_jdate($comment->created_at,'d F Y')}} @else {{date('d F Y', strtotime($comment->created_at))}} @endif</a>
                                                </div>
                                                @if($comment->reply)
                                                    <div class="media">
                                                        <div class="media-img">
                                                            <img src="{{url('includes/asset/user/pic/user_admin.png')}}" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <a><h4>{{$comment->reply->name}}</h4></a>
                                                            <p>{!! nl2br(e($comment->reply->text)) !!}</p>
                                                            <div class="date_rep">
                                                                <a>@if(app()->getLocale()=='fa') {{my_jdate($comment->reply->created_at,'d F Y')}} @else {{date('d F Y', strtotime($comment->reply->created_at))}} @endif</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="blog_comment_box">
                            <div class="row">
                                <div class="col"><h3>{{__('text.blog.comment')}}</h3></div>
                                <div class="col-3 col-lg-1 pt-0">
                                    <span onclick="like()" class="bg-success p-2 px-3 rounded" style="cursor: pointer;">
                                        <svg id="active" style="fill: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill bounce-top" viewBox="0 0 16 16">
                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                        </svg>
                                    </span>
                                    <span class="like-show">{{$like}}</span>
                                </div>
                                <div class="col-3 col-lg-1 pt-0">
                                    <span onclick="dislike()"  class="bg-danger p-2 px-3 rounded" style="cursor: pointer;">
                                        <svg id="deactive" style="fill: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill bounce-top" viewBox="0 0 16 16">
                                            <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
                                        </svg>
                                    </span>
                                    <span class="like-show">{{$dislike}}</span>
                                </div>
                            </div>
                            <div class="blog_comment_inner container-fluid pb-0">
                                <form class="row" action="{{route('user.blog.comment',$item->id)}}" method="post">
                                    @csrf
                                    <div class="form-group col-lg-6">
                                        <input type="text" class="form-control {{$errors->has('name')?'error_border':''}}" id="name" name="name" placeholder="{{__('text.blog.name')}}" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control d-ltr {{$errors->has('email')?'error_border':''}}" id="email" name="email" placeholder="{{__('text.blog.email')}}" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control d-ltr {{$errors->has('website')?'error_border':''}}" id="website" name="website" placeholder="{{__('text.blog.website')}}">
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea class="form-control {{$errors->has('text')?'error_border':''}}" name="text" id="text" rows="1" placeholder="{{__('text.blog.msg')}}"></textarea required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" value="submit" class="send_btn_comment_blog">{{__('text.blog.btn')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-4">
                    <div class="blog_sidebar_area">
                        <aside class="mrgn_widget categories_widget">
                            <div class="blog_widget_title">
                                <h3>{{__('text.blog.type')}}</h3>
                            </div>
                            <ul>
                                <li><a href="{{route('user.blog.index','all')}}">{{__('text.blog.all')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                                <li><a href="{{route('user.blog.index','news')}}">{{__('text.blog.news')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                                <li><a href="{{route('user.blog.index','article')}}">{{__('text.blog.article')}} <i class="fas fa-angle-{{app()->getLocale()=='en'?'right':'left'}}" aria-hidden="true"></i></a></li>
                            </ul>
                        </aside>
                        @if(count($last_items))
                            <aside class="mrgn_widget recent_news_widget">
                                <div class="blog_widget_title">
                                    <h3>{{__('text.blog.last')}}</h3>
                                </div>
                                <div class="recent_inner">
                                    @foreach($last_items as $last_item)
                                        <div class="recent_item">
                                            <a href="{{route('user.blog.show',[$last_item->type,app()->getLocale()=='fa'?$last_item->slug:$last_item->slug_en])}}"><h4>{{set_lang($last_item,'title',app()->getLocale())}}</h4></a>
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
<script>
    function like() {
        document.getElementById('active').style.fill='#3c3c46';
        document.getElementById('deactive').style.fill='#ffffff';
        $.ajax({
            type: "GET",
            url:  "/hafez2/like-post/{{$item->id}}",
            success: function(data) {
                console.log(data)
            },
            error: function() {
                console.log(this.error);
            }
        });
    }; 
    function dislike() {
        document.getElementById('deactive').style.fill='#3c3c46';
        document.getElementById('active').style.fill='#ffffff';
        $.ajax({
            type: "GET",
            url:  "/hafez2/like-post/{{$item->id}}/edit",
            success: function(data) {
                console.log(data)
            },
            error: function() {
                console.log(this.error);
            }
        });
    }
</script>