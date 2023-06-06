<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image As Image;

class AboutController extends Controller
{
    public function AboutPage(){
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
    }

    public function UpdateAbout(Request $request){
        $about_id = $request->id;
        
        if($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Updated successfully',
                'alert-type' => 'success'
            );
        } 
        else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description
            ]);

            $notification = array(
                'message' => 'Updated successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

    public function HomeAbout (){
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));
    }

    public function AboutMultiImage (){
        //$aboutpage = About::find(1);
        return view('admin.about_page.multi_image');
    }

    public function StoreMultiImage (Request $request){
        
        $image = $request->file('multi_image');
        
        foreach($image as $multi_image) {
            $name_gen = hexdec(uniqid()).'.'. $multi_image->getClientOriginalExtension();

            /*
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // resize the image to a height of 200 and constrain aspect ratio (auto width)
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            */

            Image::make($multi_image)->resize(220,220)->save('upload/multi_image/'.$name_gen);
            $save_url = 'upload/multi_image/'.$name_gen;
            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'File uploaded',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllMultiImage (){
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image',compact('allMultiImage'));
    }

    public function EditMultiImage ($id){
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multiImage'));
    }
    
    public function UpdateMultiImage (Request $request){
       
        $multi_image_id = $request->id;

        if($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();

            /*
            $img->resize(null, 200, function ($constraint) {
                            $constraint->aspectRatio();
                        });
            */

            Image::make($image)->resize(null, 200, function ($constraint) {$constraint->aspectRatio();})->save('upload/multi_image/'.$name_gen);
            //Image::make($image)->resize(220,220)->save('upload/multi_image/'.$name_gen);
           
            $save_url = 'upload/multi_image/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Upload successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('all.multi.image')->with($notification);
    }

    public function DeleteMultiImage ($id){
        $multiImage = MultiImage::findOrFail($id);
        $img = $multiImage->multi_image;
        if (file_exists($img)){
            @unlink($img);
        }
        MultiImage::findOrFail($id)->delete();
        //return view('admin.about_page.all_multi_image',compact('multiImage'));
        $notification = array(
            'message' => 'Image deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Image deleted');
        return redirect()->route('all.multi.image')->with($notification);
    }
}
