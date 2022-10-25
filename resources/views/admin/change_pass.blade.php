@component('layouts.admin')
    @section('title') تغییر پسورد ادمین @endsection
    @section('body')
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>تغییر پسورد  ({{Auth::user()->name}})</h5>
            </div>
            <form action="{{ route('admin-pass-store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="form-group{{ $errors->has('old_pass') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="old_pass" class="form-label">پسورد قبلی :</label>
                                <input type="password" class="form-control" id="old_pass" name="old_pass" value="{{ old('old_pass') }}" placeholder="رمز عبور فعلی خود را وارد نمایید" required/>
                                @if ($errors->has('old_pass'))
                                    <span class="help-block"><strong>{{ $errors->first('old_pass') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="pass" class="form-label">پسورد جدید :</label>
                                <input type="password" class="form-control" id="pass" name="pass" value="{{ old('pass') }}" placeholder="رمز عبور جدید خود را وارد نمایید" required/>
                                @if ($errors->has('pass'))
                                    <span class="help-block"><strong>{{ $errors->first('pass') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('conf_pass') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="conf_pass" class="form-label">تکرار پسورد جدید :</label>
                                <input type="password" class="form-control" id="conf_pass" name="conf_pass" value="{{ old('conf_pass') }}" placeholder="رمز عبور جدید را مجددا وارد نمایید" required/>
                                @if ($errors->has('conf_pass'))
                                    <span class="help-block"><strong>{{ $errors->first('conf_pass') }}</strong></span>
                                @endif
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
