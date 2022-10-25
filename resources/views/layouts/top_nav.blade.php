<nav class="top-nav navbar ">
    <div class="container">
        <div class="navbar-left">
            <div class="notify pull-left">
                <li class="dropdown-toggle" id="notify" data-toggle="dropdown"><i class="icon-brain text-grey-400"></i></li>
                <ul class="notify-menu dropdown-menu" role="notify" aria-labelledby="notify">
                    <div class="notify-content-heading pull-right w-100">آخرین فعالیت ها
                        <i class="icon-stats-bars2 pull-left text-grey-300"></i>
                    </div>
                    @foreach($activities as $item)
                        <li class="notify-media">
                            @if($item->type == 'store')
                                <div class="notify-media-right">
                                    <span class="notify-icon-add pull-right w-100"><i class="fa fa-plus"></i></span>
                                </div>
                            @elseif($item->type == 'update')
                                <div class="notify-media-right">
                                    <span class="notify-icon-edit pull-right w-100"><i class="fa fa-edit"></i></span>
                                </div>
                            @elseif($item->type == 'delete')
                                <div class="notify-media-right">
                                    <span class="notify-icon-remove pull-right w-100"><i
                                            class="fa fa-remove"></i></span>
                                </div>
                            @endif
                            <div class="notify-media-body">
                                <a href="javascript:void(0)" class="media-heading">
                                    <span class="text-semibold text-grey-600">{{ $item->user->name }}</span>
                                    <span
                                        class="media-annotation pull-left">{{ my_jdate($item->created_at, 'Y/m/d H:i') }}</span>
                                </a>
                                <span class="text-muted">{{ $item->text }}...</span>
                            </div>
                        </li>
                    @endforeach
                    @if(count($activities)<=0)
                        <li class="notify-media">
                            <div class="notify-media-right">
                                <span class="notify-icon-none pull-right w-100"><i
                                        class="fa fa-remove text-grey-300"></i></span>
                            </div>
                            <div class="notify-media-body">
                                <a href="javascript:void(0)" class="media-heading">
                                    <span class="text-semibold text-grey-600">فعالیتی وجود ندارد</span>
                                    <span class="media-annotation pull-left">{{ date('H:i') }}</span>
                                </a>
                                <span class="text-muted">فعالیتی برای نمایش وجود ندارد...</span>
                            </div>
                        </li>
                    @endif
                    <div class="notify-content-footer pull-right w-100">
                        <a href="{{ route('admin-activities') }}" data-popup="tooltip"
                           title="تمام پیام ها"><i
                                class="icon-menu display-block"></i></a>
                    </div>
                </ul>
            </div>
        </div>
        <div class="navbar-right" data-direction="rtl">
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" id="user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_circle-08 ml-2"></i>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="user">
                    <a href="{{route('user.index')}}" class="dropdown-item">صفحه اصلی سایت</a>
                    <a href="{{ route('change-pass')}}" class="dropdown-item">تغییر رمز عبور</a>
                    <a href="{{ route('user_show_ip')}}" class="dropdown-item">مدیریت نشست ها</a>
                    <a href="javascript:void(0)" class="dropdown-item" onclick="$('.logout').submit()">خروج</a>
                    <form action="{{ url('logout') }}" method="POST" class="logout hidden">{{ csrf_field() }}</form>
                </div>
            </div>
        </div>
    </div>
</nav>


@if (session()->has('status'))
    <div class="alert alert-secondary alert-dismissible fade show m-0 p-1 bg-{{ session('status') }}" role="alert">
        <p class="text-dark text-center m-0">{!! session()->get('message') !!}</p>
    </div>
    <script>
        setTimeout(function() { $(".alert").alert('close') }, 5000);
    </script>
@endif