<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function destroy(Comment $comment){

        $project = $comment->project;
        $comment->delete();

        return redirect()->route('admin.projects.show', $project);
    }
}
