<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Blog;

class HomepageController extends Controller
{
    public function Homepage(){
        $portfolio = Portfolio::where('active', 1)->orderBy('position', 'asc')->latest()->paginate(12);
        $services = Service:: where('active', 1)->orderBy('position', 'asc')->limit(5)->get();
        $blogs = Blog:: where('active', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend.index',compact('services','portfolio','blogs'));
    }
}
