<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\Portfolio;
use App\Models\Blog;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function Dashboard(){
        $portfolio = Portfolio::orderby('position','ASC')->paginate(6);
        $blogs = Blog::orderby('created_at','DESC')->paginate(6);
        foreach ($blogs as $item) {
            $item->formatted_created_at = isset($item->created_at)
                ? Carbon::parse($item->created_at)->format('d/m/Y')
                : 'None';
        }
        return view('admin.index',compact('portfolio','blogs'));
    }

    public function Destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);;
    }

    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin/'),$filename);
            $data->profile_image = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile update successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('edit.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){
        
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','Password updated successfully');
            return redirect()->back();
        } else {
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }
    }
}
