<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\About;
use App\Models\AboutBank;

class BankDetailsController extends Controller
{ 
    public function index()
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
        $banks1=AboutBank::where('status','active')->where('type',1)->orderBy('id')->get();
        $banks2=AboutBank::where('status','active')->where('type',2)->orderBy('id')->get();
        $banks3=AboutBank::where('status','active')->where('type',3)->orderBy('id')->get();

        add_ir_be_shaba($banks1);
        add_ir_be_shaba($banks2);
        add_ir_be_shaba($banks3);
        
        return view('user.bank_details.index',compact('item','banks1','banks2','banks3'), ['title' => __('text.page_name.banks')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
