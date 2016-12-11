<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    // register page
    public function getRegisterPage()
    {
        return view('auth.register');
    }
    // login page
    public function getLoginPage()
    {
        return view('auth.login');
    }
    // save new user data to database -> default user role is User
    public function postRegistration(RegisterUserRequest $request)
    {
        $userRole = Role::where('name', 'User')->first();

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->nickname = $request->get('nickname');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $user->roles()->attach($userRole);

        Auth::login($user);
        return redirect(route('blog'))->with('status', 'Uspešno ste se registrirali prijavljeni ste kot '. $user->nickname);
    }

    // existing user Login
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request::get('email'), 'password' => $request::get('password')]))
        {
            return redirect()->route('blog')->with('status', 'Prijavljeni ste kot '. Auth::user()->nickname);
        }
        return redirect()->back()->with('status', 'Prišlo je do napke poskusite ponovno');
    }

    // logout current user
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('blog')->with('status', 'Uspešno ste se odjavili');
    }
}
