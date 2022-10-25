@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <style>
        .hide-for-excel{
            display: none !important;
        }
    </style>
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <div class="p-3">
            <a href="{{ route('admin.employment.page.add') }}" class="btn btn-success mb-2"><i class="fa fa-plus ml-2"></i>افزودن یک ردیف </a>
            <table class="table table-data table-togglable table-bordered pull-right w-100">
                <thead>
                <tr>
                    <th data-toggle="true">عنوان صفحه</th>
                    <th data-toggle="true">عنوان لینک</th>
                    <th data-hide="phone">وضعیت لینک</th>
                    <th data-hide="phone">وضعیت تصویر</th>
                    <th data-hide="phone">وضعیت زبان انگلیسی</th>
                    <th data-hide="phone">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->title_link }}</td>
                        <td>
                            @if($item->status_link=='active') <span class="text-success">نمایش</span> @else <span class="text-danger">عدم نمایش</span> @endif
                            @if($item->status_link == 'pending')
                                <a href="{{route('admin.employment.page.status',['status_link',$item->id])}}" title="نمایش" style="margin-right: 10px"><i class="fa fa-check"
                                                                                                                                                  style="color: darkgreen;"></i></a>
                            @endif
                            @if($item->status_link == 'active')
                                <a href="{{route('admin.employment.page.status',['status_link',$item->id])}}"
                                   title="عدم نمایش" style="margin-right: 10px"><i class="fa fa-close"
                                                                                           style="color: red;"></i></a>
                            @endif
                        </td>
                        <td>
                            @if($item->status_pic=='active') <span class="text-success">نمایش</span> @else <span class="text-danger">عدم نمایش</span> @endif
                            @if($item->status_pic == 'pending')
                                <a href="{{route('admin.employment.page.status',['status_pic',$item->id])}}" title="نمایش" style="margin-right: 10px"><i class="fa fa-check"
                                                                                                                                                    style="color: darkgreen;"></i></a>
                            @endif
                            @if($item->status_pic == 'active')
                                <a href="{{route('admin.employment.page.status',['status_pic',$item->id])}}"
                                   title="عدم نمایش" style="margin-right: 10px"><i class="fa fa-close"
                                                                                   style="color: red;"></i></a>
                            @endif
                        </td>
                        <td>
                            @if($item->status_en=='active') <span class="text-success">نمایش</span> @else <span class="text-danger">عدم نمایش</span> @endif
                            @if($item->status_en == 'pending')
                                <a href="{{route('admin.employment.page.status',['status_en',$item->id])}}" title="نمایش" style="margin-right: 10px"><i class="fa fa-check"
                                                                                                                                                          style="color: darkgreen;"></i></a>
                            @endif
                            @if($item->status_en == 'active')
                                <a href="{{route('admin.employment.page.status',['status_en',$item->id])}}"
                                   title="عدم نمایش" style="margin-right: 10px"><i class="fa fa-close" style="color: red;"></i></a>
                            @endif
                        </td>
                        <td>
                            <a class="mx-2" href="{{ route('admin.employment.page.edit', $item->id) }}" title="ویرایش"><i class="far fa-edit"></i></a>
                            <a class="mx-2" href="{{ route('admin.employment.page.destroy', $item->id) }}" title="حذف"  onclick="return confirm('برای حذف مطمئن هستید؟')"><i class="fa fa-trash" style="color: red;"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <?php
    $contacts = App\Employment::where('see',0)->get();
    foreach ($contacts as $contact){
        $contact->see = 1;
        $contact->save();
    }
    ?>
@endsection
@endcomponent
