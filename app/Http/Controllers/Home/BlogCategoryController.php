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
        $blogcategory = BlogCategory::orderby('position','ASC')->latest()->paginate(12);
        return view('admin.blog_category.category',compact('blogcategory'));
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

        return redirect()->route('admin.blog.category')->with($notification);
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

    public function ActiveBlogCategory(Request $request, $id){
        try {
            $blogCategory = BlogCategory::findOrFail($id);
            $blogCategory->update([
                'active' => $request->active,
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function DeleteBlogCategory ($id){
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog category deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Blog category deleted');
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function Sort($action,$id) {
        
        $blogCategory = BlogCategory::findOrFail($id);
        $order = $blogCategory->position;
        
        if($action=="up")
		{
            $order--;
            $newOrder=$order+1;
        }
        elseif($action=="down")
		{
            $order++;
            $newOrder=$order-1;
        }
        if($order<=1)
        {
            $order=1;
        }
        if($newOrder<=1)
        {
            $newOrder=1;
        }
        
        //->whereNull('deleted_at')

        BlogCategory::where('position', $order)
        ->chunkById(100, function ($blogUpdate) use ($newOrder) {
            foreach ($blogUpdate as $blogCategory) {
                BlogCategory::where('id', $blogCategory->id)
                    ->update(['position' => $newOrder]);
            }
        });
        
        BlogCategory::where('id', $id)
        ->update(['position' => $order]);

        $i=0;
        BlogCategory::orderby('position','ASC')
        ->chunkById(100, function ($blogUpdate) use ($i) {
            foreach ($blogUpdate as $blogCategory) {
                $i++;
                BlogCategory::where('id', $blogCategory->id)->update(['position' => $i]);
            }
        });	

        $blogcategory = BlogCategory::orderby('position','ASC')->paginate(15);
        return view('admin.blog_category.category',compact('blogcategory'));
    }
}
