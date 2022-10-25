<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Models\Blog;
use App\Models\Lang;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    // Construct Function
    public function __construct()
    {
//        $this->middleware(['auth', 'clearance']);
        $this->middleware(['auth','Admin']);
    }

    // Create Function
    public function create($type)
    {
        if($type=='news'){$title='افزودن خبر';}
        elseif($type=='article'){$title='افزودن مقاله';}
        else{$title='افزودن بلاگ';}
        return view('admin.blog.create',compact('type'), ['title' => $title]);
    }

    // Store Function
    public function store(Request $request,$type)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:240',
            'slug' => 'required|max:250',
            'writer' => 'required|max:250',
            'short_text' => 'required',
            'text' => 'required',
            'photo' => 'required',
        ]);
        if(Blog::where('type',$type)->where('slug',$request->slug)->first())
        {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'عنوان تکراری می باشد'
            ])->withErrors($validator)->withInput();
        }
//        if(Blog::where('type',$type)->where('slug_en',$request->slug_en)->first())
//        {
//            return redirect()->back()->with([
//                'status' => 'danger-600',
//                "message" => 'عنوان انگلیسی تکراری می باشد'
//            ])->withErrors($validator)->withInput();
//        }
        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item = new Blog();
            $item->type = $type;
            $item->title = $request->title;
            $item->slug = $request->slug;
            $item->slug_en = $request->slug_en;
            $item->short_text = $request->short_text;
            $item->text = $request->text;
            $item->writer = $request->writer;
            $item->titleseo = $request->titleseo;
            $item->keywordsseo = $request->keywordsseo;
            $item->descriptionseo = $request->descriptionseo;
            $item->save();
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/blogs/'.$type.'/photos/', 'blog-photo-');;
                $item->photo()->save($photo);
            }

//            store_lang($request,'blog',$item->id,['title','short_text','text','writer','titleseo','keywordsseo','descriptionseo']);

            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'store';
            $activity->text = ' بلاگ : ' . '(' . $request->title . ')' . ' را ثبت کرد';
            $item->activity()->save($activity);
            return redirect('admin/blog-list/'.$type)->with(['status' => 'success', "message" => ' با موفقیت ثبت شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Edit Function
    public function edit($id)
    {
        $item = Blog::find($id);
        $views = $item->views()->select('time')->distinct()->where('created_at','>=',\Carbon\Carbon::now()->startOfMonth())->orderBy('time')->get('time');
        
        $labels = array('1 تیر 1401');
        foreach ($views as $view) {
            array_push( $labels, my_jdate($view->time, 'd F Y'));
        }

        $datas = array(0);
        foreach ($views as $view) {
            $count = $item->views()->where('time','=', $view->time)->count();
            array_push( $datas, $count);
        }
        
        return view('admin.blog.edit', compact('item','labels','datas'), ['title' => $item->title]);
    }

    // Update Function
    public function update(Request $request, $id)
    { 
        $item = Blog::find($id);
        $old_title = $item->title;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:240',
            'slug' => 'required|max:250',
            'writer' => 'required|max:250',
            'short_text' => 'required',
            'text' => 'required',
        ]);

        if(Blog::where('type',$item->type)->where('slug',$request->slug)->where('id','!=',$item->id)->first())
        {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'عنوان تکراری می باشد'
            ])->withErrors($validator)->withInput();
        }
//        if(Blog::where('type',$item->type)->where('slug_en',$request->slug_en)->where('id','!=',$item->id)->first())
//        {
//            return redirect()->back()->with([
//                'status' => 'danger-600',
//                "message" => 'عنوان انگلیسی تکراری می باشد'
//            ])->withErrors($validator)->withInput();
//        }

        if ($validator->fails()) {
            return redirect()->back()->with([
                'status' => 'danger-600',
                "message" => 'لطفا فیلد ها را بررسی نمایید، بعضی از فیلد ها نمی توانند خالی باشند.'
            ])->withErrors($validator)->withInput();
        }
        try {
            $item->title = $request->title;
            $item->slug = $request->slug;
            $item->slug_en = $request->slug_en;
            $item->short_text = $request->short_text;
            $item->text = $request->text;
            $item->writer = $request->writer;
            $item->titleseo = $request->titleseo;
            $item->keywordsseo = $request->keywordsseo;
            $item->descriptionseo = $request->descriptionseo;
            if ($request->hasFile('photo')) {
                if ($item->photo) {
                    $old_path = $item->photo->path;
                    File::delete($old_path);
                    $item->photo->delete();
                }
                $photo = new Photo();
                $photo->path = file_store($request->photo, 'includes/asset/uploads/blogs/'.$item->type.'/photos/', 'blog-');;
                $item->photo()->save($photo);
            }
            $item->save();
//            if($item->langs)
//            {
//                foreach ($item->langs as $lang){
//                    $lang->delete();
//                }
//            }
//            store_lang($request,'blog',$item->id,['title','short_text','text','writer','titleseo','keywordsseo','descriptionseo']);
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'update';
            $activity->text = ' بلاگ : ' . '(' . $old_title . ')' . ' را ویرایش کرد';
            $item->activity()->save($activity);
            return redirect('admin/blog-lists/'.$item->type)->with(['status' => 'success', "message" => ' با موفقیت ویرایش شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Index Function
    public function index($type)
    {
        if($type=='news'){$title='اخبار';}
        elseif($type=='article'){$title='مقالات';}
        else{$title='بلاگ';}
        $items = Blog::where('type',$type)->orderBy('id' , 'desc')->get();
        return view('admin.blog.index', compact('items','type'), ['title' => $title]);
    }

    // Destroy Function
    public function destroy($id)
    {
        $item = Blog::find($id);
        $old_title = $item->title;
        try {
            $item->delete();
            $activity = new Activity();
            $activity->user_id = Auth::user()->id;
            $activity->type = 'delete';
            $activity->text = ' بلاگ : ' . '(' . $old_title . ')' . ' را حذف کرد';
            $item->activity()->save($activity);
            return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت حذف شد.']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

    // Active Function
    public function active($type,$id)
    {
        $item = Blog::find($id);
        $old_name = $item->title;
        $activity = new Activity();
        try {
            if($item->$type=='active')
            {
                $item->$type='pending';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' بلاگ : ' . '(' . $old_name . ')' . ' را غیرفعال کرد';
                $item->activity()->save($activity);
                return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت غیرفعال شد.']);
            }
            else
            {
                $item->$type='active';
                $item->update();
                $activity->user_id = Auth::user()->id;
                $activity->type = 'update';
                $activity->text = ' بلاگ : ' . '(' . $old_name . ')' . ' را فعال کرد';
                $item->activity()->save($activity);
                return redirect()->back()->with(['status' => 'success', "message" => ' با موفقیت فعال شد.']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'danger-600', "message" => 'یک خطا رخ داده است، لطفا بررسی بفرمایید.']);
        }
    }

}
