@component('layouts.admin')
    @section('title') @endsection
    @section('body')

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
                        @foreach(auth()->user()->ip()->get() as $item)
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
