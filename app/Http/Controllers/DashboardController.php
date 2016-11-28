<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    // dasboard index
    public function dashboard()
    {
        $users = User::all();
        return view('pages.dashboard', ['users' => $users]);

    }


}
