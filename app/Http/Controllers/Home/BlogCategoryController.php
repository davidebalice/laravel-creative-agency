<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image As Image;
use Carbon\Carbon;


class BlogCategoryController extends Controller
{
    public function BlogCategory(){
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all',compact('blogcategory'));
    }

    public function AddBlogCategory(){
        return view('admin.blog_category.add');
    }

    public function StoreBlogCategory(Request $request){
        
        $request->validate([
            'category' => 'required',
            'order' => 'required'
        ],[
            'category.required' => 'Category is required',
            'order.required' => 'Order is required'
        ]);
        
        BlogCategory::insert([
            'category' => $request->category,
            'order' => $request->order,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog category added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category')->with($notification);
    }


    public function EditBlogCategory($id){

        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit',compact('blogcategory'));
    }

    public function UpdateBlogCategory(Request $request){
        
        $id = $request->id;

        $request->validate([
            'category' => 'required',
            'order' => 'required'
        ],[
            'category.required' => 'Category is required',
            'order.required' => 'Order is required'
        ]);

        BlogCategory::findOrFail($id)->update([
            'category' => $request->category,
            'order' => $request->order,
        ]);

        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteBlogCategory ($id){
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog category deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Blog category deleted');
        return redirect()->route('blog.category')->with($notification);
    }
}
