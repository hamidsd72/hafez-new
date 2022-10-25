<?php

namespace App\Http\Controllers\User;

use App\About;
use App\Models\AboutFeature;
use App\Models\AboutFaq;
use App\Models\AboutTeam;
use App\Models\AboutBank;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    // Show Function
    public function show()
    {
        function add_ir_be_shaba($banks) {
            foreach ($banks as $bank) {
                if(!empty($bank->shaba)) {
                    $bank->shaba = "IR".$bank->shaba;
                }
            }
            return $banks;
        }
        $item=About::find(1);
        $items=AboutFeature::where('status','active')->get();
        $faqs1=AboutFaq::where('status','active')->where('place_id',1)->orderBy('id')->get();
        $faqs2=AboutFaq::where('status','active')->where('place_id',2)->orderBy('id')->get();
        $teams1=AboutTeam::where('status','active')->where('type',1)->orderBy('id')->get();
        $teams2=AboutTeam::where('status','active')->where('type',2)->orderBy('id')->get();
        $teams3=AboutTeam::where('status','active')->where('type',3)->orderBy('id')->get();
        $banks1=AboutBank::where('status','active')->where('type',1)->orderBy('id')->get();
        $banks2=AboutBank::where('status','active')->where('type',2)->orderBy('id')->get();
        $banks3=AboutBank::where('status','active')->where('type',3)->orderBy('id')->get();
        add_ir_be_shaba($banks1);
        add_ir_be_shaba($banks2);
        add_ir_be_shaba($banks3);
        return view('user.about.show',compact('teams1','teams2','teams3','item','faqs1','faqs2','items','banks1','banks2','banks3'), ['title' => __('text.page_name.about')]);
    }

}
