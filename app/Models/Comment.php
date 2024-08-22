<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "note_id",
        "comment_content"
    ];

    public function note(){

        return $this->belongsTo(Note::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
