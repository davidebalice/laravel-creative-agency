<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\PageBanner;
use Intervention\Image\Facades\Image As Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function Blog(Request $request)
    {
        $searchTerm = $request->input('q');
        $query = Blog::latest()->with('categories');
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
        $blogs = $query->orderBy('created_at','DESC')->paginate(12);
        foreach ($blogs as $item) {
            $item->formatted_created_at = isset($item->created_at)
                ? Carbon::parse($item->created_at)->format('d/m/Y H:i:s')
                : 'None';
        }
        return view('admin.blog.blog', compact('blogs'));
    }

    public function AddBlog(){
        $categories = BlogCategory::orderBy('order','ASC')->get();
        $user = auth()->user();
        return view('admin.blog.add',compact('categories','user'));
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
        
        Blog::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $save_url,
            'image_home' => $save_url_home,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog')->with($notification);
    }

    public function EditBlog($id){
        $blogs = Blog::with('authors')->findOrFail($id);
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
            'created_at' => $request->created_at,
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

    public function ActiveBlog(Request $request, $id){
        try {
            $blog = Blog::findOrFail($id);
            $blog->update([
                'active' => $request->active,
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
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
        return redirect()->route('admin.blog')->with($notification);
    }

    public function BlogDetails ($id){
        $recent_blogs = Blog::with('authors')->latest()->paginate(6);
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        $blogs = Blog::findOrFail($id);
        $allTags = collect();
        foreach ($recent_blogs as $item) {
            $tag = explode(',', $item->tags);
            $allTags = $allTags->concat($tag);
        }
        $allTags = $allTags->unique();
        return view('frontend.blog_details',compact('blogs','recent_blogs','categories','allTags'));
    }

    public function CategoryBlog ($id){
        $blogpost = Blog::where('category_id',$id)->orderBy('created_at','DESC')->paginate(12);
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        $recent_blogs = Blog::with('authors')->latest()->paginate(6);
        $categoryname = BlogCategory::findOrFail($id);
        $allTags = collect();
        foreach ($recent_blogs as $item) {
            $tag = explode(',', $item->tags);
            $allTags = $allTags->concat($tag);
        }
        $allTags = $allTags->unique();
        return view('frontend.category_blog_details',compact('blogpost','recent_blogs','categories','categoryname','allTags'));
    }

    public function HomeBlog(Request $request) {

        $querySearch = $request->input('key');
        $queryTag = $request->input('tag');
        if ($querySearch) {
            $blogs = Blog::with('authors')
            ->where('title', 'like', "%$querySearch%")
            ->where('description', 'like', "%$querySearch%")
            ->paginate(12);
        } elseif ($queryTag) {
                $blogs = Blog::with('authors')
                ->where('tags', 'like', "%$queryTag%")
                ->paginate(12);
        } else {
            $blogs = Blog::with('authors')->latest()->paginate(12);
        }
        $recent_blogs = Blog::with('authors')->latest()->paginate(6);
        $categories = BlogCategory::orderBy('order','ASC')->limit(15)->get();
        $pagebanner = PageBanner::find(1);
       
        $allTags = collect();
        foreach ($recent_blogs as $item) {
            $tag = explode(',', $item->tags);
            $allTags = $allTags->concat($tag);
        }
        $allTags = $allTags->unique();

        return view('frontend.blog',compact('blogs','categories','pagebanner','recent_blogs','allTags'));
    }
    
}
