<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        return Post::all();
    }

    public function store(Request $request) {
        $request->validate([
            'post' => 'required | string ',
        ]);

        return Post::create($request->all());

    }

    public function update(Request $request, $id) {
        // validate request data
        $validatedData = $request->validate([
            'post' => 'required | string ',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        $post->delete();

        return Post::all();
    }
}
