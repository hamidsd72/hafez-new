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
            <form action="{{route('admin-about-team-title-update')}}" method="post" class="box">
                @csrf
                <div class="form-group{{ $errors->has('title_team') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title_team" class="form-label">* عنوان :</label>
                            <input type="text" class="form-control" id="title_team" name="title_team"
                                   value="{{ $about->title_team }}"
                                   required/>
                            @if ($errors->has('title_team'))
                                <span class="help-block"><strong>{{ $errors->first('title_team') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('text_team') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="text_team" class="form-label">متن :</label>
                            <input type="text" class="form-control" id="text_team" name="text_team"
                                   value="{{ $about->text_team }}"
                            />
                            @if ($errors->has('text_team'))
                                <span class="help-block"><strong>{{ $errors->first('text_team') }}</strong></span>
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
            <a href="{{ route('admin-about-team-create') }}" class="btn btn-success mb-2"><i
                        class="fa fa-plus ml-2"></i>افزودن</a>
            <table class="table-data table-togglable table-bordered pull-right w-100">
                <thead>
                <tr>
                    <th data-toggle="true">نمایش در دسته</th>
                    <th data-toggle="true">نام</th>
                    <th data-toggle="true">سمت شغلی</th>
                    <th data-toggle="true">تصویر</th>
                    <th data-toggle="true">نمایش/عدم نمایش</th>
                    <th data-hide="phone">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>
                            @switch($item->type)
                                @case(1)
                                    دسته اول
                                    @break
                                @case(2)
                                    دسته دوم
                                    @break
                                @case(3)
                                    دسته سوم
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->job }}</td>
                        <td>
                            @if($item->pic)
                                <img src="{{url($item->pic)}}" style="height: 80px">
                            @else
                                بدون تصویر
                            @endif
                        </td>
                        <td>
                            @if($item->status=='active') <span class="text-success">نمایش</span> @else <span
                                    class="text-danger">عدم نمایش</span> @endif
                            @if($item->status == 'pending')
                                <a href="{{route('admin-about-team-active',['status',$item->id])}}"
                                   title="نمایش در سایت" style="margin-right: 10px"><i class="fa fa-check"
                                                                                       style="color: darkgreen;"></i></a>
                            @endif
                            @if($item->status == 'active')
                                <a href="{{route('admin-about-team-active',['status',$item->id])}}"
                                   title="عدم نمایش در سایت" style="margin-right: 10px"><i class="fa fa-close"
                                                                                           style="color: red;"></i></a>
                            @endif
                        </td>
                        <td class="table-td-icons"
                            style="display: flex;justify-content: center;align-items: center;min-height: 80px">
                            <a href="{{ route('admin-about-team-edit', $item->id) }}" title="ویرایش"><i
                                        class="far fa-edit"></i></a>

                            @role('ادمین ارشد')
                            <a href="{{route('admin-about-team-destroy',$item->id)}}" title="حذف"  onclick="return confirm('برای حذف مطمئن هستید؟')"><i
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
