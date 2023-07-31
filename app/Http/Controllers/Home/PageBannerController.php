<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;
use Intervention\Image\Facades\Image As Image;

class PageBannerController extends Controller
{
    public function PageBanner(){
        $pagebanner = PageBanner::find(1);
        return view('admin.pagebanner.pagebanner',compact('pagebanner'));
    }

    public function UpdatePageBanner(Request $request){

        $terms = ['about', 'portfolio', 'contact', 'service', 'blog'];

        foreach ($terms as $term) {
            if ($request->hasFile($term)) {
                $image = $request->file($term);
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(2000, 1000)->save('upload/pagebanner/' . $name_gen);
                $save_url = 'upload/pagebanner/' . $name_gen;
                PageBanner::findOrFail(1)->update([
                    $term => $save_url
                ]);
            }
        }

        $notification = array(
            'message' => 'Upload successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
