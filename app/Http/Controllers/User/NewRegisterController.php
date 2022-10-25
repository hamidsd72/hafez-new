<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sms;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Model\Filep; 
use App\Model\ProvinceCity;
use App\Model\Slider;
use App\Model\ServiceCat;
use App\Model\Photo;
use App\Model\Custom;
use App\Model\About;
use App\Model\Service;
use App\Model\OffCode;
use App\Model\ServicePackage;
use App\Model\ServiceBuy;
use App\Model\ServiceFactor;
use App\Model\ServicePlus;
use App\Model\ServicePlusBuy;
use App\Model\ServicePackagePrice;
use Illuminate\Support\Facades\Auth;
use App\Model\Contact;
use Illuminate\Support\Facades\Cookie;


class NewRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ( strlen($request->mobile) == 11 ) {
            $sms_code   = rand(100000, 999999);
            $pass       = $request->password;
            $user       = User::where('mobile', $request->mobile)->first();
            if ($user) {
                if ( password_verify( $pass, $user->password) ) {
                    $user->sms_code = $sms_code;
                    $user->update();
                    $number = $user->mobile;
                    Sms::SendSms( $number , (' کد تایید سامانه حافظ : '.$user->sms_code) );
                    return view('auth.verify',compact('user','pass') );
                }
                $error = 'شماره موبایل یا رمز عبور اشتباه است';
                return view('auth.login',compact('error') );
            } 
        }
        
        $error = 'شماره وارد شده نامعتبر است';
        return view('auth.login', compact('error') );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $new_register)
    {
        $pass = $request->password;
        if ( strlen($request->code) == 6 ) {
            
            $user = User::where('mobile', $request->mobile)->first();
            if ($user) {
                if ( password_verify( $pass, $user->password) ) {
                    
                    if ($user->sms_code == $request->code  && $user->updated_at->diffInMinutes(Carbon::now(), false) < 5) {
                        auth()->loginUsingId($user->id, true);
                        return redirect('/admin');
                    }

                }
            } 
            
            
            $error  = 'کد صحیح نیست یا تاریخ گذشته است';
        } else {
            $error = 'کد وارد شده نامعتبر است';
        }
        return view('auth.verify', compact('user', 'pass', 'error') );
    }

    public function destroy($id)
    {
        //
    }
}