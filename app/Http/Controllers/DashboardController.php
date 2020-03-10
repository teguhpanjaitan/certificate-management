<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Certificate;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $userList = User::where('locked', '=', '0')->get();
        $certList = Certificate::where('deleted', '=', '0')->get();
        $userCount = $userList->count();
        $certCount = $certList->count();
        return view('pages/dashboard',['userCount' => $userCount,'certCount' => $certCount]);
    }
}
