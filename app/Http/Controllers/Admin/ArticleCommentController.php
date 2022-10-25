<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Articlecomment;
use App\Comment;
use App\FaqCategory;
use App\Activity;
use App\ScoreType;
use App\User;
use App\UserScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArticleCommentController extends Controller
{

    // Construct Function
    public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function status($id)
    {
        $item = Comment::find($id);


        if ($item->status == 'active') {
            $item->status = 'pending';
            $item->update();
            if($item->reply_id==0 && $item->replys)
            {
                $item->replys->status = 'pending';
                $item->replys->update();
            }

        } else {
            $item->status = 'active';
            $item->update();
            if($item->reply_id==0 && $item->replys)
            {
                $item->replys->status = 'active';
                $item->replys->update();
            }
        }

        return redirect()->back()->with(['status' => 'success', "message" => 'عملیات با موفقیت انجام شد']);

    }


    // Store Function
    public function store(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        $comment = Comment::find($id);
        $lang=$comment->lang;
        $admin=$lang=='fa'?'مدیر':'admin';
        try {
            $item = Comment::create([
                'reply_id' => $id,
                'name' => $admin,
                'text' => $request->text,
                'lang' => $lang,
                'type' => 'blog',
                'user_id' => auth()->user()->id,
                'item_id' => $id,
                'status' => 'active',
            ]);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' نظرات بلاگ : برای ' . '(' . $comment->name . ')' . ' پاسخی را ثبت کرد';
            $item->activity()->save($activity);
            return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index()
    {
        $items = Comment::where('type','blog')->where('reply_id',0)->orderBy('id','desc')->paginate(20);
        return view('admin.blog.comment.index', compact('items'), ['title' => 'نظرات بلاگ ها']);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = Comment::find($id);
        try {
            if($item->replys){
                $item->replys->delete();
            }
            $item->delete();
            return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
