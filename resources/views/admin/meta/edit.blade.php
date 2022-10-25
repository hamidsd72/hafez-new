@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('meta-update', $item->id) }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <div class="form-group{{ $errors->has('name_page') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name_page" class="form-label">* url :</label>
                            <input type="text" class="form-control" id="name_page" name="name_page" min="1"
                                   value="{{$item->name_page}}"
                                   required/>
                            @if ($errors->has('name_page'))
                                <span class="help-block"><strong>{{ $errors->first('name_page') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="priority" class="form-label">priority :</label>
                            <input type="text" class="form-control d-ltr" id="priority" name="priority" min="1"
                                   value="{{$item->priority}}"
                                   />
                            @if ($errors->has('priority'))
                                <span class="help-block"><strong>{{ $errors->first('priority') }}</strong></span>
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
                        <li class="nav-item">
                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab"
                               aria-controls="english" aria-selected="false"> انگلیسی</a>
                        </li>
                    </ul>
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa" role="tabpanel" aria-labelledby="farsi-tab">
                <div class="form-group{{ $errors->has('title_page') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title_page" class="form-label">* title :</label>
                            <input type="text" class="form-control" id="title_page" name="title_page" min="1"
                                   value="{{$item->title_page}}"
                                   required/>
                            @if ($errors->has('title_page'))
                                <span class="help-block"><strong>{{ $errors->first('title_page') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="keyword" class="form-label">* keyword :</label>
                            <input type="text" class="form-control" id="keyword" name="keyword" min="1"
                                   value="{{$item->keyword}}"
                                   required/>
                            @if ($errors->has('keyword'))
                                <span class="help-block"><strong>{{ $errors->first('keyword') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description" class="form-label">* description :</label>
                            <textarea name="description" class="form-control" required>{{$item->description}}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">
                            <div class="form-group{{ $errors->has('title_page_en') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title_page" class="form-label">* title en :</label>
                                        <input type="text" class="form-control d-ltr" id="title_page_en" name="title_page_en" min="1"
                                               value="{{set_lang($item,'title_page','en')}}"
                                               required/>
                                        @if ($errors->has('title_page_en'))
                                            <span class="help-block"><strong>{{ $errors->first('title_page_en') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('keyword_en') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="keyword" class="form-label">* keyword en :</label>
                                        <input type="text" class="form-control d-ltr" id="keyword_en" name="keyword_en" min="1"
                                               value="{{set_lang($item,'keyword','en')}}"
                                               required/>
                                        @if ($errors->has('keyword_en'))
                                            <span class="help-block"><strong>{{ $errors->first('keyword_en') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">* description en:</label>
                                        <textarea name="description_en" class="form-control d-ltr" required>{{set_lang($item,'description','en')}}</textarea>

                                        @if ($errors->has('description_en'))
                                            <span class="help-block"><strong>{{ $errors->first('description_en') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
