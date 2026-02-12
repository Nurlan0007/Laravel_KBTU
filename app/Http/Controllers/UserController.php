<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // This is the data we will send to the screen
        $userName = "Nurlan - Laravel Developer";

        return view('user_profile', ['name' => $userName]);
    }
}
