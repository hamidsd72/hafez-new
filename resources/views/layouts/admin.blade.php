<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="Shortcut Icon" type="image/x-icon" href="{{ url($setting->icon) }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.layout.min.css') }}"/>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/css/uikit.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('selectize/css.css')}}">
    <link rel="stylesheet" href="{{ asset('css/some-font.css') }}">

    <style>
         nav[aria-label="Pagination Navigation"]>div:first-child,
         nav[aria-label="Pagination Navigation"]>div>div:first-child
        {
            display: none!important;
        }
        .tab_box .tab-content
        {
            background: rgba(0,0,0,0.01);
            border: 1px solid rgba(0,0,0,0.3);
        }
        .d-ltr
        {
            direction: ltr!important;
            text-align: left!important;
        }
        .d-rtl
        {
            direction: rtl!important;
            text-align: right!important;
        }
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            text-align: right!important;
        }
        ::-moz-placeholder { /* Firefox 19+ */
            text-align: right!important;
        }
        :-ms-input-placeholder { /* IE 10+ */
            text-align: right!important;
        }
        :-moz-placeholder { /* Firefox 18- */
            text-align: right!important;
        }
        svg:not(:root){
            transform: rotate(180deg);
        }
        .hidden {
            display: block;
        }
        svg{
            width: 30px;
        }
        .box::before {
            background: transparent;
        }
        #accordion {
            border: 1px solid lightgray;
            border-radius: 3px;
        }
        #accordion  .card {
            border: none;
        }
        #accordion .card-header {
            background-color: transparent;
        }
        #accordion .btn-link {
            color: #464a4c;
            font-size: 14px;
        }
        #accordion .border-light {
            border: 1px solid lightgray;
        }
        #accordion .card-body a {
            margin: auto 16px;
        }
        #accordion .card-body a .active {
            color: tomato;
        }
        .border-none {
            border: none;
        }
    </style>
    @yield('stylesheets')


    <script>
        !function (t, e, n) {
            t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {
                t[n].q.push(arguments)
            }, t[n].q = t[n].q || [];
            var a = new Date,
                r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),
                c = e.getElementsByTagName("script")[0], s = e.createElement("script");
            s.id = "ua-script-yn-2165-adv";
            s.dataset.analyticsobject = n;
            s.async = 1;
            s.type = "text/javascript";
            s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v2/yn-2165-adv/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)
        }(window, document, "yektanet");
    </script>
</head>
<body>

@include('layouts.top_nav')

<div class="content pull-right w-100">
    <div class="container" data-direction="rtl">

        <h6 class="mb-3">
            ادمین / 
            @switch(\Request::route()->getName())
                @case('admin-home')
                    آخرین فعالیت ها
                    @break
                @case('admin-blog-list')
                    بلاگ / اخبار و مجله حافظ
                    @break
                @case('admin-article-comment-list')
                    بلاگ / نظرات اخبار و مجله حافظ
                    @break
                @case('admin-contact-list')
                    فرم ها / تماس با ما
                    @break
                @case('admin.employment.list')
                    فرم ها / استخدام
                    @break
                @case('admin-slider-list')
                    طراحی صفحات / اسلایدر ها
                    @break
                @case('admin-about-edit')
                    طراحی صفحات / درباره ما / اطلاعات صفحه درباره حافظ
                    @break
                @case('admin-about-team-list')
                    طراحی صفحات / درباره ما / سرمایه های انسانی
                    @break
                @case('admin-about-bank-list')
                    طراحی صفحات / درباره ما / شماره حساب بانک ها
                    @break
                @case('admin-about-feature-list')
                    طراحی صفحات / درباره ما / دستاوردهای ما
                    @break
                @case('admin-about-branch-list')
                    طراحی صفحات / اطلاعات شعب کارگزاری
                    @break
                @case('admin-faq-cat-list')
                    طراحی صفحات / سوالات متداول / دسته پرسش و پاسخ
                    @break
                @case('admin-faq-list')
                    طراحی صفحات / سوالات متداول / پرسش و پاسخ ها
                    @break
                @case('admin.employment.page.edit')
                    طراحی صفحات / فرصت های شغلی / ویرایش صفحه فرم استخدامی
                    @break
                @case('admin.employment.page.list')
                    طراحی صفحات / فرصت های شغلی / ویرایش صفحه داخلی فرم استخدامی
                    @break
                @case('admin-menu-information.index')
                    طراحی صفحات / محتوا / محتوای داخلی صفحات
                    @break
                @case('admin_show_certificate')
                    طراحی صفحات / محتوا / گواهی نامه ها
                    @break
                @case('admin-menu-list')
                    طراحی صفحات / محتوا / صفحات داینامیک
                    @break
                @case('admin-headers-links.index')
                    طراحی صفحات / محتوا / لینک های تصاویر هدر
                    @break
                @case('admin-contact-info-edit')
                    طراحی صفحات / محتوا / ویرایش اطلاعات تماس با ما
                    @break
                @case('admin-partner-list')
                    طراحی صفحات / محتوا / همکاران ما
                    @break
                @case('admin-setting-edit')
                    تنظیمات / ویرایش تنظیمات سایت
                    @break
                @case('admin-user-list')
                    تنظیمات / لیست کاربران
                    @break
                {{-- @case('')
                    تنظیمات / گروه های کاربری
                    @break --}}
                @case('meta-list')
                    تنظیمات / متاهای سایت
                    @break
                @break @case('admin-activities')
                    تنظیمات / لیست تمام فعالیت ها
                    @break
                @default
                عملیات کراد
            @endswitch
        </h6>

        <div class="row">
            {{-- @role('ادمین ارشد') --}}
                <div class="col-lg-3">
                    @include('layouts.right_nav')
                </div>
                <div class="col-lg-9">
                    @yield('body')
                </div>
            {{-- @endrole --}}
        </div>
    </div>
