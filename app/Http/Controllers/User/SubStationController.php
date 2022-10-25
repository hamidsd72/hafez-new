<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Models\AboutBranch;
class SubStationController extends Controller
{
    public function index()
    {
        function fa_number($number) {
            $arr = array();
            for ($i=0; $i < strlen($number); $i++) { 
                switch ($number) {
                    case $number[$i] == "0":
                        array_push($arr, "۰" );
                    break;
                    case $number[$i] == "1":
                        array_push($arr, "۱" );
                    break;
                    case $number[$i] == "2":
                        array_push($arr, "۲" );
                    break;
                    case $number[$i] == "3":
                        array_push($arr, "۳" );
                    break;
                    case $number[$i] == "4":
                        array_push($arr, "۴" );
                    break;
                    case $number[$i] == "5":
                        array_push($arr, "۵" );
                    break;
                    case $number[$i] == "6":
                        array_push($arr, "۶" );
                    break;
                    case $number[$i] == "7":
                        array_push($arr, "۷" );
                    break;
                    case $number[$i] == "8":
                        array_push($arr, "۸" );
                    break;
                    case $number[$i] == "9":
                        array_push($arr, "۹" );
                    break;
                
                    default:
                        array_push($arr, $number[$i] );
                } 
            }
            return implode("",$arr);
        }
        $message = '';
        $item=About::find(1);
        $branches=AboutBranch::where('status','active')->orderBy('id')->get();
        $provinces = AboutBranch::select('province')->distinct()->pluck('province');
        foreach ($branches as $branche) {
            if(!empty($branche->address)) {
                $branche->address = fa_number($branche->address);
            }
            if(!empty($branche->phone)) {
                $branche->phone = fa_number($branche->phone);
            }
        }

        return view('user.substation.index',compact('item','branches','message','provinces'), ['title' => __('text.page_name.banks')]);
    }
    public function show($sub_station)
    {
        function fa_number($number) {
            $arr = array();
            for ($i=0; $i < strlen($number); $i++) { 
                switch ($number) {
                    case $number[$i] == "0":
                        array_push($arr, "۰" );
                    break;
                    case $number[$i] == "1":
                        array_push($arr, "۱" );
                    break;
                    case $number[$i] == "2":
                        array_push($arr, "۲" );
                    break;
                    case $number[$i] == "3":
                        array_push($arr, "۳" );
                    break;
                    case $number[$i] == "4":
                        array_push($arr, "۴" );
                    break;
                    case $number[$i] == "5":
                        array_push($arr, "۵" );
                    break;
                    case $number[$i] == "6":
                        array_push($arr, "۶" );
                    break;
                    case $number[$i] == "7":
                        array_push($arr, "۷" );
                    break;
                    case $number[$i] == "8":
                        array_push($arr, "۸" );
                    break;
                    case $number[$i] == "9":
                        array_push($arr, "۹" );
                    break;
                
                    default:
                        array_push($arr, $number[$i] );
                } 
            }
            return implode("",$arr);
        }
        $message = '';
        $item=About::find(1);
        $branches=AboutBranch::where('status','active')->where('province', $sub_station)->orderBy('id')->get();
        $provinces = AboutBranch::select('province')->distinct()->pluck('province');
        if ($branches->count() < 1) {
            // return redirect()->back()->with(['status' => 'danger-600', "message" => 'شعبه ای یافت نشد , لطفا دوباره امتحان کنید']);
            $message = 'شعبه ای یافت نشد , لطفا دوباره امتحان کنید';
        }

        foreach ($branches as $branche) {
            if(!empty($branche->address)) {
                $branche->address = fa_number($branche->address);
            }
            if(!empty($branche->phone)) {
                $branche->phone = fa_number($branche->phone);
            }
        }

        return view('user.substation.index',compact('item','branches','message','provinces'), ['title' => __('text.page_name.banks')]);
    }
}
