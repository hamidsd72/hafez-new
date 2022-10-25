@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-about-update', $item->id) }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <h5>درباره ما</h5>
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
                            <div class="form-group{{ $errors->has('head_text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="head_text" class="form-label">* توضیحات بالای صفحه :</label>
                                        <textarea class="textarea form-control" id="head_text" name="head_text" cols="30"
                                                  rows="10">{{ $item->head_text }}</textarea>
                                        @if ($errors->has('head_text'))
                                            <span class="help-block"><strong>{{ $errors->first('head_text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* عنوان درباره ما فارسی :</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ $item->title }}" required/>
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">* توضیحات فارسی :</label>
                                        <textarea class="textarea form-control" id="text" name="text" cols="30"
                                                  rows="10">{{ $item->text }}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* عنوان درباره ما انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="title_en" name="title_en"--}}
{{--                                               value="{{set_lang($item,'title','en')}}" required/>--}}
{{--                                        @if ($errors->has('title_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('title_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('text_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">* توضیحات انگلیسی :</label>--}}
{{--                                        <textarea class="textarea ckeditor form-control" id="text_en" name="text_en"--}}
{{--                                                  cols="30" rows="10">{{set_lang($item,'text','en')}}</textarea>--}}
{{--                                        @if ($errors->has('text_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('text_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصویر(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="photo" name="pic" accept="image/*"
                               value="{{ old('pic') }}"/>
                        @if ($errors->has('pic'))
                            <span class="help-block"><strong>{{ $errors->first('pic') }}</strong></span>
                        @endif
                    </div>
                    @if($item->pic)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->pic)}}" alt="">
                        </div>
                    @endif
                </div>
                <hr/>
                <h5>اهداف ما</h5>
                <div class="col-sm-12 tab_box my-3 py-3 px-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="fa-tab" data-toggle="tab" href="#fa1" role="tab"
                               aria-controls="farsi" aria-selected="true"> فارسی</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en1" role="tab"--}}
{{--                               aria-controls="english" aria-selected="false"> انگلیسی</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa1" role="tabpanel" aria-labelledby="farsi-tab">
                            <div class="form-group{{ $errors->has('vision_title') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">عنوان اهداف ما فارسی :</label>
                                        <input type="text" class="form-control" id="vision_title"
                                               name="vision_title" value="{{ $item->vision_title }}"/>
                                        @if ($errors->has('vision_title'))
                                            <span class="help-block"><strong>{{ $errors->first('vision_title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('vision_text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">توضیحات فارسی :</label>
                                        <textarea class="textarea form-control" id="vision_text"
                                                  name="vision_text" cols="30"
                                                  rows="10">{{ $item->vision_text }}</textarea>
                                        @if ($errors->has('vision_text'))
                                            <span class="help-block"><strong>{{ $errors->first('vision_text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en1" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('vision_title_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">عنوان اهداف ما انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr"  id="vision_title_en"--}}
{{--                                               name="vision_title_en"--}}
{{--                                               value="{{set_lang($item,'vision_title','en')}}"/>--}}
{{--                                        @if ($errors->has('vision_title_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('vision_title_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('vision_text_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">توضیحات انگلیسی :</label>--}}
{{--                                        <textarea class="textarea ckeditor form-control" id="vision_text_en"--}}
{{--                                                  name="vision_text_en"--}}
{{--                                                  cols="30"--}}
{{--                                                  rows="10">{{set_lang($item,'vision_text','en')}}</textarea>--}}
{{--                                        @if ($errors->has('vision_text_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('vision_text_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('vision_pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصویر(در صورت انتخاب تصویر جدید جایگزین می شود)
                            :</label>
                        <input type="file" class="form-control" id="vision_pic" name="vision_pic" accept="image/*"
                               value="{{ old('vision_pic') }}"/>
                        @if ($errors->has('vision_pic'))
                            <span class="help-block"><strong>{{ $errors->first('vision_pic') }}</strong></span>
                        @endif
                    </div>
                    @if($item->vision_pic)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->vision_pic)}}" alt="">
                        </div>
                    @endif
                </div>
                <hr/>
                <h5> درباره ما صفحه اصلی</h5>
                <div class="col-sm-12 tab_box my-3 py-3 px-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="fa-tab" data-toggle="tab" href="#fa2" role="tab"
                               aria-controls="farsi" aria-selected="true"> فارسی</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en2" role="tab"--}}
{{--                               aria-controls="english" aria-selected="false"> انگلیسی</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa2" role="tabpanel" aria-labelledby="farsi-tab">
                            <div class="form-group{{ $errors->has('index_title') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* عنوان فارسی :</label>
                                        <input type="text" class="form-control" id="index_title" name="index_title"
                                               value="{{ $item->index_title }}" required/>
                                        @if ($errors->has('index_title'))
                                            <span class="help-block"><strong>{{ $errors->first('index_title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('index_text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">* توضیحات فارسی :</label>
                                        <textarea class="textarea form-control" id="index_text"
                                                  name="index_text"
                                                  cols="30" rows="10">{{ $item->index_text }}</textarea>
                                        @if ($errors->has('index_text'))
                                            <span class="help-block"><strong>{{ $errors->first('index_text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en2" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('index_title_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label">* عنوان انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="index_title_en"--}}
{{--                                               name="index_title_en"--}}
{{--                                               value="{{set_lang($item,'index_title','en')}}" required/>--}}
{{--                                        @if ($errors->has('index_title_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('index_title_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('index_text_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">* توضیحات انگلیسی :</label>--}}
{{--                                        <textarea class="textarea ckeditor form-control" id="index_text_en"--}}
{{--                                                  name="index_text_en"--}}
{{--                                                  cols="30"--}}
{{--                                                  rows="10">{{set_lang($item,'index_text','en')}}</textarea>--}}
{{--                                        @if ($errors->has('index_text_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('index_text_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('index_pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصاویر(5 تصویر بیشتر ذخیره نمی شود)
                            :</label>
                        @if(count($item->photos)<5)
                        <input type="file" class="form-control" id="index_pic" name="index_pic[]" accept="image/*"
                               value="{{ old('index_pic') }}" multiple/>
                        @endif
                        @if ($errors->has('index_pic'))
                            <span class="help-block"><strong>{{ $errors->first('index_pic') }}</strong></span>
                        @endif
                    </div>
                    @if($item->photos && count($item->photos))
                        <div class="row">
                        @foreach($item->photos as $photo)
                            <div class="col-md-3 col-sm-6  mt-3" style="position: relative">
                                @if(count($item->photos)>1)
                                <a href="{{route('admin-about-pic-del',$photo->id)}}" style="position: absolute;top: 0;right: 0;background: darkred;color: #fff;padding: 5px;border-radius: 2px">× حذف</a>
                                @endif
                                <img src="{{url($photo->path)}}" style="width: 100%;height: 150px;object-fit: contain" alt="">
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
{{--                <div class="form-group{{ $errors->has('index_video') ? ' has-error' : '' }}">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <label for="photo" class="form-label">ویدئو(در صورت انتخاب ویدئو جدید جایگزین می شود)--}}
{{--                            :</label>--}}
{{--                        <input type="file" class="form-control" id="index_video" name="index_video" accept="video/*"--}}
{{--                               value="{{ old('index_video') }}"/>--}}
{{--                        @if ($errors->has('index_video'))--}}
{{--                            <span class="help-block"><strong>{{ $errors->first('index_video') }}</strong></span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    @if($item->index_video)--}}
{{--                        <div class="col-sm-2 mt-3">--}}
{{--                            <a href="{{url($item->index_video)}}" target="_blank">نمایش ویدئو</a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
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