</div>
<footer class="footer pull-right w-100" data-direction="rtl">
    <div class="container">
        @php require_once 'jdf.php'; @endphp
        <p class="pull-right text-grey-300">کارگزاری حافظ</p>
        <p class="pull-left text-grey-300">کپی رایت �    {{ jdate('Y') }} |
            طراحی و اجرا توسط  <a
                href="http://adib-it.com/"
                target="_blank"
                rel="follow">تیم توسعه
                ادیب گستر عصر نوین</a>

            ، تمامی حقوق محفوظ
            است.</p>
    </div>
</footer>
{{-- @if (session('status'))
    <div class="bg-alert animated fadeIn">
        <div class="alert-popup animated fadeInDown bg-{{ session('status') }}">
            <span class="pull-right text-size-base">{{ session('message') }}</span>
            <button class="alert-close pull-left">×</button>
        </div>
    </div>
@endif --}}
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="{{ asset('selectize/js.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/admin.layout.min.js') }}"></script>

<script>
    $(".key_word").selectize({
        delimiter: ",",
        plugins: {
            remove_button: {
                label: "×"
            }
        },
        persist: false,
        createOnBlur: true,
        create: true,
        copyClassesToDropdown:false
    });

    $('#s1').toggle();
    $('#s2').toggle();
    // $('#s3').toggle();
    // $('#s4').toggle();
    // $('#s5').toggle();
    // $('#s6').toggle();
    $('#s7').toggle();
    $('#s8').toggle();
    $('#s9').toggle();
    $('#s12').toggle();

    $('#b1').click(function () {
        $('#s1').toggle();
    })
    $('#b2').click(function () {
        $('#s2').toggle();
    })
    $('#b3').click(function () {
        $('#s3').toggle();
    })
    $('#b33').click(function () {
        $('#s33').toggle();
    })
    $('#b4').click(function () {
        $('#s4').toggle();
    })
    $('#b5').click(function () {
        $('#s5').toggle();
    })
    $('#b6').click(function () {
        $('#s6').toggle();
    })
    $('#b7').click(function () {
        $('#s7').toggle();
    })
    $('#b8').click(function () {
        $('#s8').toggle();
    });
    $('#b9').click(function () {
        $('#s9').toggle();
    });
    $('#b10').click(function () {
        $('#s10').toggle();
    });
    $('#b11').click(function () {
        $('#s11').toggle();
    });
    $('#b12').click(function () {
        $('#s12').toggle();
    });

</script>
<script>
        {{-- edit --}}
    let i = $('.fa-pencil');
    i.removeClass();
    i.addClass('far fa-edit');

    // delete
    let j = $('.fa-trash-o');
    j.removeClass();
    j.addClass('fa fa-trash');

    // reply
    let k = $('.fa-mail-reply');
    k.removeClass();
    k.addClass('fas fa-reply');
</script>
<script>
    $('.sidebar-title').click(function () {
        $(this).parent().find('.list-group-item-action').toggleClass('d-block');
    })
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@stack('scripts')
</body>
</html>
