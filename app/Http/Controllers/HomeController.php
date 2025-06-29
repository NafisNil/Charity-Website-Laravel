<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;   
use App\Models\Blog;
use App\Models\Campaign;
class HomeController extends Controller
{
    //
    public function index(){
        $data['eventCount'] = Event::count();
        $data['blogCount'] = Blog::count();
        $data['campaignCount'] = Campaign::count();
        return view('admin.index', $data);
    }
}
