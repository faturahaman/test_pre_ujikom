<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create($validated);

        return back()->with('success', 'Thanks for your feedback!');
    }
}
