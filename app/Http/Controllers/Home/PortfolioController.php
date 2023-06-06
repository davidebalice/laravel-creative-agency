<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image As Image;
use App\Models\Portfolio;
use Carbon\Carbon;

class PortfolioController extends Controller
{ 
    public function AllPortfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.all',compact('portfolio'));
    }
    
    public function AddPortfolio(){
        return view('admin.portfolio.add');
    }

    public function StorePortfolio(Request $request){

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'Name is required',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        $save_url="";
        $save_url_home="";

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;
        } 

        if($request->file('image_home')) {
            $image = $request->file('image_home');
            $name_gen_home = hexdec(uniqid()).'_home.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen_home);
            $save_url_home = 'upload/portfolio/'.$name_gen_home;
        } 

        Portfolio::insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
            'image_home' => $save_url_home,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Portfolio added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    public function EditPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request){
        
        $id = $request->id;
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'Name is required',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        $save_url=$portfolio->image;
        $save_url_home=$portfolio->image_home;

        if($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;
        } 

        if($request->file('image_home')) {
            $image = $request->file('image_home');
            $name_gen_home = hexdec(uniqid()).'_home.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen_home);
            $save_url_home = 'upload/portfolio/'.$name_gen_home;
        } 

        Portfolio::findOrFail($id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
            'image_home' => $save_url_home
        ]);

        $notification = array(
            'message' => 'Portfolio updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeletePortfolio ($id){
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->image;
        if (file_exists($img)){
            @unlink($img);
        }
        $img_home = $portfolio->image_home;
        if (file_exists($img_home)){
            @unlink($img_home);
        }
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Portfolio deleted');
        return redirect()->route('all.portfolio')->with($notification);
    }

    public function PortfolioDetails ($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

    public function Portfolio (){
        $portfolio = Portfolio::latest()->paginate(12);
        return view('frontend.portfolio',compact('portfolio'));
    }
}
