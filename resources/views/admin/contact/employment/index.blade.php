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
                <table class="table table-data table-togglable table-bordered pull-right w-100">
                    <thead>
                    <tr>
                        <th data-toggle="true">نام نام خانوادگی</th>
                        <th data-hide="phone">ایمیل</th>
                        <th data-hide="phone">موبایل</th>
                        <th data-hide="phone">نوع همکاری</th>
                        <th data-hide="phone">شغل</th>
                        <th data-hide="phone">آشنایی</th>
                        <th data-hide="phone">خلاصه من</th>
                        <th data-hide="phone">رزومه</th>
                        <th data-hide="phone">تاریخ ثبت</th>
{{--                        <th data-hide="phone">زبان سایت</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }} @if($item->see == 0) <span style="color: red;">(جدید)</span>@endif</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->employ_type }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->employ_know }}</td>
                            <td>  <a href="javascript:void(0)" data-toggle="popover" data-placement="left" data-content="{{ $item->short_text }}"><i class="fa fa-eye ml-2"></i>مشاهده</a></td>
                            <td>
                                @if(is_file($item->file))
                                    <a href="{{url($item->file)}}" download>دانلود</a>
                                @else
                                    ندارد
                                @endif
                            </td>
                            <td>{{ my_jdate($item->created_at, 'Y/m/d') }}</td>
{{--                            <td>{{ $item->lang=='fa'?'فارسی':'انگلیسی' }}</td>--}}
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
