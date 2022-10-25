@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin.employment.page.update') }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            @csrf
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
                            <div class="form-group{{ $errors->has('employ_unit') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* موقعیت شغلی :</label>
                                        <input type="text" class="form-control key_word" id="employ_unit" name="employ_unit"
                                               value="{{ $item->employ_unit }}" required/>
                                        @if ($errors->has('employ_unit'))
                                            <span class="help-block"><strong>{{ $errors->first('employ_unit') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('employ_type') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* نوع همکاری :</label>
                                        <input type="text" class="form-control key_word" id="employ_type" name="employ_type"
                                               value="{{ $item->employ_type }}" required/>
                                        @if ($errors->has('employ_type'))
                                            <span class="help-block"><strong>{{ $errors->first('employ_type') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('employ_know') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* نحوه آشنایی :</label>
                                        <input type="text" class="form-control key_word" id="employ_know" name="employ_know"
                                               value="{{ $item->employ_know }}" required/>
                                        @if ($errors->has('employ_know'))
                                            <span class="help-block"><strong>{{ $errors->first('employ_know') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('employ_text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">* توضیحات فارسی :</label>
                                        <textarea class="textarea ckeditor form-control" id="employ_text" name="employ_text" cols="30"
                                                  rows="10">{{ $item->employ_text }}</textarea>
                                        @if ($errors->has('employ_text'))
                                            <span class="help-block"><strong>{{ $errors->first('employ_text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('employ_unit_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* واحد ها انگلیسی (با خط تیره "-" جدا کنید) :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="employ_unit_en" name="employ_unit_en"--}}
{{--                                               value="{{set_lang($item,'employ_unit','en')}}" required/>--}}
{{--                                        @if ($errors->has('employ_unit_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('employ_unit_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('employ_text_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">* توضیحات انگلیسی :</label>--}}
{{--                                        <textarea class="textarea ckeditor form-control" id="employ_text_en" name="employ_text_en"--}}
{{--                                                  cols="30" rows="10">{{set_lang($item,'employ_text','en')}}</textarea>--}}
{{--                                        @if ($errors->has('employ_text_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('employ_text_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('employ_pic_active') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصویر نمایش داده شود؟</label>
                        <input type="checkbox" id="employ_pic_active" name="employ_pic_active"
                               {{$item->employ_pic_active=='active'?'checked':''}}
                               value="active"/>
                        @if ($errors->has('employ_pic_active'))
                            <span class="help-block"><strong>{{ $errors->first('employ_pic_active') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('employ_pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصویر(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="employ_pic" name="employ_pic" accept="image/*"
                               value="{{ old('employ_pic') }}"/>
                        @if ($errors->has('employ_pic'))
                            <span class="help-block"><strong>{{ $errors->first('employ_pic') }}</strong></span>
                        @endif
                    </div>
                    @if(is_file($item->employ_pic))
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->employ_pic)}}" alt="">
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
