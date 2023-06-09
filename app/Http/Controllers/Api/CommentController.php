<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Request $request){
    
        $data = $request->validate([
            'author' => 'required|string',
            'content' => 'required|string',
            'email' => 'required|email',
            'project_id' => 'integer|exists:projects,id'
        ]);
        $comment = new Comment();
        $comment->author = $data['author'];
        $comment->content = $data['content'];
        $comment->email = $data['email'];
        $comment->project_id = $data['project_id'];
        $comment->save();

        Mail::to('info@boolpress.it')->send(new NewComment($comment));

        return $comment;
    }
}
