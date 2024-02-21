<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('layouts.Admin.index');
    }

    public function edit(Post $post)
    {
      
            return view('Admin.post_edit',compact('post'));

    } 

    public function user(){
        $users = User::where('role','user')->get();
        return view('Admin.user',compact('users'));
    }

    public function user_edit(User $users)
    {
        return view('Admin.edit_user',compact('users'));
    }


}
