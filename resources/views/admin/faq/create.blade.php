@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-faq-store') }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <div class="form-group{{ $errors->has('cat_id') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="cat_id" class="form-label">* دسته بندی :</label>
                            <select name="cat_id" class="form-control">
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" {{old('cat_id')==$cat->id?'selected':''}}>{{$cat->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cat_id'))
                                <span class="help-block"><strong>{{ $errors->first('cat_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title" class="form-label">عنوان سوال :</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                                   required/>
                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
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
                            <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label"> سوال :</label>
                                        <input type="text" class="form-control" id="question" name="question"
                                               value="{{ old('question') }}"
                                               required/>
                                        @if ($errors->has('question'))
                                            <span class="help-block"><strong>{{ $errors->first('question') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label">پاسخ :</label>
                                        <textarea class="textarea form-control" id="answer" name="answer" cols="30"
                                                  rows="10">{{ old('answer') }}</textarea>
                                        @if ($errors->has('answer'))
                                            <span class="help-block"><strong>{{ $errors->first('answer') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('question_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="title" class="form-label"> سوال انگلیسی :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="question_en" name="question_en"--}}
{{--                                               value="{{ old('question_en') }}"--}}
{{--                                               required/>--}}
{{--                                        @if ($errors->has('question_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('question_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group{{ $errors->has('answer_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="text" class="form-label">پاسخ انگلیسی :</label>--}}
{{--                                        <textarea class="textarea form-control d-ltr" id="answer_en" name="answer_en"--}}
{{--                                                  cols="30"--}}
{{--                                                  rows="10">{{ old('answer_en') }}</textarea>--}}
{{--                                        @if ($errors->has('answer_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('answer_en') }}</strong></span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
