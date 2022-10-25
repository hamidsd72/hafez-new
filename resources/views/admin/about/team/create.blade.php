@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-about-team-store') }}" method="POST" enctype="multipart/form-data"
              class="form-horizontal">
            <fieldset>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="type" class="form-label">* نمایش در کدام دسته باشد :</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1" {{old('type')==1?'selected':''}}>دسته اول</option>
                                <option value="2" {{old('type')==2?'selected':''}}>دسته دوم</option>
                                <option value="3" {{old('type')==3?'selected':''}}>دسته سوم</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block"><strong>{{ $errors->first('type') }}</strong></span>
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
                                        <label for="name" class="form-label">* نام فارسی  :</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                               required/>
                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="job" class="form-label">* سمت شغلی  :</label>
                                        <input type="text" class="form-control" id="job" name="job" value="{{ old('job') }}"
                                               required/>
                                        @if ($errors->has('job'))
                                            <span class="help-block"><strong>{{ $errors->first('job') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email" class="form-label">ایمیل  :</label>
                                        <input type="email" class="form-control text-left" dir="ltr" id="email" name="email" value="{{ old('email') }}"/>
                                        @if ($errors->has('email'))
                                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="phone" class="form-label">تلفن تماس  :</label>
                                        <input type="text" class="form-control text-left" dir="ltr" id="phone" name="phone" value="{{ old('phone') }}"/>
                                        @if ($errors->has('phone'))
                                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="linkedin" class="form-label">لینکدین  :</label>
                                        <input type="url" class="form-control text-left" dir="ltr" id="linkedin" name="linkedin" value="{{ old('linkedin') }}"/>
                                        @if ($errors->has('linkedin'))
                                            <span class="help-block"><strong>{{ $errors->first('linkedin') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
{{--                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="english-tab">--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="pic" class="form-label">تصویر(jpg,png)
                            :</label>
                        <input type="file" class="form-control" id="pic" name="pic" accept=".jpg,.png"
                               value="{{ old('pic') }}"/>
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
@endcomponent
