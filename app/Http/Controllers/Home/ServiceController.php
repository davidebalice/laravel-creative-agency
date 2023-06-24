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
}
