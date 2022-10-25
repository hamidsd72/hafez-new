@component('layouts.admin')
    @section('title') ویرایش کاربر @endsection
    @section('body')
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>ویرایش کاربر</h5>
            </div>
            <div class="container">
                <form class="w-100" action="{{ route('admin-user-update',$user->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <label class="my-3" for="name">نام :</label>
                            <input type="text" class="form-control" placeholder="نام" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="my-3" for="lname">نام خانوادگی :</label>
                            <input type="text" class="form-control" placeholder="فامیلی" name="lname" value="{{ $user->lname }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="my-3" for="email">ایمیل :</label>
                            <input type="email" class="form-control" placeholder="فامیلی" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="my-3" for="mobile">شماره موبایل :</label>
                            <input type="number" class="form-control" placeholder="شماره موبایل" name="mobile" value="{{ $user->mobile }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="my-3" for="password">تغییر رمز عبور</label>
                            <input type="password" class="form-control" placeholder="گذرواژه" name="password">
                        </div>
                        <div class="col-md-6">
                            <label class="my-3" for="score">امتیاز (تغییر امتیاز)</label>
                            <input type="number" value="{{ $user->score }}" class="form-control" placeholder="امتیاز" name="score">
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-info pull-left">ویرایش</button>
                            <a href="{{ route('admin-home') }}" class="btn btn-default pull-left ml-2"><i class="fa fa-remove ml-2"></i>انصراف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>لیست آی پی های کاربر</h5>
            </div>
            <div class="container">
                <table class="table table-data table-togglable table-bordered pull-right w-100">
                    <thead>
                    <tr>
                        <th data-toggle="true">ای پی</th>
                        <th data-toggle="true">وضعیت</th>
                        <th data-hide="phone">نوع سیستم عامل</th>
                        <th data-hide="phone">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->ip()->get() as $item)
                            <tr style="cursor: pointer">
                                <form action="{{ route('user_edit_ip') }}" method="post">
                                    {{ @csrf_field() }}
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <td>{{ $item->ip }}</td>
                                    <td>
                                        {{$item->status=='pending'?'در انتظار تایید':''}}
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="active" {{$item->status=='active' ? 'selected' : ''}}>active</option>
                                            <option value="block" {{$item->status=='block' ? 'selected' : ''}}>block</option>
                                        </select>
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    @role('ادمین ارشد')
                                        <td class="text-center">
                                            <button type="submit"><i style="font-size: 17px" class="far fa-edit"></i></button>
                                        </td>
                                    @endrole
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
@endcomponent
