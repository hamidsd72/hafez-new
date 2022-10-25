@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <div class="p-3">
            <a href="{{ route('meta-create') }}" class="btn btn-success mb-2"><i class="fa fa-plus ml-2"></i>افزودن</a>
            <form action="{{route('meta-list')}}" method="get" class="mt-3 mb-3">
                {{csrf_field()}}
                <input type="text" name="search" placeholder="جستجو کن ..." class="form-control">
            </form>
            <table class="table  table-togglable table-bordered pull-right w-100">
                <thead>
                <tr>
                    <th data-toggle="true">شماره</th>
                    <th data-toggle="true">عنوان</th>
                    <th data-hide="phone">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a target="_blank" href="{!! $item->name_page !!}">{{$item->title_page}}</a></td>

                        <td class="table-td-icons">
                            <a href="{{ route('meta-edit', $item->id) }}" title="ویرایش"><i
                                    class="far fa-edit"></i></a>
                            <a href="javascript:void(0)" onclick="$(this).find('form').submit();" title="حذف">
                                <form action="{{ route('meta-destroy', $item->id) }}" method="POST"
                                      class="hidden">{{ csrf_field() }}</form>
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        {{$items->links()}}

    </div>
@endsection
@endcomponent
