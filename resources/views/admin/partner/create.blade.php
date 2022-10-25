@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-partner-store') }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="photo" class="form-label">* تصویر :</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                               value="{{ old('photo') }}"/>
                        @if ($errors->has('photo'))
                            <span class="help-block"><strong>{{ $errors->first('photo') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="link" class="form-label">لینک :</label>
                            <input type="text" class="form-control text-left" dir="ltr" id="link" name="link"
                                   value="{{ old('link') }}"
                            />
                            @if ($errors->has('link'))
                                <span class="help-block"><strong>{{ $errors->first('link') }}</strong></span>
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
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">* نام  :</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                               required/>
                                        <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                                               required/>
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="name" class="form-label">* نام :</label>--}}
{{--                                        <input type="text" class="form-control d-ltr" id="name_en" name="name_en" value="{{ old('name_en') }}"--}}
{{--                                               required/>--}}
{{--                                        <input type="hidden" class="form-control d-ltr" id="slug_en" name="slug_en" value="{{ old('slug_en') }}"--}}
{{--                                               required/>--}}
{{--                                        @if ($errors->has('name_en'))--}}
{{--                                            <span class="help-block"><strong>{{ $errors->first('name_en') }}</strong></span>--}}
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
@endcomponent
