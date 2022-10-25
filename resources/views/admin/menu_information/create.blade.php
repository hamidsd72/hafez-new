@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-menu-information.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
                <div class="col-sm-12 tab_box my-3 py-3 px-0">
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa" role="tabpanel" aria-labelledby="farsi-tab">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="photo" class="form-label">صفحه مربوط به محتوا را انتخاب کنبد :</label>
                                    <select name="menu_id" class="form-control select2">
                                        @foreach ($items as $key => $item)
                                            @unless ($item->name=='text')
                                                <option value="{{$item->id}}" @if($key==0) selected @endif>{{$item->name}}</option>
                                            @endunless
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="textarea-container form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="text" class="form-label"> * متن محتوای :</label>
                                        <textarea class="textarea ckeditor form-control" id="text"
                                                  name="text">{{ old('text') }}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status" class="form-label">نمایش :</label>
                            <select name="status" class="form-control select2">
                                <option value="active" selected >نمایش</option>
                                <option value="pending" >عدم نمایش</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('section_number') ? ' has-error' : '' }}">
                            <label for="section_number" class="form-label"> * شماره سکشن محتوا :</label>
                            <input type="number" class="form-control text-left" placeholder="محل نمایش در کدام سکشن باشد" dir="ltr" id="section_number" name="section_number"
                                   value="{{ old('section_number')}}" required/>
                            @if ($errors->has('section_number'))
                                <span class="help-block"><strong>{{ $errors->first('section_number') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                            <label for="sort" class="form-label"> * ترتیب محتوا :</label>
                            <input type="number" class="form-control text-left" placeholder="آیتم چندم در یک سکشن" dir="ltr" id="sort" name="sort"
                                   value="{{ old('sort')}}" required/>
                            @if ($errors->has('sort'))
                                <span class="help-block"><strong>{{ $errors->first('sort') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="form-label"> * سطح آیتم :</label>
                            <input type="number" class="form-control text-left" placeholder="عنوان , تایتل و یا بادی یک محتوا " dir="ltr" id="position" name="position"
                                   value="{{ old('position')}}" required/>
                            @if ($errors->has('position'))
                                <span class="help-block"><strong>{{ $errors->first('position') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="pic" class="form-label">اگر محتوا تصویر دارد
                            :</label>
                        <input type="file" class="form-control" id="pic" name="pic" value="{{ old('pic') }}"/>
                        @if ($errors->has('pic'))
                            <span class="help-block"><strong>{{ $errors->first('pic') }}</strong></span>
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
