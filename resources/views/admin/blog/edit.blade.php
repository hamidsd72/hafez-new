@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.esm.min.js" integrity="sha512-yPOQ2pPoQ9JtP0/jDKpXiKyWNCJWT5OI+6r1EqZmTg+afKQOBpy08VYboeq+Tt9kl9/FOCueEhH6cmHN3nAdJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/helpers.esm.min.js" integrity="sha512-vxCPccgWacJoW2HlxhlKKtczdzvcg0r1UuB9LfNGt6vsDbgLfSFxKlolUS2mqKNXrOK5b93S45309T+V5BhueA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-blog-update', $item->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                        <label for="name" class="form-label">* عنوان فارسی  :</label>
                                        <input type="text" class="form-control" id="name" name="title" value="{{ $item->title }}" required/>
                                        <input type="hidden" class="form-control" id="slug" name="slug"
                                               value="{{ $item->slug }}" />
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('short_text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">* خلاصه فارسی :</label>
                                        <textarea class="form-control" rows="3" id="short_text" name="short_text">{{ $item->short_text }}</textarea>
                                        @if ($errors->has('short_text'))
                                            <span class="help-block"><strong>{{ $errors->first('short_text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">* توضیحات فارسی :</label>
                                        <textarea class="form-control textarea " id="text" name="text">{{ $item->text }}</textarea>
                                        @if ($errors->has('text'))
                                            <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('writer') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">* نویسنده فارسی  :</label>
                                        <input type="text" class="form-control" id="writer" name="writer" value="{{ $item->writer }}"
                                               required/>
                                        @if ($errors->has('writer'))
                                            <span class="help-block"><strong>{{ $errors->first('writer') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('titleseo') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label"> عنوان سئو فارسی  :</label>
                                        <input type="text" class="form-control" id="titleseo" name="titleseo" value="{{ $item->titleseo }}"
                                        />
                                        @if ($errors->has('titleseo'))
                                            <span class="help-block"><strong>{{ $errors->first('titleseo') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('keywordsseo') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label"> کلمه کلیدی سئو فارسی(با دقت وارد شود،برای انتخاب مقالات مشابه)  :</label>
                                        <input type="text" class="form-control key_word" id="keywordsseo" name="keywordsseo" placeholder="کلمات را با ویرگول جدا کنید"  value="{{ $item->keywordsseo }}"
                                        />
                                        @if ($errors->has('keywordsseo'))
                                            <span class="help-block"><strong>{{ $errors->first('keywordsseo') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('descriptionseo') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label"> توضیحات سئو فارسی  :</label>
                                        <input type="text" class="form-control" id="descriptionseo" name="descriptionseo" value="{{ $item->descriptionseo }}"
                                        />
                                        @if ($errors->has('descriptionseo'))
                                            <span class="help-block"><strong>{{ $errors->first('descriptionseo') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
                    {{--                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label">* عنوان انگلیسی :</label>--}}
                    {{--                                        <input type="text" class="form-control d-ltr" id="name_en" name="title_en" value="{{set_lang($item,'title','en')}}"--}}
                    {{--                                               required/>--}}
                    {{--                                        <input type="hidden" class="form-control d-ltr" id="slug_en" name="slug_en"--}}
                    {{--                                               value="{{ $item->slug_en }}" />--}}
                    {{--                                        @if ($errors->has('title_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('title_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('short_text_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label">* خلاصه انگلیسی :</label>--}}
                    {{--                                        <textarea class="form-control d-ltr " rows="3" id="short_text_en" name="short_text_en">{{set_lang($item,'short_text','en')}}</textarea>--}}
                    {{--                                        @if ($errors->has('short_text_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('short_text_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('text_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label">* توضیحات انگلیسی :</label>--}}
                    {{--                                        <textarea class="form-control ckeditor " id="text_en" name="text_en">{{set_lang($item,'text','en')}}</textarea>--}}
                    {{--                                        @if ($errors->has('text_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('text_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('writer_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label">* نویسنده انگلیسی  :</label>--}}
                    {{--                                        <input type="text" class="form-control d-ltr" id="writer_en" name="writer_en" value="{{set_lang($item,'writer','en')}}"--}}
                    {{--                                               required/>--}}
                    {{--                                        @if ($errors->has('writer_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('writer_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('titleseo_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label"> عنوان سئو انگلیسی  :</label>--}}
                    {{--                                        <input type="text" class="form-control d-ltr" id="titleseo_en" name="titleseo_en" value="{{set_lang($item,'titleseo','en')}}"--}}
                    {{--                                        />--}}
                    {{--                                        @if ($errors->has('titleseo_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('titleseo_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('keywordsseo_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label"> کلمه کلیدی سئو انگلیسی  :</label>--}}
                    {{--                                        <input type="text" class="form-control d-ltr" id="keywordsseo_en" name="keywordsseo_en" placeholder="کلمات را با ویرگول جدا کنید" value="{{set_lang($item,'keywordsseo','en')}}"--}}
                    {{--                                        />--}}
                    {{--                                        @if ($errors->has('keywordsseo_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('keywordsseo_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group{{ $errors->has('descriptionseo_en') ? ' has-error' : '' }}">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <label for="name" class="form-label"> توضیحات سئو انگلیسی  :</label>--}}
                    {{--                                        <input type="text" class="form-control d-ltr" id="descriptionseo_en" name="descriptionseo_en" value="{{set_lang($item,'descriptionseo','en')}}"--}}
                    {{--                                        />--}}
                    {{--                                        @if ($errors->has('descriptionseo_en'))--}}
                    {{--                                            <span class="help-block"><strong>{{ $errors->first('descriptionseo_en') }}</strong></span>--}}
                    {{--                                        @endif--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">تصویر(در صورت انتخاب تصویر جدید جایگزین می شود) :</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*"/>
                        @if ($errors->has('photo'))
                            <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
                        @endif
                    </div>
                    @if($item->photo)
                        <div class="col-sm-2 mt-3">
                            <img src="{{url($item->photo->path)}}"  style="height: 50px;background: rgba(0,0,0,0.1)" alt="">
                        </div>
                    @endif
                </div> 
                <div>
                    <canvas id="myChart" height="100"></canvas>
                </div>
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
    <script>
        // const labels = [ 'January', 'February', 'March', 'April', 'May', 'June',];
        const labels = @json($labels);
    
        const data = {
        labels: labels,
        datasets: [{
                label: 'وضعیت بازدیدهای پست',
                backgroundColor: 'rgb(184 184 184)',
                borderColor: 'rgb(165, 125, 36)',
                data: @json($datas),
                // data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };
    
        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart( document.getElementById('myChart'), config );
        
    </script>
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
