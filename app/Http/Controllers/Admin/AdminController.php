<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Admin;


class AdminController extends Controller
{
    //
    public function index(){
        $params = [];
        $params['videos'] = Video::all()->count();
        $params['users'] = User::all()->count();
        $params['events'] = Event::all()->count();
        $params['blogs'] = Blog::all()->count();
        $params['admins'] = Admin::all()->count();
        return view('admin.index',compact('params'));
    }
}
