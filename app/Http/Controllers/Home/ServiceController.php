<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image As Image;
use App\Models\Service;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function AdminServices(){
        $services = Service::latest()->get();
        return view('admin.services.services',compact('services'));
    }
    
    public function AddService(){
        return view('admin.services.add');
    }

    public function StoreService(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ],[
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        $save_url="";
        $save_url_icon="";

        if($request->file('photo')) {
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/services/'.$name_gen);
            $save_url = 'upload/services/'.$name_gen;
        } 

        if($request->file('icon')) {
            $image = $request->file('icon');
            $name_gen_icon = hexdec(uniqid()).'_icon.'. $image->getClientOriginalExtension();
            Image::make($image)->save('upload/services/'.$name_gen_icon);
            $save_url_icon = 'upload/services/'.$name_gen_icon;
        } 

        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $save_url,
            'icon' => $save_url_icon,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Service added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.services')->with($notification);
    }

    public function EditService($id){
        $services = Service::findOrFail($id);
        return view('admin.services.edit',compact('services'));
    }

    public function UpdateService(Request $request){
        
        $id = $request->id;
        $services = Service::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ],[
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ]);

        $save_url=$services->photo;
        $save_url_icon=$services->icon;

        if($request->file('photo')) {
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(600, null, function ($constraint) {$constraint->aspectRatio();})->save('upload/services/'.$name_gen);
            $save_url = 'upload/services/'.$name_gen;
        } 

        if($request->file('icon')) {
            $image = $request->file('icon');
            $name_gen_icon = hexdec(uniqid()).'_icon.'. $image->getClientOriginalExtension();
            Image::make($image)->save('upload/services/'.$name_gen_icon);
            $save_url_icon = 'upload/services/'.$name_gen_icon;
        } 

        Service::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $save_url,
            'icon' => $save_url_icon
        ]);

        $notification = array(
            'message' => 'Service updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteService ($id){
        $services = Service::findOrFail($id);
        $img = $services->photo;
        if (file_exists($img)){
            @unlink($img);
        }
        $icon = $services->icon;
        if (file_exists($icon)){
            @unlink($icon);
        }
        Service::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','Service deleted');
        return redirect()->route('admin.services')->with($notification);
    }

    public function ServiceDetails ($id){
        $services = Service::findOrFail($id);
        return view('frontend.services_details',compact('services'));
    }

    public function Service (){
        $services = Service::latest()->paginate(12);
        return view('frontend.services',compact('services'));
    }
}
