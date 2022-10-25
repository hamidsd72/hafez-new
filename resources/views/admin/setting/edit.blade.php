@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-setting-update', $item->id) }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <h5>تنظیمات سایت</h5>
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
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* عنوان  سایت فارسی :</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ $item->title }}" required/>
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('shoar') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* شعار  سایت فارسی :</label>
                                        <input type="text" class="form-control" id="shoar" name="shoar"
                                               value="{{ $item->shoar }}" required/>
                                        @if ($errors->has('shoar'))
                                            <span class="help-block"><strong>{{ $errors->first('shoar') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">کلمات کلیدی فارسی :</label>
                                        <input type="text" class="form-control" id="keywords" name="keywords"
                                               value="{{ $item->keywords }}"
                                               placeholder="با کاما '،' کلمات را ازهم جدا کنید"/>
                                        @if ($errors->has('keywords'))
                                            <span class="help-block"><strong>{{ $errors->first('keywords') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('site_key') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">کلید اتصال به گوگل ریکپچا :</label>
                                        <input type="text" class="form-control" id="site_key" name="site_key"
                                               value="{{ $item->site_key }}"
                                               placeholder="کلید اتصال به گوگل ریکپچا (site_key)"/>
                                        @if ($errors->has('site_key'))
                                            <span class="help-block"><strong>{{ $errors->first('site_key') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">توضیحات سئو فارسی :</label>
                                        <textarea class="textarea form-control" id="description" name="description" cols="30"
                                                  rows="2">{{ $item->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group{{ $errors->has('header_pic_fa') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">هدر صفحات سایت فارسی(در صورت انتخاب تصویر جدید جایگزین می شود)
                                        :</label>
                                    <input type="file" class="form-control" id="header_pic_fa" name="header_pic_fa" accept="image/*"
                                           value="{{ old('header_pic_fa') }}"/>
                                    @if ($errors->has('header_pic_fa'))
                                        <span class="help-block"><strong>{{ $errors->first('header_pic_fa') }}</strong></span>
                                    @endif
                                </div>
                                @if($item->header_pic_fa)
                                    <div class="col-sm-2 mt-3">
                                        <img src="{{url($item->header_pic_fa)}}" style="background: rgba(0,0,0,0.1)" alt="">
                                    </div>
                                @endif
                            </div> --}}

                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* عنوان سایت انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="title_en" name="title_en"--}}
{{--                                               value="{{set_lang($item,'title','en')}}" required/>--}}
{{--                                        @if ($errors->has('title_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('title_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('shoar_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* شعار سایت انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="shoar_en" name="shoar_en"--}}
{{--                                               value="{{set_lang($item,'shoar','en')}}" required/>--}}
{{--                                        @if ($errors->has('shoar_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('shoar_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('keywords_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="name" class="form-label">کلمات کلیدی انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="keywords_en" name="keywords_en"--}}
{{--                                               value="{{set_lang($item,'keywords','en')}}"--}}
{{--                                               placeholder="با کاما '،' کلمات را ازهم جدا کنید"/>--}}
{{--                                        @if ($errors->has('keywords_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('keywords_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">توضیحات سئو انگلیسی :</label>--}}
{{--                                        <textarea class="textarea form-control d-ltr" id="description_en" name="description_en"--}}
{{--                                                  cols="30" rows="2">{{set_lang($item,'description','en')}}</textarea>--}}
{{--                                        @if ($errors->has('description_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('description_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('header_pic_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="photo" class="form-label">هدر صفحات سایت انگلیسی(در صورت انتخاب تصویر جدید جایگزین می شود)--}}
{{--                                        :</label>--}}
{{--                                    <input type="file" class="form-control" id="header_pic_en" name="header_pic_en" accept="image/*"--}}
{{--                                           value="{{ old('header_pic_en') }}"/>--}}
{{--                                    @if ($errors->has('header_pic_en'))--}}
{{--                                        <span class="help-block"><strong>{{ $errors->first('header_pic_en') }}</strong></span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                @if($item->header_pic_en)--}}
{{--                                    <div class="col-sm-2 mt-3">--}}
{{--                                        <img src="{{url($item->header_pic_en)}}" style="background: rgba(0,0,0,0.1)" alt="">--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <label for="photo" class="form-label">لوگو سایت رنگ تیره(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/png"
                               value="{{ old('logo') }}"/>
                        @if ($errors->has('logo'))
                            <span class="help-block"><strong>{{ $errors->first('logo') }}</strong></span>
                        @endif
                    </div>
                    @if($item->logo)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->logo)}}" style="background: rgba(0,0,0,0.1)" alt="">
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('logo2') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <label for="photo" class="form-label">لوگو سایت رنگ مایل به سفید(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="logo2" name="logo2" accept="image/png"
                               value="{{ old('logo2') }}"/>
                        @if ($errors->has('logo2'))
                            <span class="help-block"><strong>{{ $errors->first('logo2') }}</strong></span>
                        @endif
                    </div>
                    @if($item->logo2)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->logo2)}}" style="background: rgba(0,0,0,0.1)" alt="">
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <label for="photo" class="form-label">آیکون سایت(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="icon" name="icon" accept="image/png"
                               value="{{ old('icon') }}"/>
                        @if ($errors->has('icon'))
                            <span class="help-block"><strong>{{ $errors->first('icon') }}</strong></span>
                        @endif
                    </div>
                    @if($item->icon)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->icon)}}" style="background: rgba(0,0,0,0.1)" alt="">
                        </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('featur_pic') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <label for="photo" class="form-label">تصویر فوتر (در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="featur_pic" name="featur_pic" accept="image/png"
                               value="{{ old('featur_pic') }}"/>
                        @if ($errors->has('featur_pic'))
                            <span class="help-block"><strong>{{ $errors->first('featur_pic') }}</strong></span>
                        @endif
                    </div>
                    @if($item->featur_pic)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->featur_pic)}}" style="background: rgba(0,0,0,0.1)" alt="">
                        </div>
                    @endif
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
    <script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(".textarea").ckeditor({
            filebrowserImageBrowseUrl: "{{ url('laravel-filemanager?type=Images') }}",
            filebrowserImageUploadUrl: "{{ url('laravel-filemanager/upload?type=Images&_token=') }}",
            filebrowserBrowseUrl: "{{ url('laravel-filemanager?type=Files') }}",
            filebrowserUploadUrl: "{{ url('laravel-filemanager/upload?type=Files&_token=') }}"
        });
    </script>
@endpush
@endcomponent
