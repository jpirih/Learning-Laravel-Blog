<?php

namespace App\Http\Controllers;
use App\Post;
use App\Role;
use App\User;
use App\Http\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    // users overview  -> get all users form database admin privileges
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);

    }

    // admin user changing user roles for all registered users
    public function assignUserRoles(Request $request)
    {
        //  user to modify roles
        $user = User::where('email', $request::get('email'))->first();
        $user->roles()->detach();

        // assigning roles
        $userRole = Role::where('name', 'User')->first();
        $authorRole = Role::where('name', 'Moderator')->first();
        $adminRole =  Role::where('name', 'Admin')->first();

        if($request::get('user_role'))
        {
            $user->roles()->attach($userRole);
        }
        if($request::get('author_role'))
        {
            $user->roles()->attach($authorRole);
        }
        if($request::get('admin_role'))
        {
            $user->roles()->attach($adminRole);
        }

        return redirect()->route('admin-users')->with('status', 'Uspešno si nastavil uporabniške vloge');

    }

    // user profile
    public  function userProfile($userId, Helper $helper)
    {/* $currentUser = Auth::user();
        $currentUserRole = $currentUser->roles()->first()->name;
        $admin = 'Admin';*/
        if($helper->userAccess($userId))
        {
            $posts = Post::where([['user_id', '=', $userId ], ['deleted', '=', false]])->get();
            $user = User::find($userId);

            foreach ($posts as $post)
            {
                $post->date_published = $helper->slovenianDate($post->date_published);
            }

            return view('users.user_profile', ['posts' => $posts, 'user' => $user]);
        }
        return redirect()->route('login')->with('status', 'Za ogled te strani je potrebna prijava.');
    }
}
