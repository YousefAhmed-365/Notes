<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Note;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function toggle(Request $request, $noteId){
        $note = Note::findOrFail($noteId);
        $user = $request->user();

        $like = $note->likes()->where("user_id", $user->id)->first();

        if($like){
            $like->delete();
        }else{
            $note->likes()->create(["user_id" => $user->id]);
        }

        return redirect()->back();
    }
}
