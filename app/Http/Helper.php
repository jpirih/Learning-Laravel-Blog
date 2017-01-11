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
    public function slovenianDate($dateString)
    {
        $realDate = strtotime($dateString);
        $sloDate = date('d.m.Y', $realDate);

        return $sloDate;
    }

    public function thisUser($userId)
    {
        $currentUser = Auth::user();
        if($currentUser->id == $userId)
        {
            return true;
        }
        return false;
    }

    public function isAdmin ($userId)
    {
        $currentUser = Auth::user();
        if($currentUser->id === $userId && $currentUser->roles->first()->name() === 'Admin')
        {
            return true;
        }
        else
        {
            return false;

        }
    }

}