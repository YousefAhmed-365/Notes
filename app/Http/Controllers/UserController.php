<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user){

        return view("show-user", compact("user"));
    }

    public function edit(Request $request, User $user){
        $validated = $request->validate([
            "user_description" => "required|min:1|max:512"
        ]);
        
        $user->update($validated);

        return redirect()->back()->with("success", "User edited successfully.");
    }
}
