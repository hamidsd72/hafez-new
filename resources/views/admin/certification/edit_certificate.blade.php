@component('layouts.admin')
    @section('title') گواهی نامه ها @endsection
    @section('body')
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>ویرایش گواهی نامه</h5>
            </div>
            <form action="{{ route('admin_update_certificate', $item->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="pic" class="form-label">   تصویر گواهی نامه(در صورت انتخاب تصویر جدید جایگزین می شود) :</label>
                            <input type="file" class="form-control" id="pic" name="pic" accept="image/*" value="">
                        </div>
                        @if($item->pic)
                            <img src="{{url($item->pic)}}" style="width: 150px">
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title" class="form-label">* عنوان :</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}" required/>
                                @if ($errors->has('title'))
                                    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title" class="form-label">* عنوان انگلیسی :</label>
                                <input type="text" class="form-control d-ltr" id="title_en" name="title_en" value="{{set_lang($item,'title','en')}}" required/>
                                @if ($errors->has('title_en'))
                                    <span class="help-block"><strong>{{ $errors->first('title_en') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-group{{ $errors->has('c_content') ? ' has-error' : '' }}">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <label for="c_content" class="form-label">توضیحات :</label>--}}
{{--                                <textarea class="textarea ckeditor form-control" id="c_content" name="c_content" cols="30" rows="10">{{ $item->c_content }}</textarea>--}}
{{--                                @if ($errors->has('c_content'))--}}
{{--                                    <span class="help-block"><strong>{{ $errors->first('c_content') }}</strong></span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
