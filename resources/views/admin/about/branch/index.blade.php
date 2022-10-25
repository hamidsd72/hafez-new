@component('layouts.admin')
@section('title') {{ $title }} @endsection
@section('body')
    <style>
        .bg-pink {
            display: inline-block !important;
        }
    </style>
    <div class="condition pull-right w-100 mb-2">
        <div class="title">
            <h5><i class="fa fa-trello text-size-large ml-2"></i>{{ $title }}</h5>
        </div>
        <div class="container-fluid">
            <form action="{{route('admin-about-branch-title-update')}}" method="post" class="box">
                @csrf
                <div class="form-group{{ $errors->has('title_branch') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title_branch" class="form-label">* عنوان :</label>
                            <input type="text" class="form-control" id="title_branch" name="title_branch"
                                   value="{{ $about->title_branch }}"
                                   required/>
                            @if ($errors->has('title_bank'))
                                <span class="help-block"><strong>{{ $errors->first('title_branch') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('text_branch') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="text_branch" class="form-label">متن :</label>
                            <input type="text" class="form-control" id="text_branch" name="text_branch"
                                   value="{{ $about->text_branch }}"
                                   />
                            @if ($errors->has('text_branch'))
                                <span class="help-block"><strong>{{ $errors->first('text_branch') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success pull-left mr-2"><i
                                        class="fa fa-check ml-2"></i>ثبت شود
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-3">
            <a href="{{ route('admin-about-branch-create') }}" class="btn btn-success mb-2"><i
                        class="fa fa-plus ml-2"></i>افزودن</a>
            <table class="table-data table-togglable table-bordered pull-right w-100">
                <thead>
                <tr>
                    {{-- <th data-toggle="true">id</th> --}}
                    <th data-toggle="true">شعبه</th>
                    <th data-toggle="true">استان،شهر</th>
                    <th data-toggle="true">استان جهت یافتن روی نقشه</th>
                    <th data-toggle="true">شماره تماس</th>
                    <th data-toggle="true">نمایش/عدم نمایش</th>
                    <th data-hide="phone">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->province?$item->province:'!!قابل یافتن از روی نقشه نخواهد بود!!'}}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            @if($item->status=='active') <span class="text-success">نمایش</span> @else <span
                                    class="text-danger">عدم نمایش</span> @endif
                            @if($item->status == 'pending')
                                <a href="{{route('admin-about-branch-active',['status',$item->id])}}"
                                   title="نمایش در سایت" style="margin-right: 10px"><i class="fa fa-check"
                                                                                       style="color: darkgreen;"></i></a>
                            @endif
                            @if($item->status == 'active')
                                <a href="{{route('admin-about-branch-active',['status',$item->id])}}"
                                   title="عدم نمایش در سایت" style="margin-right: 10px"><i class="fa fa-close"
                                                                                           style="color: red;"></i></a>
                            @endif
                        </td>
                        <td class="table-td-icons"
                            style="display: flex;justify-content: center;align-items: center;min-height: 80px">
                            <a href="{{ route('admin-about-branch-edit', $item->id) }}" title="ویرایش"><i
                                        class="far fa-edit"></i></a>

                            @role('ادمین ارشد')
                            <a href="{{route('admin-about-branch-destroy',$item->id)}}" title="حذف"  onclick="return confirm('برای حذف مطمئن هستید؟')"><i
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
        let i = $('.fa-pencil');
        i.removeClass();
        i.addClass('far fa-edit');
    </script>
@endpush
@endcomponent
