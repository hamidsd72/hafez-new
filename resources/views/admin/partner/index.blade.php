@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <div class="p-3">
            <a href="{{ route('admin-partner-create') }}" class="btn btn-success mb-2"><i
                        class="fa fa-plus ml-2"></i>افزودن همکار</a>
            <table class="table  table-bordered pull-right w-100">
                <thead>
                <tr>
                    <th data-toggle="true">نام</th>
                    <th data-toggle="true">تصویر</th>
                    <th data-toggle="true">لینک</th>
                    <th data-hide="phone">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{url($item->photo->path)}}" style="height: 100px"></td>
                        @if($item->link)
                        <td class="text-left"><a href="{{$item->link}}" dir="ltr">{{$item->link}}</a></td>
                        @else
                            <td>بدون لینک</td>
                        @endif
                        <td class="table-td-icons"
                            style="display: flex;justify-content: center;align-items: center;min-height: 80px">
                            <a href="{{ route('admin-partner-edit', $item->id) }}" title="ویرایش"><i
                                        class="far fa-edit"></i></a>
                            @role('ادمین ارشد')
                            <a href="{{route('admin-partner-destroy',$item->id)}}" title="حذف"><i
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
        $(".modal_btn").click(function () {
            var id = $(this).attr("id");
            $(".id").val(id);
        })
    </script>
@endpush
@endcomponent
