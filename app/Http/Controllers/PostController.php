<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return Inertia::render('Posts/Create', [
            'success' => session('success') ?? null, // Pass flash message
        ]);
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($validated);

        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}
