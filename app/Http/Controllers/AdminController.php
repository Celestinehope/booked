<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    

    public function admindashboard(){
        if (auth()->user()->role != "admin") {
           abort(403, 'Unauthorized Action! This page is for administrators only');
       }
       return view('admin.admindashboard');
   }
   public function showallusers(){

    $users=User::all();
    return view('admin.displayallusers',compact('users'));
}

   
}
