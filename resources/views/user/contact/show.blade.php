@extends('layouts.user')
@section('css_style') @endsection
@section('body')

<link rel="stylesheet" type="text/css" href="{{asset('user/front/index.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('user/front/contact.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('user/front/about.css')}}"/>

    @include('user.services.partials.6')

    <section class="contact_us_area mt-lg-4">
        <div class="container">
            <div class="contact_us_inner container-fluid">
                {{-- <div class="sec_middle_title">
                    <div class="d-none d-lg-block">
                        <div class="line d-flex" style="margin-right: 31%;">
                            <span class="dot"></span>
                            <div class="line-left"></div>
                            <h4>{{__('text.contact.titr')}}</h4>    
                            <div class="line-right"></div>
                            <span class="dot"></span>
                        </div> 
                    </div>
                    <div class="d-lg-none ">
                        <h4>{{__('text.contact.titr')}}</h4>    
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact_us_details">
                            {!! set_lang($data,'text',app()->getLocale()) !!}
                            <div class="row py-3">

                                <div class="c_details_item">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="media-body my-auto">
                                            <p>
                                            {{-- <a href="https://www.google.com/maps/place/Darou+Darman+Pars+Co./@35.7614003,51.3946474,17z/data=!3m1!4b1!4m5!3m4!1s0x3f8e06fe93bac66d:0xe133c8a7dc9ca5ea!8m2!3d35.7614084!4d51.3924578" target="_blank"> {{set_lang($data,'address',app()->getLocale())}}</a> --}}
                                            <a href="{!! $data->map !!}" target="_blank"> {{set_lang($data,'address',app()->getLocale())}}</a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                @if($data->email1 || $data->email2)
                                <div class="c_details_item">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fas fa-at"></i>
                                        </div>
                                        <div class="media-body my-auto">
                                            @if($data->email1)
                                            <a href="mailto:{{$data->email1}}">{{$data->email1}}</a>
                                            @endif
                                                @if($data->email2)
                                                    <a href="mailto:{{$data->email2}}">{{$data->email2}}</a>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!is_null(set_lang($data,'phone1',app()->getLocale())) || !is_null(set_lang($data,'phone2',app()->getLocale())))
                                <div class="c_details_item">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="media-body my-auto">
                                            @if(!is_null(set_lang($data,'phone1',app()->getLocale())))
                                                <a href="tel:{{str_replace('-','',set_lang($data,'phone1',app()->getLocale()))}}">{{set_lang($data,'phone1',app()->getLocale())}}</a>
                                            @endif
                                            @if(!is_null(set_lang($data,'phone2',app()->getLocale())))
                                                <a href="tel:{{str_replace('-','',set_lang($data,'phone2',app()->getLocale()))}}">{{set_lang($data,'phone2',app()->getLocale())}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!is_null(set_lang($data,'mobile1',app()->getLocale())) || !is_null(set_lang($data,'mobile2',app()->getLocale())))
                                    <div class="c_details_item">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div class="media-body my-auto">
                                                @if(!is_null(set_lang($data,'mobile1',app()->getLocale())))
                                                    <a href="tel:{{set_lang($data,'mobile1',app()->getLocale())}}">{{set_lang($data,'mobile1',app()->getLocale())}}</a>
                                                @endif
                                                @if(!is_null(set_lang($data,'mobile2',app()->getLocale())))
                                                    <a href="tel:{{set_lang($data,'mobile2',app()->getLocale())}}">{{set_lang($data,'mobile2',app()->getLocale())}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 p-0">
                        <div class="container-fluid">
                            <div class="row">
                                <form id="hafez_form" class="col-12" action="{{route('user.contact.store')}}" method="post" novalidate="novalidate">
                                    @csrf

                                    <div class="row">

                                        <div class="form-group col-lg-6">
                                            <input type="text" style="height: 50px" class="form-control {{$errors->has('name')?'error_border':''}}" id="name" name="name"
                                                   placeholder="* {{__('text.contact.frm_name')}}" value="{{old('name')??''}}">
                                            <label class="err">{{$errors->has('name')?$errors->first('name'):''}}</label>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="email" style="height: 50px" class="form-control d-ltr {{$errors->has('email')?'error_border':''}}" id="email" name="email"
                                                   placeholder="{{__('text.contact.frm_email')}} *" value="{{old('email')??''}}">
                                            <label class="err">{{$errors->has('email')?$errors->first('email'):''}}</label>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" style="height: 50px" pattern="[0-9]" class="form-control d-ltr {{$errors->has('mobile')?'error_border':''}}" id="mobile" name="mobile"
                                                   placeholder="{{__('text.contact.frm_mobile')}} *" value="{{old('mobile')??''}}">
                                            <label class="err">{{$errors->has('mobile')?$errors->first('mobile'):''}}</label>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <select style="height: 50px" class="form-control {{$errors->has('part')?'error_border':''}}" id="part" name="part">
                                                <option value="">* {{__('text.contact.frm_part')}}</option>
                                                <option value="{{__('text.contact.frm_part_1')}}" {{old('part') && old('part')==__('text.contact.frm_part_1')?'selected':''}}>{{__('text.contact.frm_part_1')}}</option>
                                                <option value="{{__('text.contact.frm_part_2')}}" {{old('part') && old('part')==__('text.contact.frm_part_2')?'selected':''}}>{{__('text.contact.frm_part_2')}}</option>
                                                <option value="{{__('text.contact.frm_part_3')}}" {{old('part') && old('part')==__('text.contact.frm_part_3')?'selected':''}}>{{__('text.contact.frm_part_3')}}</option>
                                                <option value="{{__('text.contact.frm_part_4')}}" {{old('part') && old('part')==__('text.contact.frm_part_4')?'selected':''}}>{{__('text.contact.frm_part_4')}}</option>
                                            </select>
    {{--                                        <input type="text" class="form-control {{$errors->has('subject')?'error_border':''}}" id="subject" name="subject"--}}
    {{--                                               placeholder="{{__('text.contact.frm_subject')}}" value="{{old('subject')}}">--}}
                                            <label class="err">{{$errors->has('part')?$errors->first('part'):''}}</label>
                                        </div>

                                    </div>

                                    <div class="form-group col-12 px-0">
                                        <textarea rows="6" class="form-control {{$errors->has('text')?'error_border':''}}" name="text" id="text" rows="1"
                                                  placeholder="* {{__('text.contact.frm_msg')}}" >{{old('text')??''}}</textarea>
                                        <label class="err">{{$errors->has('text')?$errors->first('text'):''}}</label>
                                    </div>
                                    <div class="form-group col-12 px-0 text-right">
                                        <button class="g-recaptcha btn btn-gold px-4" data-sitekey="{{\App\Setting::find(1)->site_key}}" data-callback='onSubmit' data-action='submit'>{{__('text.contact.frm_btn')}}</button>
                                        {{-- <button style="color: #ffffff;" class="btn btn-gold px-4" type="submit" value="submit">{{__('text.contact.frm_btn')}}</button> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('js') @endsection