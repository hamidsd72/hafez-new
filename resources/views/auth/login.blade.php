@component('layouts.auth')
@section('title') ورود به پنل @endsection
@section('body')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.layout.min.css') }}"/>

    <style>
        .modal-backdrop {
            z-index: 0;
        }
        .login form button {
            position: unset;
        }
    </style>
    @php session()->put('prevUrl',url()->previous()) @endphp
    <div class="login">
        <header class="header-login pull-right w-100">
            <h1 class="pull-right w-100 text-center">ورود به سامانه</h1>
            <p class="pull-right w-100 mt-2 text-center">ورود به پروفایل کاربری</p>
            @if(!is_null(session()->get('errors')))
                <a href="#" class="pull-right w-100 mt-2 text-center text-white"
                   style="font-size: 15px;color: red !important;">
                    شماره موبایل یا رمز عبور اشتباه است
                    <span style="color: white" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal">
                        </span>
                    @php Session::forget('mobile') @endphp
                </a>
            @endif
        </header>
        @if(isset($adminLogin))
            <form action="{{ route('adminLogin') }}" method="POST" class="form-horizontal pull-right w-100">
                <fieldset>
                    <div class="form-group{{ $errors->has('smsCode') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fas fa-mobile-alt"></i>
                                <input type="text" class="form-control" id="smsCode" name="smsCode"
                                       placeholder="کد ارسالی" value="{{ old('smsCode') }}"/>
                                @if ($errors->has('smsCode'))
                                    <span class="help-block"><strong>{{ $errors->first('smsCode') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary"><i
                                            class="now-ui-icons objects_spaceship"></i></button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        @endif
        @unless(isset($adminLogin))
            <form action="{{ route('login') }}" method="POST" class="form-horizontal pull-right w-100">
            {{-- <form action="{{ route('new-register') }}" method="POST" class="form-horizontal pull-right w-100"> --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <p class="text-center" style="padding: 8px;background-color: #ff000094;color: white; margin-top: -62px;">
                            <strong>{{ $errors->first('email') == 'auth.failed' ? 'نام کاربری یا رمز عبور اشتباه است' : $errors->first('email') }}</strong>
                        </p>
                    @endif
                    <i class="fas fa-mobile-alt"></i>
                    <input type="text" class="form-control" id="email" name="mobile" placeholder="نام کاربری(شماره موبایل)" value="{{ old('email') }}"/>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fas fa-unlock-alt"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور" value="{{ old('password') }}"/>
                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <a style="cursor: pointer" data-toggle="modal" data-target="#exampleModal">رمز عبور را فراموش کردید ؟ </a>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">ورود</button>
                </div>

                {{ csrf_field() }}

            </form>
        @endunless
    </div>

    {{--modal --}}
    <div style="z-index: 1" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">فراموشی رمز عبور</h5>
                </div>
                <form action="{{ route('login-reset-pass') }}" method="POST"
                      class="form-horizontal pull-right w-100">
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="mobile" name="mobile" required
                                           placeholder="شماره موبایل خود را وارد کنید"
                                           value="{{ old('password') }}"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">بازیابی رمز</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="bg-alert animated fadeIn">
            <div class="alert-popup animated fadeInDown bg-{{ session('status') }}">
                <span class="pull-right text-size-base">{{ session('message') }}</span>
                <button class="alert-close pull-left">×</button>
            </div>
        </div>
    @endif
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/admin.layout.min.js') }}"></script>

@endsection

@endcomponent
