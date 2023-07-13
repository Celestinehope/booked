<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard(){
        
    return view('admin/admindashboard');
    }//end method

    public function showusers(){

        $users=User::all();
        return view('admin.displayallusers',compact('users'));

    }
}
