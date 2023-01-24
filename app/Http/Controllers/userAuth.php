<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class userAuth extends Controller
{
    public function userCheck($username, $password){
        // Check if we have the user
        if (Users::where('name', '=', $username)->exists()){
                // Get and check the password
                $pass = Users::select('password')
                ->where('name', $username)
                ->get();
                if ($password == $pass[0]["password"]) {
                    return "Logged In Successfully";
                }else{
                    return "Password Incorrect";
                }
        }else{
            return $username . " is not found.";
        }
    }
}
