<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function loginIndex(){
        if(Auth::check()){
            return redirect()->route("/");
        }

        return view("login");
    }

    public function registerIndex(){
        if(Auth::check()){
            return redirect()->route("/");
        }

        return view("register");
    }

    public function login(Request $request){        
        $validated = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8|max:32"
        ]);

        if (Auth::attempt($validated)) {
            session()->regenerate();
            session()->regenerateToken();

            return redirect()->intended("/")->with("success", "Logged in successfully.");
        }

        return back()->withErrors([
            "email" => "The provided credentials do not match our records.",
        ])->withInput($request->only("email"));
    }

    public function register(Request $request){
        $validated = $request->validate([
            "name" => "required|min:3|max:32",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|max:32"
        ]);

        User::create($validated);

        if(auth::attempt($validated)){
            session()->regenerate();
            session()->regenerateToken();

            return redirect("/")->with("success", "Registered successfully.");
        }

        return redirect()->back()->withErrors(["error" => "Failed to registration."]);
    }

    public function logout(){
        if(!Auth::check()){
            return redirect()->route("/");
        }

        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect("/")->with("success", "Logged out successfully.");
    }
}
