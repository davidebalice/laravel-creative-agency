<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image As Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function Blog(){
        $blogs = Blog::latest()->with('categories')->paginate(12);
        return view('admin.blog.all',compact('blogs'));
    }
    
    public function AddBlog(){
        $categories = BlogCategory::orderBy('order','ASC')->get();
        return view('admin.blog.add',compact('categories'));
    }

    public function StoreBlog(Request $request){

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ],[
            'category_id.required' => 'Category is required',
            'title.required' => 'Title is required',
            'tags.required' => 'Tags is required',
            'description.required' => 'Description is required'
        ]);

        $save_url="";
        $save_url_home="";

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
        } 

        if($request->file('image_home')) {
            $image = $request->file('image_home');
            $name_gen_home = hexdec(uniqid()).'_home.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen_home);
            $save_url_home = 'upload/blog/'.$name_gen_home;
        } 
        /*
        if($request->file('image_home')) {
            $image = $request->file('image_home');
            $name_gen_home = hexdec(uniqid()).'_home.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/blog/'.$name_gen_home);
            $save_url_home = 'upload/blog/'.$name_gen_home;
        } 
        */
        Blog::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'image' => $save_url,
            'image_home' => $save_url_home,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog')->with($notification);
    }

    public function EditBlog($id){
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('order','ASC')->get();
        return view('admin.blog.edit',compact('blogs','categories'));
    }

    public function UpdateBlog(Request $request){
        
        $id = $request->id;
        $blogs = Blog::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ],[
            'category_id.required' => 'Category is required',
            'title.required' => 'Title is required',
            'tags.required' => 'Tags is required',
            'description.required' => 'Description is required'
        ]);

        $save_url=$blogs->image;
        $save_url_home=$blogs->image_home;

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
        } 

        if($request->file('image_home')) {
            $image = $request->file('image_home');
            $name_gen_home = hexdec(uniqid()).'_home.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/blog/'.$name_gen_home);
            $save_url_home = 'upload/blog/'.$name_gen_home;
        } 

        Blog::findOrFail($id)->update([
            'title' => $request->title,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $save_url,
            'image_home' => $save_url_home
        ]);

        $notification = array(
            'message' => 'Blog updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteBlog ($id){
        $blogs = Blog::findOrFail($id);
        $img = $blogs->image;
       
        if (file_exists($img)){
            @unlink($img);
        }
        $img_home = $blogs->image_home;
        if (file_exists($img_home)){
            @unlink($img_home);
        }
        
        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','blog deleted');
        return redirect()->route('blog')->with($notification);
    }

    public function BlogDetails ($id){
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        $blogs = Blog::findOrFail($id);
        return view('frontend.blog_details',compact('blogs','allblogs','categories'));
    }

    public function CategoryBlog ($id){
        $blogpost = Blog::where('category_id',$id)->orderBy('created_at','DESC')->paginate(12);
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.category_blog_details',compact('blogpost','allblogs','categories','categoryname'));
    }

    public function HomeBlog() {
        $allblogs = Blog::latest()->paginate(12);
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        return view('frontend.blog',compact('allblogs','categories'));
    }
    
}
