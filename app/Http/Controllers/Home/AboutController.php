<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use App\Models\PageBanner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image As Image;

class AboutController extends Controller
{
    public function AboutPage(){
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page',compact('aboutpage'));
    }

    public function UpdateAbout(Request $request){
        $about_id = $request->id;
        
        if($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/about/'.$name_gen);
            $save_url = 'upload/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'skills' => $request->skills,
                'awards' => $request->awards,
                'about_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Updated successfully',
                'alert-type' => 'success'
            );
        } 
        else {
            dd($request->skills);
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'skills' => $request->skills,
                'awards' => $request->awards
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
        $pagebanner = PageBanner::find(1);
        return view('frontend.about_page',compact('aboutpage','pagebanner'));
    }

    public function Store (Request $request){
        
        $image = $request->file('gallery');
        
        foreach($image as $gallery) {
            $name_gen = hexdec(uniqid()).'.'. $gallery->getClientOriginalExtension();

            Image::make($gallery)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('upload/gallery/'.$name_gen);

            $save_url = 'upload/gallery/'.$name_gen;
            MultiImage::insert([
                'gallery' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message' => 'File uploaded',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Add (){
        return view('admin.about_page.add');
    }

    public function Gallery (){
        $gallery = MultiImage::all();
        return view('admin.about_page.gallery',compact('gallery'));
    }

    public function Edit ($id){
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit',compact('multiImage'));
    }
    
    public function Update (Request $request){
       
        $gallery_id = $request->id;

        if($request->file('gallery')) {
            $image = $request->file('gallery');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();

            Image::make($image)->resize(null, 200, function ($constraint) {$constraint->aspectRatio();})->save('upload/gallery/'.$name_gen);
           
            $save_url = 'upload/gallery/'.$name_gen;

            MultiImage::findOrFail($gallery_id)->update([
                'gallery' => $save_url
            ]);

            $notification = array(
                'message' => 'Upload successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('gallery')->with($notification);
    }

    public function Delete ($id){
        $multiImage = MultiImage::findOrFail($id);
        $img = $multiImage->gallery;
        if (file_exists($img)){
            @unlink($img);
        }
        MultiImage::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Image deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Image deleted');
        return redirect()->route('gallery')->with($notification);
    }
}
