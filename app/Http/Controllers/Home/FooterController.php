<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function FooterSetup(){
        $footer = Footer::find(1);
        return view('admin.footer.footer',compact('footer'));
    }

    public function UpdateFooter(Request $request){
        
        $id = $request->id;
       
        Footer::findOrFail($id)->update([
            'name' => $request->name,
            'number' => $request->number,
            'address' => $request->address,
            'city' => $request->city,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'copyright' => $request->copyright,
            'short_description' => $request->short_description
        ]);

        $notification = array(
            'message' => 'Footer updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
