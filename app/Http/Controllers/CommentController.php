<?php

namespace App\Http\Controllers;

use App\Utils\AuthUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller {
    // ...

    public function store(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'content' => 'required|string|max:500',
        ], [
            'content.max' => 'La taille du commentaire ne doit pas dépasser :max caractères.',
        ]);
        
        $user = AuthUtil::getAuthUser();

        // Create a new comment
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = $user->id;
        $comment->task_id = $id;

        // Save the comment
        $comment->save();

        // Redirect or return a response
        return redirect()->back();
    }
}