<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            "comment_content" => "required|min:1|max:256"
        ]);

        $validated["user_id"] = $request["user_id"];
        $validated["note_id"] = $request["note_id"];
        Comment::create($validated);

        return redirect()->back()->with("success", "Commented successfully.");
    }

    public function update(Request $request, Comment $comment){
        $validated = $request->validate([
            "comment_content" => "required|min:1|max:256"
        ]);
        
        $comment->update($validated);

        return redirect()->route("note.show", $comment->note_id)->with("success", "Commented edited successfully.");
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->back()->with("success", "Comment deleted successfully.");
    }
}
