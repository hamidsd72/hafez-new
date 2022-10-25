@component('layouts.admin')
    @section('title') {{ $title }} @endsection
    @section('body')
        <style>
            .bg-pink
            {
                display: inline-block!important;
            }
        </style>
        <div class="condition pull-right w-100 mb-2">
            <div class="title">
                <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
            </div>
            <div class="p-3">
                <a href="{{ route('admin-blog-create',$type) }}" class="btn btn-success mb-2"><i class="fa fa-plus ml-2"></i>افزودن {{$type=='news'?'خبر':'مقاله'}} </a>
                <table class="table table-bordered pull-right w-100">
                    <thead>
                    <tr>
                        <th data-toggle="true">عنوان</th>
                        <th data-toggle="true">بازدید</th>
                        <th data-toggle="true">نمایش/عدم نمایش</th>
                        <th data-toggle="true"> نمایش/عدم نمایش صفحه اصلی</th>
                        <th data-hide="phone">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->views()->count() }}</td>
                            <td>
                                @if($item->status=='active') <span class="text-success">نمایش</span> @else <span class="text-danger">عدم نمایش</span> @endif
                                    @if($item->status == 'pending')
                                        <a href="{{route('admin-blog-active',['status',$item->id])}}" title="نمایش در سایت" style="margin-right: 10px"><i class="fa fa-check"
                                                                                                                             style="color: darkgreen;"></i></a>
                                    @endif
                                    @if($item->status == 'active')
                                        <a href="{{route('admin-blog-active',['status',$item->id])}}"
                                           title="عدم نمایش در سایت" style="margin-right: 10px"><i class="fa fa-close"
                                                                        style="color: red;"></i></a>
                                    @endif
                            </td>
                            <td>
                                @if($item->status_home=='active') <span class="text-success">نمایش</span> @else <span class="text-danger">عدم نمایش</span> @endif
                                @if($item->status_home == 'pending')
                                    <a href="{{route('admin-blog-active',['status_home',$item->id])}}" title="نمایش در صفحه اصلی" style="margin-right: 10px"><i class="fa fa-check"
                                                                                                                         style="color: darkgreen;"></i></a>
                                @endif
                                @if($item->status_home == 'active')
                                    <a href="{{route('admin-blog-active',['status_home',$item->id])}}"
                                       title="عدم نمایش در صفحه اصلی" style="margin-right: 10px"><i class="fa fa-close"
                                                                    style="color: red;"></i></a>
                                @endif
                            </td>
                            <td class="table-td-icons" style="display: flex;justify-content: center;align-items: center;min-height: 80px">
                                <a href="{{ route('admin-blog-edit', $item->id) }}" title="ویرایش"><i
                                            class="far fa-edit"></i></a>

                                @role('ادمین ارشد')
                                <a href="{{route('admin-blog-destroy',$item->id)}}" title="حذف"  onclick="return confirm('برای حذف مطمئن هستید؟')"><i
                                            class="fa fa-trash" style="color: red;"></i></a>
                                @endrole

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            let i=$('.fa-pencil');
            i.removeClass();
            i.addClass('far fa-edit');
        </script>
    @endpush
@endcomponent
