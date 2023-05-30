<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
    
        $data = $request->validate([
            'author' => 'required|string',
            'content' => 'required|string',
            'project_id' => 'integer|exists:projects,id'
        ]);
        $comment = new Comment();
        $comment->author = $data['author'];
        $comment->content = $data['content'];
        $comment->project_id = $data['project_id'];
        $comment->save();
        return $comment;
        return $request->all();
    }
}
