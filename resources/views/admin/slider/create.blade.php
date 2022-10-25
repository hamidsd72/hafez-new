@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-slider-store') }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>

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
                                        <label for="title" class="form-label">عنوان اسلایدر فارسی (متن درون کادر) :</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ old('title') }}"/>
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('text1') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">متن اسلایدر فارسی (متن درشت) :</label>
                                        <input type="text" class="form-control" id="text1" name="text1"
                                               value="{{ old('text1') }}"/>
                                        @if ($errors->has('text1'))
                                            <span class="help-block"><strong>{{ $errors->first('text1') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">عنوان اسلایدر انگلیسی (متن درون کادر) :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="title_en" name="title_en"--}}
{{--                                               value="{{ old('title_en') }}"/>--}}
{{--                                        @if ($errors->has('title_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('title_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('text1_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">متن اسلایدر انگلیسی (متن درشت1) :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="text1_en" name="text1_en"--}}
{{--                                               value="{{ old('text1_en') }}"/>--}}
{{--                                        @if ($errors->has('text1_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('text1_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('text2_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">متن اسلایدر انگلیسی (متن درشت2) :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="text2_en" name="text2_en"--}}
{{--                                               value="{{ old('text2_en') }}"/>--}}
{{--                                        @if ($errors->has('text2_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('text2_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
{{--                <div class="form-group{{ $errors->has('place_text') ? ' has-error' : '' }}">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <label for="place_text" class="form-label">چینش متن روی اسلایدر (در صورت انتخاب تصویر،مکان عکس انتخاب شما می شود) :</label>--}}
{{--                            <select name="place_text" id="place_text" class="form-control">--}}
{{--                                <option value="right" {{old('place_text')=='right'?'selected':''}}>راست</option>--}}
{{--                                <option value="left" {{old('place_text')=='left'?'selected':''}}>چپ</option>--}}
{{--                            </select>--}}
{{--                            @if ($errors->has('place_text'))--}}
{{--                                <span class="help-block"><strong>{{ $errors->first('place_text') }}</strong></span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group{{ $errors->has('animate_text') ? ' has-error' : '' }}">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <label for="animate_text" class="form-label">حرکت انیمیشن متن :</label>--}}
{{--                            <select name="animate_text" id="animate_text" class="form-control">--}}
{{--                                <option value="rtl" {{old('animate_text')=='rtl'?'selected':''}}>راست به چپ</option>--}}
{{--                                <option value="ltr" {{old('animate_text')=='ltr'?'selected':''}}>چپ به راست</option>--}}
{{--                                <option value="ttb" {{old('animate_text')=='ttb'?'selected':''}}>بالا به پایین</option>--}}
{{--                                <option value="btt" {{old('animate_text')=='btt'?'selected':''}}>پایین به بالا</option>--}}
{{--                            </select>--}}
{{--                            @if ($errors->has('animate_text'))--}}
{{--                                <span class="help-block"><strong>{{ $errors->first('animate_text') }}</strong></span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group{{ $errors->has('animate_pic') ? ' has-error' : '' }}">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <label for="animate_pic" class="form-label">حرکت انیمیشن تصویر :</label>--}}
{{--                            <select name="animate_pic" id="animate_pic" class="form-control">--}}
{{--                                <option value="rtl" {{old('animate_pic')=='rtl'?'selected':''}}>راست به چپ</option>--}}
{{--                                <option value="ltr" {{old('animate_pic')=='ltr'?'selected':''}}>چپ به راست</option>--}}
{{--                                <option value="ttb" {{old('animate_pic')=='ttb'?'selected':''}}>بالا به پایین</option>--}}
{{--                                <option value="btt" {{old('animate_pic')=='btt'?'selected':''}}>پایین به بالا</option>--}}
{{--                            </select>--}}
{{--                            @if ($errors->has('animate_pic'))--}}
{{--                                <span class="help-block"><strong>{{ $errors->first('animate_pic') }}</strong></span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="form-group{{ $errors->has('show') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="show" class="form-label">* نمایش / عدم نمایش :</label>
                            <select name="show" id="show" class="form-control">
                                <option value="1" {{old('show')==1?'selected':''}}>نمایش</option>
                                <option value="0" {{old('show')==0?'selected':''}}>عدم نمایش</option>
                            </select>
                            @if ($errors->has('show'))
                                <span class="help-block"><strong>{{ $errors->first('show') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('sort_id') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="sort_id" class="form-label">* ترتیب نمایش :</label>
                            <input type="number" class="form-control" id="sort_id" name="sort_id" min="1" value="1"
                                   required/>
                            @if ($errors->has('sort_id'))
                                <span class="help-block"><strong>{{ $errors->first('sort_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="url" class="form-label">لینک :</label>
                            <input type="url" class="form-control d-ltr" id="url" name="url"/>
                            @if ($errors->has('url'))
                                <span class="help-block"><strong>{{ $errors->first('url') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">* تصویر اسلایدر(jpg) :</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept=".jpg"
                               value="{{ old('photo') }}"/>
                        @if ($errors->has('photo'))
                            <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('img_top') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="img_top" class="form-label">تصویر روی اسلایدر(png) :</label>
                        <input type="file" class="form-control" id="img_top" name="img_top" accept=".png"
                               value="{{ old('img_top') }}"/>
                        @if ($errors->has('img_top'))
                            <span class="help-block"><strong>{{ $errors->first('img_top') }}</strong></span>
                        @endif
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success pull-left mr-2"><i class="fa fa-check ml-2"></i>ثبت شود</button>
                            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-refresh ml-2"></i>بازنشانی</button>
                            <a href="{{ URL::previous() }}" class="btn btn-default pull-left ml-2"><i class="fa fa-remove ml-2"></i>انصراف</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
@endcomponent
