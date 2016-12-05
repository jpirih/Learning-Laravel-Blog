<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    // dasboard index - user managemnt
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    



}
