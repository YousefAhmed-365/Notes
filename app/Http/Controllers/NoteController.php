<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function show(Note $note){
        $hint = "show";

        return view("show", compact("note", "hint"));
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            "title" => "required|min:1|max:32",
            "note_content" => "required|min:1|max:512"
        ]);
        
        $validated["user_id"] = Auth::id();
        
        Note::create($validated);

        return redirect()->intended("/")->with("success", "Note created successfully.");
    }

    public function destroy(Note $note){
        $note->delete();

        return redirect()->intended("/")->with("success", "Note deleted successfully.");
    }
}
