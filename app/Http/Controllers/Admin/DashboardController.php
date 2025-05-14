<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['userCount'] = User::where(['role' => 1])->count();
        $id = Auth::id();
        $data['blogCount'] = Blog::where('user_id', $id)->count();
        return view ('admin.dashboard', $data);
    }
}
