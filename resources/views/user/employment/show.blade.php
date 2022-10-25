@extends('layouts.user')
@section('css')
@endsection
@section('body')
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/employment.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('user/front/index.css') }}"/>

    <section class="contact_us_area">
        <div class="container">
            <div class="contact_us_inner container-fluid">
                {{-- <div class="d-none d-lg-block">
                    <div class="line d-flex" style="margin-right: 32%;">
                        <span class="dot"></span>
                        <div class="line-left"></div>
                        <h4>{{__('text.contact.titr')}}</h4>    
                        <div class="line-right"></div>
                        <span class="dot"></span>
                    </div> 
                </div>
                <div class="d-lg-none text-center">
                   <h4>{{__('text.contact.titr')}}</h4>
                </div> --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact_us_details text-center">
                            @if($item->employ_pic_active=='active' && $item->employ_pic)
                                <div class="col-10 mx-auto my-5">
                                    <img style="border-radius: 40px 4px;" src="{{url($item->employ_pic)}}" alt="{{$title}}">
                                </div>
                            @endif
                            <div class="h3-24">
                                {!! set_lang($item,'employ_text',app()->getLocale()) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="container-fluid">
                            <div class="row pt-lg-3">
                                <form id="hafez_form" class="contact_us_form col-12" action="{{route('user.employment.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-12 px-0">
                                        <input type="text" class="form-control {{$errors->has('name')?'error_border':''}}" id="name" name="name"
                                               placeholder="* {{__('text.employment.frm_name')}}" value="{{old('name')}}" required>
                                    </div>
                                    <div class="form-group col-12 px-0">
                                        <input type="text" class="form-control d-ltr {{$errors->has('mobile')?'error_border':''}}" id="mobile" name="mobile"
                                               placeholder="{{__('text.employment.frm_mobile')}} *" value="{{old('mobile')}}" required>
                                    </div>
                                    <div class="form-group col-12 px-0">
                                        <input type="email" class="form-control d-ltr {{$errors->has('email')?'error_border':''}}" id="email" name="email"
                                               placeholder="{{__('text.employment.frm_email')}}" value="{{old('email')}}">
                                    </div>
                                    @if(count($item->exploade_unit(set_lang($item,'employ_type',app()->getLocale()))))
                                    <div class="form-group col-12 px-0">
                                        <select class="form-control {{$errors->has('employ_type')?'error_border':''}}" id="employ_type" name="employ_type" required>
                                            <option value="">* نوع همکاری</option>
                                            @foreach($item->exploade_unit(set_lang($item,'employ_type',app()->getLocale())) as $unit)
                                            <option value="{{$unit}}" {{old('employ_type')==$unit?'selected':''}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    @if(count($item->exploade_unit(set_lang($item,'employ_unit',app()->getLocale()))))
                                    <div class="form-group col-12 px-0">
                                        <select class="form-control {{$errors->has('unit')?'error_border':''}}" id="unit" name="unit" required>
                                            <option value="">* {{__('text.employment.frm_unit')}}</option>
                                            @foreach($item->exploade_unit(set_lang($item,'employ_unit',app()->getLocale())) as $unit)
                                            <option value="{{$unit}}" {{old('unit')==$unit?'selected':''}}>{{$unit}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    @if(count($item->exploade_unit(set_lang($item,'employ_know',app()->getLocale()))))
                                        <div class="form-group col-12 px-0">
                                            <select class="form-control {{$errors->has('employ_know')?'error_border':''}}" id="employ_know" name="employ_know">
                                                <option value="">نحوه آشنایی</option>
                                                @foreach($item->exploade_unit(set_lang($item,'employ_know',app()->getLocale())) as $unit)
                                                    <option value="{{$unit}}" {{old('employ_know')==$unit?'selected':''}}>{{$unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group col-12 px-0">
                                        <textarea rows="3" name="short_text" id="short_text" class="form-control {{$errors->has('short_text')?'error_border':''}}" placeholder="* خلاصه ای از من" required>{{old('short_text')}}</textarea>
                                    </div>
                                    <div class="form-group col-12 p-0 file">
                                        <label style="background: #f2f2f2;border-top: 1px solid #dedede;border-right: 1px solid #dedede;border-left: 1px solid #dedede;" 
                                            class="pt-2 d-block {{app()->getLocale()=='fa'?'d-rtl text-right':'d-ltr text-left'}}">
                                            * {{__('text.employment.frm_resome')}} ( pdf, doc, docx, حداکثر اندازه فایل: 10 MB.)
                                        </label>
                                        <input style="border-top: 1px solid #f2f2f2;" type="file" class="py-2 form-control {{$errors->has('file')?'error_border':''}}" id="file" name="file" accept=".pdf,.doc,.docx" required>
                                    </div>
                                    <div class="form-group col-12 px-0 my-4">
                                        <button class="g-recaptcha btn text-white sub-btn" data-sitekey="{{\App\Setting::find(1)->site_key}}" data-callback='onSubmit' data-action='submit'>{{__('text.contact.frm_btn')}}</button>

                                        {{-- <button type="submit" value="submit" class="sub-btn" style="border: none;color: #ffffff">{{__('text.contact.frm_btn')}}</button> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                @if(count($items))
                    <div class="forsat" {{app()->getLocale()=='en'?'text-left':'text-right'}}">
                        <div class="d-lg-none my-4">
                            <h4  style="font-size: 18px;">{{__('text.contact.jobTitle')}}</h4>
                         </div>
                         <div class="d-none d-lg-block mt-lg-5">
                             <div class="line d-flex" style="margin-right: 27%;">
                                <span class="dot"></span>
                                <div class="line-left"></div>
                                <h4>{{__('text.contact.jobTitle')}}</h4>    
                                <div class="line-right"></div>
                                <span class="dot"></span>
                            </div> 
                         </div>
                        @foreach($items as $itemss)
                            <p> *
                                <a href="{{route('user.employment.show1',$itemss->id)}}" class="link_departeman">
                                    {!! set_lang($itemss,'title_link',app()->getLocale()) !!}
                                </a>
                            </p>
                        @endforeach
                    </div>
                @endif
                    
            </div>
        </div>
    </section>

@endsection
@section('js') @endsection