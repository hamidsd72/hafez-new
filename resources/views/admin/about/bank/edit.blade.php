@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-about-bank-update', $item->id) }}" method="POST"
              enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="type" class="form-label">* کارد ویو :</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1" {{$item->type==1?'selected':''}}>شماره حاب بانکی</option>
                                <option value="2" {{$item->type==2?'selected':''}}>بورس انرژی</option>
                                <option value="3" {{$item->type==3?'selected':''}}>بورس کالا</option>
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
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">* عنوان فارسی :</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ $item->title }}"
                                               required/>
                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('shaba') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="shaba" class="form-label">شماره شبا(بدونIR)  :</label>
                                        <input type="number" class="form-control text-left" dir="ltr" id="shaba" name="shaba" value="{{ $item->shaba }}"/>
                                        @if ($errors->has('shaba'))
                                            <span class="help-block"><strong>{{ $errors->first('shaba') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('hesab') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="hesab" class="form-label">شماره حساب  :</label>
                                        <input type="number" class="form-control text-left" dir="ltr" id="hesab" name="hesab" value="{{ $item->hesab }}"/>
                                        @if ($errors->has('hesab'))
                                            <span class="help-block"><strong>{{ $errors->first('hesab') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('card') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="card" class="form-label">شماره کارت  :</label>
                                        <input type="number" class="form-control text-left" dir="ltr" id="card" name="card" value="{{ $item->card }}"/>
                                        @if ($errors->has('card'))
                                            <span class="help-block"><strong>{{ $errors->first('card') }}</strong></span>
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
