@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-about-branch-update', $item->id) }}" method="POST"
              enctype="multipart/form-data" class="form-horizontal">
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
                                        <label for="title" class="form-label">* شعبه  :</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}"
                                               required/>
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="city" class="form-label">* استان،شهر  :</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $item->city }}"
                                               required/>
                                        @if ($errors->has('city'))
                                            <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="province" class="form-label">* استان جهت یافتن روی نقشه  :</label>
                                        <select class="form-control" id="province" name="province">
                                            @foreach ($items as $data)
                                                <option value="{{$data}}" @if($item->province == $data) selected @endif>{{$data}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('province'))
                                            <span class="help-block"><strong>{{ $errors->first('province') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="address" class="form-label">* آدرس  :</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $item->address }}"
                                               required/>
                                        @if ($errors->has('address'))
                                            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="phone" class="form-label">* شماره تماس  :</label>
                                        <input type="text" class="form-control text-left" dir="ltr" id="phone" name="phone" value="{{ $item->phone }}" required/>
                                        @if ($errors->has('phone'))
                                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email" class="form-label">ایمیل  :</label>
                                        <input type="email" class="form-control text-left" dir="ltr" id="email" name="email" value="{{ $item->email }}"/>
                                        @if ($errors->has('email'))
                                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
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
                        <input type="file" class="form-control" id="pic" name="pic" accept=".jpg,.png"/>
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
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success pull-left mr-2"><i
                                        class="fa fa-check ml-2"></i>ثبت شود
                            </button>
                            <button type="reset" class="btn btn-default pull-left"><i class="fa fa-refresh ml-2"></i>بازنشانی
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

@endsection
@endcomponent
