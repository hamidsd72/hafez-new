@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-contact-info-update', $item->id) }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <h5>اطلاعات تماس با ما</h5>
                <div class="col-sm-12 tab_box my-3 py-3 px-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="fa-tab" data-toggle="tab" href="#fa" role="tab"
                               aria-controls="farsi" aria-selected="true"> فارسی</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab"--}}
{{--                               aria-controls="english" aria-selected="false"> انگلیسی</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa" role="tabpanel" aria-labelledby="farsi-tab">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* آدرس :</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ $item->address }}" required/>
                                        @if ($errors->has('address'))
                                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile1') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label"> موبایل1 :</label>
                                        <input type="text" class="form-control d-ltr" id="mobile1"
                                               name="mobile1" value="{{ $item->mobile1 }}"/>
                                        @if ($errors->has('mobile1'))
                                            <span class="help-block"><strong>{{ $errors->first('mobile1') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile2') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">موبایل2 :</label>
                                        <input type="text" class="form-control d-ltr" id="mobile2"
                                               name="mobile2" value="{{ $item->mobile2 }}"/>
                                        @if ($errors->has('mobile2'))
                                            <span class="help-block"><strong>{{ $errors->first('mobile2') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* تلفن1(هدر) :</label>
                                        <input type="text" class="form-control d-ltr" id="phone1"
                                               name="phone1" value="{{ $item->phone1 }}"/>
                                        @if ($errors->has('phone1'))
                                            <span class="help-block"><strong>{{ $errors->first('phone1') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">تلفن2 :</label>
                                        <input type="text" class="form-control d-ltr" id="phone2"
                                               name="phone2" value="{{ $item->phone2 }}"/>
                                        @if ($errors->has('phone2'))
                                            <span class="help-block"><strong>{{ $errors->first('phone2') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="text" class="form-label">توضیحات :</label>
                                    <textarea class="textarea ckeditor form-control" id="text"
                                              name="text"
                                              cols="30" rows="10">{{ $item->text }}</textarea>
                                    @if ($errors->has('text'))
                                        <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('address_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* آدرس انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="address_en" name="address_en"--}}
{{--                                               value="{{set_lang($item,'address','en')}}" required/>--}}
{{--                                        @if ($errors->has('address_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('address_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('mobile1_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label"> موبایل1 :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="mobile1_en"--}}
{{--                                               name="mobile1_en" value="{{set_lang($item,'mobile1','en')}}"/>--}}
{{--                                        @if ($errors->has('mobile1_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('mobile1_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('mobile2_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">موبایل2 :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="mobile2_en"--}}
{{--                                               name="mobile2_en" value="{{set_lang($item,'mobile2','en')}}"/>--}}
{{--                                        @if ($errors->has('mobile2_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('mobile2_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('phone1_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* تلفن1(هدر) :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="phone1_en"--}}
{{--                                               name="phone1_en" value="{{set_lang($item,'phone1','en')}}"/>--}}
{{--                                        @if ($errors->has('phone1_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('phone1_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('phone2_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">تلفن2 :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="phone2_en"--}}
{{--                                               name="phone2_en" value="{{set_lang($item,'phone2','en')}}"/>--}}
{{--                                        @if ($errors->has('phone2_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('phone2_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
                <div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">* نقشه :</label>
                            <input type="text" class="form-control d-ltr" id="map"
                                   name="map" value="{{ $item->map }}"/>
                            @if ($errors->has('map'))
                                <span class="help-block"><strong>{{ $errors->first('map') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email1') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">* ایمیل1 :</label>
                            <input type="text" class="form-control d-ltr" id="email1"
                                   name="email1" value="{{ $item->email1 }}"/>
                            @if ($errors->has('email1'))
                                <span class="help-block"><strong>{{ $errors->first('email1') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email2') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">ایمیل2 :</label>
                            <input type="text" class="form-control d-ltr" id="email2"
                                   name="email2" value="{{ $item->email2 }}"/>
                            @if ($errors->has('email2'))
                                <span class="help-block"><strong>{{ $errors->first('email2') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('telegram') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">تلگرام :</label>
                            <input type="text" class="form-control d-ltr" id="telegram"
                                   name="telegram" value="{{ $item->telegram }}"/>
                            @if ($errors->has('telegram'))
                                <span class="help-block"><strong>{{ $errors->first('telegram') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">اینستاگرام :</label>
                            <input type="text" class="form-control d-ltr" id="instagram"
                                   name="instagram" value="{{ $item->instagram }}"/>
                            @if ($errors->has('instagram'))
                                <span class="help-block"><strong>{{ $errors->first('instagram') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">واتساپ :</label>
                            <input type="text" class="form-control d-ltr" id="whatsapp"
                                   name="whatsapp" value="{{ $item->whatsapp }}"/>
                            @if ($errors->has('whatsapp'))
                                <span class="help-block"><strong>{{ $errors->first('whatsapp') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">فیسبوک :</label>
                            <input type="text" class="form-control d-ltr" id="facebook"
                                   name="facebook" value="{{ $item->facebook }}"/>
                            @if ($errors->has('facebook'))
                                <span class="help-block"><strong>{{ $errors->first('facebook') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('linkdin') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">لینکدین :</label>
                            <input type="text" class="form-control d-ltr" id="linkdin"
                                   name="linkdin" value="{{ $item->linkdin }}"/>
                            @if ($errors->has('linkdin'))
                                <span class="help-block"><strong>{{ $errors->first('linkdin') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('aparat') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">آپارات :</label>
                            <input type="text" class="form-control d-ltr" id="aparat"
                                   name="aparat" value="{{ $item->aparat }}"/>
                            @if ($errors->has('aparat'))
                                <span class="help-block"><strong>{{ $errors->first('aparat') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <hr/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success pull-left mr-2"><i class="fa fa-check ml-2"></i>ثبت شود</button>
                            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-refresh ml-2"></i>بازنشانی</button>
                            <a href="{{ route('admin-home') }}" class="btn btn-default pull-left ml-2"><i class="fa fa-remove ml-2"></i>انصراف</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{ url('includes/asset/editor/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('includes/asset/editor/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript">
        var textareaOptions = {
            filebrowserImageBrowseUrl: '{{ url('filemanager?type=Images') }}',
            filebrowserImageUploadUrl: '{{ url('filemanager/upload?type=Images&_token=') }}',
            filebrowserBrowseUrl: '{{ url('filemanager?type=Files') }}',
            filebrowserUploadUrl: '{{ url('filemanager/upload?type=Files&_token=') }}',
            language: 'fa'
        };
        $('.textarea').ckeditor(textareaOptions);
    </script>
@endpush
@endcomponent
