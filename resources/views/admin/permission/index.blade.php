@component('layouts.admin')
    @section('title')
        {{ $title }}
    @endsection
    @section('body')
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
            </div>
            <div class="p-3">
                <table class="table table-data table-togglable table-bordered pull-right w-100">
                    <h6>لیست رول های مجاز (از لیست کپی کنید)</h6>
                    <ul class="my-0 mx-4">
                        <li class="my-1">بلاگ => دسترسی به بلاگ و اخبار و نظرات</li>
                        <li class="my-1">فرم => دسترسی به فرم های تماس و استخدام</li>
                        <li class="my-1">طراحی => دسترسی به بخش های طراحی صفحات</li>
                        <li class="my-1">تنظیمات => دسترسی به بخش تنظیمات</li>
                        <li class="my-1">گزارش => دسترسی به گزارشات</li>
                        <li class="my-1 text-danger">همه => دسترسی کامل (توصیه نمیشود)</li>
                    </ul>
                    <thead>
                        <tr>
                            <th data-toggle="true">نوع رول</th>
                            <th data-hide="phone">دسترسی ها</th>
                            <th data-hide="phone">عملیات</th>
                        </tr>
                    </thead>
                    @foreach ($items as $item)
                        <tbody>
                            <form action="{{route('permissions.update',$item->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <th>{{$item->role_name}}</th>
                                <th>
                                    <input type="text" class="form-control key_word" id="access" name="access"  value="{{ $item->access }}">
                                </th>
                                <th>
                                    @unless ($item->role_name=='ادمین ارشد')
                                        <button type="submit" class="btn">ویرایش</button>
                                    @endunless
                                </th>
                            </form>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div> 
    @endsection
@endcomponent
