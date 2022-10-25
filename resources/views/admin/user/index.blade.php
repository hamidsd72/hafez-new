@component('layouts.admin')
    @section('title') {{ $title }} @endsection
    @section('body')
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
            </div>
            <div class="row m-0">
                <div class="col-md-7">
                    <form class="form-inline p-2" action="{{ route('user_search') }}" method="get">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="search" placeholder="جستجوی نام کاربر">
                        <button type="submit" class="btn btn-primary mr-2">جستجو</button>
                        <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#createUser">ایجاد کاربر جدید</button>
                    </form>
                </div>
                {{-- <div class="col-md-3">
                    <button type="button" class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#myModal">
                        ارسال پیامک انبوه
                    </button>
                </div> --}}
                <div class="col-md-5"></div>
            </div>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">متن پیام را وارد نمایید</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id="sendMessage" action="{{ route('send-message') }}" method="post">
                                {{csrf_field()}}
                                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="message" class="form-label"><span style="color: red;">*</span>   محتوای محصول :</label>
                                            <textarea class="textarea ckeditor form-control" id="message" name="message" cols="30"
                                                      rows="10">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بیخیال</button>
                            <button type="button" class="btn btn-info" onclick="$('#sendMessage').submit()">ارسال</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="createUser">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ایجاد کاربر جدید</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form id="sendMessage" action="{{ route('admin-user-store') }}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                
                                <div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="form-label"><span style="color: red;" required>*</span>نام</label>
                                    <input type="text" name="name" class="form-control mb-2">
                                </div>
                                <div class="col-md-6 orm-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                    <label for="lname" class="form-label"><span style="color: red;" required>*</span>نام خانوادگی</label>
                                    <input type="text" name="lname" class="form-control mb-2">
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="form-label"><span style="color: red;" required>*</span>ایمیل</label>
                                    <input type="email" name="email" class="form-control mb-2">
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <label for="mobile" class="form-label"><span style="color: red;" required>*</span>موبایل</label>
                                    <input type="text" name="mobile" class="form-control mb-2">
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="form-label"><span style="color: red;" required>*</span>رمز عبور</label>
                                    <input type="password" name="password" class="form-control mb-2">
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                    <label for="confirm_password" class="form-label"><span style="color: red;">*</span>تکرار رمز عبور</label>
                                    <input type="password" name="confirm_password" class="form-control mb-2" required>
                                </div>

                                <div class="col-12">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                    <button type="submit" class="btn btn-info mr-2" >ثبت کاربر</button>
                                </div>
                                    
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="p-3">
                <table class="table table-data table-togglable table-bordered pull-right w-100">
                    <thead>
                    <tr>
                        {{-- <th data-toggle="true">رول</th> --}}
                        <th data-toggle="true">نام و نام خانوادگی</th>
                        <th data-toggle="true">تلفن</th>
                        <th data-toggle="true">ایمیل</th>
                        {{-- <th data-hide="phone">مسئولیت شعبه</th> --}}
                        <th data-hide="phone">رول</th>
                        <th data-hide="phone">تاریخ ثبت نام</th>
                        <th data-hide="phone">عملیات</th>
                        {{-- <th data-hide="phone">ویرایش</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $keys => $item)
                        <tr style="cursor: pointer">
                            <form action="{{ route('admin-assign-branch', $item->id) }}" method="post">
                                {{ @csrf_field() }}
                                <td>{{ $item->name . ' ' . $item->lname }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    {{$item->getRoleNames()->first()}}
                                    <div class="d-flex">
                                        <select class="form-control" name="branch_id" id="branch_id" required>
                                            <option value="کاربر" {{$item->getRoleNames()->first()=='کاربر' ? 'selected' : ''}}>کاربر</option>
                                            <option value="ادمین" {{$item->getRoleNames()->first()=='ادمین' ? 'selected' : ''}}>ادمین</option>
                                            <option value="ادمین ارشد" {{$item->getRoleNames()->first()=='ادمین ارشد' ? 'selected' : ''}}>ادمین ارشد</option>
                                        </select>
                                        <button type="submit" class=" mr-2" ><i style="font-size: 17px" class="far fa-edit"></i></button>
                                    </div>
                                </td>
                                <td>{{ my_jdate($item->created_at, 'Y/m/d H:i') }}</td>
                                {{-- <td class="table-td-icons text-center">
                                    <button type="submit" style="font-size: 10px;padding: 5px;" class="btn btn-info"
                                            title="اختصاص شعبه">اختصاص شعبه
                                    </button>
                                </td> --}}
                                @role('ادمین ارشد')
                                    <td class="text-center">
                                        <a class="ml-2" href="{{ route('admin-user-edit',$item->id) }}" title="ویرایش کاربر">
                                            <i style="font-size: 17px" class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('fast_login',$item->id) }}" title="ورود سریع">
                                            <i style="font-size: 17px" class="fas fa-sign-in-alt"></i>
                                        </a>
                                    </td>
                                @endrole
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <style>
                    .datatable-footer {
                        display: none;
                    }
                </style>
                <div class="row">
                    <div class="mx-auto">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
        @foreach($items as $keys =>$value)
            <div class="container">

                <div class="modal fade" id="myModal-{{$keys}}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        نام و نام خانوادگی :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->name . ' ' . $value->lname }}
                                    </div>
                                    <div class="col-sm-6">
                                        موبایل :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->mobile }}
                                    </div>
                                    <div class="col-sm-6">
                                        ایمیل :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->email }}
                                    </div>
                                    <div class="col-sm-6">
                                        کد ملی :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->ncode }}
                                    </div>
                                    <div class="col-sm-6">
                                        کد پستی :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->pcode }}
                                    </div>
                                    <div class="col-sm-6">
                                        تاریخ تولد :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->birthday }}
                                    </div>
                                    <div class="col-sm-6">
                                        آدرس :
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $value->address }}
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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
