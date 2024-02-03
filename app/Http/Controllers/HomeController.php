<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        return view('trangchu');
    }
    
    public function profile(){
        return view('User.profile');
    }

    public function checkProfile(Request $request){
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:20',
            'address' => 'required|string|max:200',
        ]);

        if ($user instanceof \Illuminate\Database\Eloquent\Model) {
    $user->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'address' => $request->input('address'),
    ]);
}

        return redirect()->route('trangchu')->with('success', 'Cập nhật thành công');
    }
}
