@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <div class="p-3">
            <a href="{{ route('admin-headers-links.create') }}" class="btn btn-success mb-2"><i class="fa fa-plus ml-2"></i>افزودن لینک</a>
            <table class="table table-bordered pull-right w-100">
                <thead>
                    <tr>
                        <th data-hide="phone">صفحه</th>
                        <th data-toggle="true">عنوان لینک</th>
                        <th data-hide="phone">آدرس url</th>
                        <th data-hide="phone">مرتب سازی</th>
                        <th data-toggle="true">نمایش/عدم نمایش </th>
                        <th data-hide="phone">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $menus->find($item->menu_id)->name }}</td>
                            <td>{{ $item->label }}</td>
                            <td class="d-ltr"><a href="{{$item->link}}" target="_blank">{{substr($item->link,0,20)}}</a> </td>
                            <td>
                                <form method="post" action="{{route('admin-headers-links.update',$item->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    <input style="width: 100px" class="text-center" name="sort" type="number" min="0" value="{{$item->sort}}" onchange="return this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin-headers-links.update',$item->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    @if($item->status=='active')
                                        <input name="status" type="hidden" value="pending">
                                        <span class="text-success">نمایش
                                            <i class="fa fa-check" style="color: darkgreen;"></i>
                                        </span>
                                    @else
                                        <input name="status" type="hidden" value="active">
                                        <span class="text-danger">عدم نمایش
                                            <i class="fa fa-close" style="color: red;"></i>
                                        </span>
                                    @endif
                                    <br>
                                    <button type="submit" style="background: transparent;border: 1px solid gray;border-radius: 3px;">تغییر وضعیت</button>
                                </form>
                            </td>
                            <td class="table-td-icons" style="display: flex;justify-content: center;align-items: center;min-height: 80px">
                                <a href="{{ route('admin-headers-links.edit', $item->id) }}"  title="ویرایش"><i class="far fa-edit"></i></a>
                                @role('ادمین ارشد')
                                    <form method="post" action="{{route('admin-headers-links.destroy',$item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-2" style="background: transparent;border: 1px solid gray;border-radius: 3px;">
                                            <i class="fa fa-trash" style="color: red;"></i>
                                        </button>
                                    </form>
                                @endrole
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $items->appends(request()->query())->links() }}
    </div>
@endsection
@push('scripts')
@endpush
@endcomponent
