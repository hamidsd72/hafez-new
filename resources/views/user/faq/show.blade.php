<link rel="stylesheet" type="text/css" href="{{ asset('user/front/about.css') }}"/>
<style>
    @media (max-width: 640px){
        .faq_ques .panel.panel-default .panel-heading .panel-title a {
            font-size: 12px !important;
            line-height: 6px !important;
            padding: 12px 8px 4px !important;
        }
    }
</style>
@extends('layouts.user')
@section('css') @endsection
@section('body')

    @include('user.services.partials.6')

    <section class="faq_page_container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        @foreach($items as $key=>$item)
                        <li class="nav-item">
                            <a class="nav-link {{$key==0?'active':''}}" data-toggle="tab" href="#tab_{{$item->id}}">{{$item->title}}</a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($items as $key=>$item)
                        <div class="tab-pane container-fluid {{$key==0?'active':''}}" id="tab_{{$item->id}}">
                            @if(count($item->faqs->where('status','active')))
                            <div class="panel-group faq_ques" id="accordion_{{$item->id}}" role="tablist" aria-multiselectable="true">
                                @foreach($item->faqs as $key=>$faq)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="faq{{$key+1}}">
                                            <h4 class="panel-title mt-0" style="background-color: #eaeaea;padding-bottom: 14px;">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion_{{$item->id}}" href="#faq_c{{$key+1}}" aria-expanded="false" aria-controls="company_c{{$key+1}}" class="collapsed">
                                                    {{$key+1}} : {{set_lang($faq,'question',app()->getLocale())}}
                                                    <i class="fas fa-plus" aria-hidden="true"></i><i class="fas fa-minus" aria-hidden="true"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="faq_c{{$key+1}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq{{$key+1}}" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <p>
                                                    {!! set_lang($faq,'answer',app()->getLocale()) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @else
                            <div class="col-lg-8 col-md-10 text-center mx-auto alert alert-danger">
                                یافت نشد
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('user/front/numberToFarsi.js')}}"></script>

@endsection
@section('js') @endsection