<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget("query");
        $notes = Note::with("user")->get()->sortByDesc("created_at");

        return view("dashboard", compact("notes"));
    }

    public function search(Request $request)
    {
        $searchQuery = $request["query"];
        $notes = Note::with("user")
            ->where("title", "like", "%" . $searchQuery . "%")
            ->orWhere("note_content", "like", "%" . $searchQuery . "%")
            ->orderByDesc("created_at")
            ->get();
        
        $request->session()->flash("query", $searchQuery);
        return view("dashboard", compact("notes"));
    }
}
