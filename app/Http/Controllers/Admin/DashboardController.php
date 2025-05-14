<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['title'] = 'Offers';
        $data['userCount'] = User::where(['role' => 1])->count();
        return view ('admin.dashboard', $data);
    }
}
