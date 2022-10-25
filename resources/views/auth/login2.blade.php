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
    <div class="login">
        <header class="header-login pull-right w-100">
            <h1 class="pull-right w-100 text-center">ورود به سامانه</h1>
            <p class="pull-right w-100 mt-2 text-center">ورود به پروفایل کاربری</p>
            @if(!is_null(session()->get('errors')))
                <a href="#" class="pull-right w-100 mt-2 text-center text-white"
                   style="font-size: 15px;color: red !important;">
                    شماره موبایل یا رمز عبور اشتباه است
                    <span style="color: white" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal"></span>
                </a>
            @endif
            <div class="pull-right w-100 mt-2 text-center text-white" style="font-size: 15px;color: red !important;">{{$error ?? ''}}</div>
        </header>
        <form action="{{ route('new-register.store') }}" method="POST" class="form-horizontal pull-right w-100">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{-- @if ($errors->has('email'))
                    <p class="text-center" style="padding: 8px;background-color: #ff000094;color: white; margin-top: -62px;">
                        <strong>{{ $errors->first('email') == 'auth.failed' ? 'نام کاربری یا رمز عبور اشتباه است' : $errors->first('email') }}</strong>
                    </p>
                @endif --}}
                <i class="fas fa-mobile-alt"></i>
                <input type="text" class="form-control" id="email" name="mobile" placeholder="نام کاربری(شماره موبایل)" value="{{ old('email') }}"/>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <i class="fas fa-unlock-alt"></i>
                <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور" value="{{ old('password') }}"/>
                {{-- @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif --}}
            </div>
{{-- 
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <a style="cursor: pointer" data-toggle="modal" data-target="#exampleModal">رمز عبور را فراموش کردید ؟ </a>
            </div> --}}

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">ورود</button>
            </div>

            {{ csrf_field() }}

        </form>
    </div>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin.layout.min.js') }}"></script>

@endsection

@endcomponent
