<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class IndexController extends Controller
{
    public function Homepage(){
        $services = Service:: where('active', 1)->orderBy('id', 'asc')->limit(5)->get();
        return view('frontend.index',compact('services'));
    }
}
