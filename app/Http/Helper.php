<?php
namespace App\Http;
use Illuminate\Support\Facades\Auth;
/**
 * Created by PhpStorm.
 * User: janko
 * Date: 19/12/2016
 * Time: 17:27
 */
class Helper
{
    // slovenian date format
    public function slovenianDate($dateString)
    {
        $realDate = strtotime($dateString);
        $sloDate = date('d.m.Y', $realDate);

        return $sloDate;
    }

    // function checkes if the logged in user is the author
    public function thisUser($userId)
    {
        $currentUser = Auth::user();
        if($currentUser->id == $userId)
        {
            return true;
        }
        return false;
    }

    // function checkes if logged in user has admin rights
    public function isAdmin ()
    {
        $currentUser = Auth::user();
        if($currentUser->roles->first()->name == 'Admin')
        {
            return true;
        }
        else
        {
            return false;

        }
    }

    // helper funciton for granting user access
    public function userAccess($userId)
    {
        if($this->thisUser($userId) || $this->isAdmin())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}