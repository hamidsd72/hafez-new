{{--@component('layouts.auth')--}}
{{--@section('title') ثبت نام @endsection--}}
{{--@section('body')--}}
{{--    <script src='https://www.google.com/recaptcha/api.js'></script>--}}
{{--    <style>--}}
{{--        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */--}}
{{--            color: #444 !important;--}}
{{--            opacity: 1; /* Firefox */--}}
{{--        }--}}
{{--    </style>--}}
{{--    <?php--}}
{{--    session_save_path('/tmp');--}}
{{--    session_start();--}}
{{--    $_SESSION = array();--}}
{{--    include("captcha.php");--}}
{{--    $_SESSION['captcha'] = simple_php_captcha();--}}
{{--    ?>--}}
{{--    <div style="width: 62%;margin-top: 50px" class="login">--}}
{{--        <header class="header-login pull-right w-100">--}}
{{--            <h1 class="pull-right w-100 text-center text-white">ثبت نام</h1>--}}
{{--            <p class="pull-right w-100 mt-2 text-center text-white">خوش آمدید لطفا اطلاعات خود را وارد کنید</p>--}}
{{--            <a href="{{route('login')}}" class="pull-right w-100 mt-2 text-center text-white">برای ورود کلیک کنید</a>--}}
{{--            <a href="#" class="pull-right w-100 mt-2 text-center text-white"--}}
{{--               style="font-size: 20px;color: red !important;">--}}

{{--                @if(!is_null(Session::get('email')))--}}
{{--                    {{Session::get('email')}}--}}

{{--                    @php Session::forget('email') @endphp--}}
{{--                @endif--}}
{{--            </a>--}}
{{--        </header>--}}
{{--        <form class="form-horizontal pull-right w-100">--}}
{{--            <fieldset>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons users_single-02"></i>--}}
{{--                            <input type="text" class="form-control firstName" onkeyup='saveValue(this);'--}}
{{--                                   id="input_one" name="firstName"--}}
{{--                                   placeholder="نام" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons users_single-02"></i>--}}
{{--                            <input type="text" class="form-control lastName" onkeyup='saveValue(this);'--}}
{{--                                   id="input_two" name="lastName"--}}
{{--                                   placeholder="نام خانوادگی" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons tech_mobile"></i>--}}
{{--                            <input type="number" step="any" onkeyup='saveValue(this);'--}}
{{--                                   onkeydown="javascript: return event.keyCode == 110 || event.keyCode == 69 ? false : true"--}}
{{--                                   class="form-control mobile" id="input_three" name="mobile"--}}
{{--                                   placeholder="شماره موبایل (نام کاربری)" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons ui-1_email-85"></i>--}}
{{--                            <input type="email" onkeyup='saveValue(this);' class="form-control userName"--}}
{{--                                   id="input_five" name="email"--}}
{{--                                   placeholder="پست الکترونیک" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons ui-1_lock-circle-open"></i>--}}
{{--                            <input type="password" class="form-control password" id="pass" name="password"--}}
{{--                                   placeholder="کلمه عبور" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <i class="now-ui-icons ui-1_lock-circle-open"></i>--}}
{{--                            <input type="password" class="form-control repatPassword" id="password-r"--}}
{{--                                   placeholder="تکرار کلمه عبور" value=""/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-1">--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="radio">--}}
{{--                                <input checked type="radio" name="type" data-id="0" id="0" value="0">--}}
{{--                                <label for="0">--}}
{{--                                    خانم--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-1">--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="radio">--}}
{{--                                <input type="radio" name="type" data-id="1" id="1" value="1">--}}
{{--                                <label for="1">--}}
{{--                                    آقا--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-4"></div>--}}

{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <button data-toggle="modal" data-target=""--}}
{{--                                    style="border-radius: 0px;width: 75px;height: 36px;font-size: 14px"--}}
{{--                                    type="button" class="btn btn-primary btnModal">--}}
{{--                                <i class="now-ui-icons objects_spaceship"></i>--}}
{{--                                ثبت نام--}}
{{--                            </button>--}}
{{--                            {{ csrf_field() }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </fieldset>--}}
{{--        </form>--}}
{{--    </div>--}}


{{--    <div class="container">--}}
{{--        <div class="modal fade" id="myModal" role="dialog">--}}
{{--            <div class="modal-dialog">--}}
{{--                <form action="{{route('user-register-cb')}}" method="post" enctype="multipart/form-data">--}}
{{--                    <div class="modal-content">--}}

{{--                        <div class="modal-header">--}}
{{--                            <h4 class="modal-title">اخطار</h4>--}}
{{--                            <hr/>--}}
{{--                            <br/>--}}
{{--                            <p>اطلاعات شما پس از تایید قابل ویرایش نمی باشد.</p>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <input class="nameInputP" type="hidden" value="" name="firstName">--}}
{{--                                    <p>نام : </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <p class="nameInput"></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <input class="lastnameInputP" type="hidden" value="" name="lastname">--}}
{{--                                    <p>نام خانوادگی : </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <p class="lastnameInput"></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <input class="mobileInputP" type="hidden" value="" name="mobile">--}}
{{--                                    <p>موبایل : </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <p class="mobileInput"></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <input class="emailInputP" type="hidden" value="" name="email">--}}
{{--                                    <p>ایمیل(نام کاربری) : </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <p class="emailInput"></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input class="passwordInputP" type="hidden" value="" name="password">--}}
{{--                            <input class="sexInputP" type="hidden" value="" name="sex">--}}
{{--                            <input class="reagentInputP" type="hidden" value="" name="reagent">--}}


{{--                            <div style="padding-top: 7px" class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="checkbox" style="margin-top: 15px;">--}}
{{--                                            <input type="checkbox" class="ok-m" name="ok" data-id="3" id="3"--}}
{{--                                                   value="option1">--}}
{{--                                            <label style="color: red;" for="3">--}}
{{--                                                قوانین و مقررات خواندم و قبول دارم<a data-toggle="modal"--}}
{{--                                                                                     data-target="#okmodal"--}}
{{--                                                                                     style="color: green;">(مطالعه--}}
{{--                                                    قوانین)</a>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="">--}}
{{--                                        <div data-callback="recaptchaCallback"--}}
{{--                                             data-expired-callback="recaptchaExpired" class="g-recaptcha"--}}
{{--                                             data-sitekey="6LfsAEUUAAAAAP9d3NGvxy8TCfjrPCALkKm0Lahg"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div style="direction: ltr" class="modal-footer">--}}
{{--                            <button type="submit" class="btn btn-success btnSend">ثبت--}}
{{--                                نام--}}
{{--                                نهایی--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-primary " data-dismiss="modal">ویرایش اطلاعات--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--    <div class="container">--}}
{{--        <div id="okmodal" class="modal fade" role="dialog">--}}
{{--            <div class="modal-dialog">--}}

{{--                <!-- Modal content-->--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title">قوانین و مقررات سایت</h4>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        @php $order = App\Club::first() @endphp--}}

{{--                        {!! $order->club !!}--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    @push("scripts")--}}
{{--        <script>--}}


{{--            function massageError() {--}}
{{--                var x = document.getElementById("snackbar");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}
{{--            function massageReapet() {--}}
{{--                var x = document.getElementById("snackbar-r");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}
{{--            function massageLow() {--}}
{{--                var x = document.getElementById("snackbar-L");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}
{{--            function massageE() {--}}
{{--                var x = document.getElementById("snackbar-e");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}
{{--            function massageEmail() {--}}
{{--                var x = document.getElementById("snackbar-email");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}
{{--            function massageEmails() {--}}
{{--                var x = document.getElementById("snackbar-emails");--}}
{{--                x.className = "show";--}}
{{--                setTimeout(function () {--}}
{{--                    x.className = x.className.replace("show", "");--}}
{{--                }, 3000);--}}
{{--            }--}}



{{--            var sex;--}}
{{--            $(document).ready(function () {--}}
{{--                var ok = 0;--}}
{{--                $('.ok-m').click(function () {--}}
{{--                    $('.btnSend').attr('disabled', false);--}}
{{--                    ok = 1;--}}
{{--                });--}}
{{--                $('.btnModal').click(function () {--}}


{{--                    var firstName = $('.firstName').val();--}}
{{--                    var lastName = $('.lastName').val();--}}
{{--                    var mobile = $('.mobile').val();--}}
{{--                    var userName = $('.userName').val();--}}
{{--                    var password = $('.password').val();--}}
{{--                    var repeatPassword = $('.repatPassword').val();--}}


{{--                    if (lastName == '' || mobile == '' || password == '') {--}}
{{--                        $('.btnModal').attr('data-target', '');--}}
{{--                        massageError();--}}
{{--                        return;--}}
{{--                    }--}}

{{--                    if (userName != '') {--}}
{{--                        if (isEmail(userName) == false) {--}}
{{--                            massageEmails();--}}
{{--                            return;--}}
{{--                        }--}}
{{--                    }--}}


{{--                    if ((mobile.charAt(0) + mobile.charAt(1)) != "09") {--}}
{{--                        alert("شماره موبایل نامعتبر است");--}}
{{--                        return;--}}
{{--                    }--}}


{{--                    if (password.length < 5) {--}}
{{--                        $('.btnModal').attr('data-target', '');--}}
{{--                        massageLow();--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    if (password != repeatPassword) {--}}
{{--                        $('.btnModal').attr('data-target', '');--}}
{{--                        massageReapet();--}}
{{--                        return;--}}
{{--                    }--}}
{{--                    $('.btnModal').attr('data-target', '#myModal');--}}

{{--                    $("input[name=type]:checked").each(function () {--}}
{{--                        sex = $(this).data('id');--}}
{{--                    });--}}


{{--                    var firstName = $('.firstName').val();--}}
{{--                    var lastName = $('.lastName').val();--}}
{{--                    var mobile = $('.mobile').val();--}}
{{--                    var nationalCode = $('.national-code').val();--}}
{{--                    var userName = $('.userName').val();--}}
{{--                    var password = $('.password').val();--}}
{{--                    var repeatPassword = $('.repatPassword').val();--}}
{{--                    var reagent = $('.reagent').val();--}}


{{--                    $('.ncodeInput').text(nationalCode);--}}
{{--                    $('.lastnameInput').text(lastName);--}}
{{--                    $('.nameInput').text(firstName);--}}
{{--                    $('.mobileInput').text(mobile);--}}
{{--                    $('.emailInput').text(userName);--}}


{{--                    $('.ncodeInputP').val(nationalCode);--}}
{{--                    $('.lastnameInputP').val(lastName);--}}
{{--                    $('.nameInputP').val(firstName);--}}
{{--                    $('.mobileInputP').val(mobile);--}}
{{--                    $('.emailInputP').val(userName);--}}
{{--                    $('.passwordInputP').val(password);--}}
{{--                    $('.sexInputP').val(sex);--}}
{{--                    $('.reagentInputP').val(reagent);--}}

{{--                });--}}
{{--            });--}}


{{--            function isEmail(email) {--}}
{{--                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;--}}
{{--                return regex.test(email);--}}
{{--            }--}}

{{--            function checkMelliCode(meli_code) {--}}
{{--                if (meli_code.length == 10) {--}}

{{--                    if (meli_code.length == 10) {--}}
{{--                        if (meli_code == '1111111111' ||--}}
{{--                            meli_code == '0000000000' ||--}}
{{--                            meli_code == '2222222222' ||--}}
{{--                            meli_code == '3333333333' ||--}}
{{--                            meli_code == '4444444444' ||--}}
{{--                            meli_code == '5555555555' ||--}}
{{--                            meli_code == '6666666666' ||--}}
{{--                            meli_code == '7777777777' ||--}}
{{--                            meli_code == '8888888888' ||--}}
{{--                            meli_code == '9999999999' ||--}}
{{--                            meli_code == '0123456789'--}}
{{--                        ) {--}}
{{--                            msg = 'كد ملي صحيح نمي باشد';--}}
{{--                            return false;--}}
{{--                        }--}}

{{--                        c = parseInt(meli_code.charAt(9));--}}
{{--                        n = parseInt(meli_code.charAt(0)) * 10 +--}}
{{--                            parseInt(meli_code.charAt(1)) * 9 +--}}
{{--                            parseInt(meli_code.charAt(2)) * 8 +--}}
{{--                            parseInt(meli_code.charAt(3)) * 7 +--}}
{{--                            parseInt(meli_code.charAt(4)) * 6 +--}}
{{--                            parseInt(meli_code.charAt(5)) * 5 +--}}
{{--                            parseInt(meli_code.charAt(6)) * 4 +--}}
{{--                            parseInt(meli_code.charAt(7)) * 3 +--}}
{{--                            parseInt(meli_code.charAt(8)) * 2;--}}
{{--                        r = n - parseInt(n / 11) * 11;--}}
{{--                        if ((r == 0 && r == c) || (r == 1 && c == 1) || (r > 1 && c == 11 - r)) {--}}
{{--                            return true;--}}
{{--                        }--}}
{{--                        else {--}}
{{--                            msg = 'كد ملي صحيح نمي باشد';--}}
{{--                            return true;--}}
{{--                        }--}}
{{--                    }--}}
{{--                    else {--}}
{{--                        msg = 'طول کد ملی وارد شده باید 10 کاراکتر باشد';--}}
{{--                        return false;--}}
{{--                    }--}}

{{--                }--}}
{{--            }--}}

{{--            // old value--}}

{{--            document.getElementById("input_one").value = getSavedValue("input_one");    // set the value to this input--}}
{{--            document.getElementById("input_two").value = getSavedValue("input_two");   // set the value to this input--}}
{{--            document.getElementById("input_three").value = getSavedValue("input_three");   // set the value to this input--}}
{{--            document.getElementById("input_four").value = getSavedValue("input_four");   // set the value to this input--}}
{{--            document.getElementById("input_five").value = getSavedValue("input_five");   // set the value to this input--}}
{{--            document.getElementById("input_six").value = getSavedValue("input_six");   // set the value to this input--}}
{{--            /* Here you can add more inputs to set value. if it's saved */--}}

{{--            //Save the value function - save it to localStorage as (ID, VALUE)--}}
{{--            function saveValue(e) {--}}
{{--                var id = e.id;  // get the sender's id to save it .--}}
{{--                var val = e.value; // get the value.--}}
{{--                localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .--}}
{{--            }--}}

{{--            //get the saved value function - return the value of "v" from localStorage.--}}
{{--            function getSavedValue(v) {--}}
{{--                if (localStorage.getItem(v) === null) {--}}
{{--                    return "";// You can change this to your defualt value.--}}
{{--                }--}}
{{--                return localStorage.getItem(v);--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endpush--}}
{{--@endsection--}}
{{--@endcomponent--}}
