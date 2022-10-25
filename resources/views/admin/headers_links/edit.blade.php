@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <form action="{{ route('admin-headers-links.update', $item->id) }}" method="POST" class="form-horizontal">
            <fieldset>
                <div class="col-sm-12 tab_box my-3 py-3 px-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="fa-tab" data-toggle="tab" href="#fa" role="tab"
                               aria-controls="farsi" aria-selected="true"> فارسی</a>
                        </li>
                    </ul>
                    <div class="tab-content py-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="fa" role="tabpanel" aria-labelledby="farsi-tab">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="menu_id" class="form-label">صفحه مربوط به لینک را انتخاب کنبد :</label>
                                    <select name="menu_id" class="form-control select2">
                                        @foreach ($items as $menu)
                                            @unless ($menu->name=='text')
                                                <option value="{{$menu->id}}" @if($menu->id==$item->menu_id) selected @endif>{{$menu->name}}</option>
                                            @endunless
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="label" class="form-label">* عنوان صفحه :</label>
                                        <input type="text" class="form-control" id="label" name="label" value="{{ $item->label }}" required/>
                                        @if ($errors->has('label'))
                                            <span class="help-block"><strong>{{ $errors->first('label') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="link" class="form-label">نمایش در صفحه جدید :</label>
                            <input type="url" class="form-control text-left" dir="ltr" id="link" name="link" value="{{ $item->link }}" required/>
                            @if ($errors->has('link'))
                                <span class="help-block"><strong>{{ $errors->first('link') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <button type="submit" class="btn btn-success pull-left mr-2"><i class="fa fa-check ml-2"></i>ویرایش شود</button>
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
@endpush
@endcomponent
