<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Sarfraznawaz2005\VisitLog\Models\VisitLog;
use SoapClient;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }   
    
    public function index()
    {
        $items = Permission::orderBy('id', 'DESC')->get();
        return view('admin.permission.index', compact('items') , ['title' => 'تنظیم دسترسی ها']);
    }

    public function update(Request $request, $permission)
    {
        // if (auth()->user()->getRoleNames()->first()=='ادمین ارشد') {
            $item = Permission::findOrFail($permission);
            $item->update($request->all());
            return redirect()->back()->with(['status' => 'success', "message" => 'با موفقیت ویرایش شد']);
        // }
        // return redirect()->back()->with(['status' => 'danger-600', "message" => 'شما دسترسی لازم را ندارید']);
    }

    public function visit()
    {
        //visit today
        $today = VisitLog::whereDate('created_at', date('Y-m-d'))->count();

        //visit yesterday
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $yester = VisitLog::whereDate('created_at', $yesterday)->count();

        //visit week
        $week = VisitLog::whereBetween('created_at',[\Carbon\Carbon::today()->startOfWeek(), \Carbon\Carbon::today()->endOfWeek()])->count();

        //visit week
        $month = VisitLog::whereBetween('created_at',[\Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth()])->count();

        //visit all
        $all = VisitLog::select('created_at')->count();

        return view('admin.visitor.show', compact('yester' ,'all', 'today', 'week', 'month'),['title' => 'بازدید ها', 'description' => 'لیست تمام بازدید ها']);
    }

    public function activities()
    {
        $items = Activity::orderBy('id', 'DsESC')->get();
        return view('admin.activity.index', compact('items'), ['title' => 'لیست تمام فعالیت ها']);
    }

    public function test()
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding' => 'UTF-8'));
        $parameters['username'] = "9128181892";
        $parameters['password'] = "Mehdi%62";
        $parameters['to'] = "9193727097";
        $parameters['from'] = "10004785";
        $parameters['text'] = "";
        $parameters['isflash'] = false;

        echo $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;
    }

}
