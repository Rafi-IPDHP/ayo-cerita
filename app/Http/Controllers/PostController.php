<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('story_page.index', compact('posts'));
    }

    public function create() {
        return view('story_page.create');
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'story' => 'required',
            'tanggal_upload' => 'required',
        ],[
            'story.required' => 'Kolom cerita tidak boleh kosong!',
        ]);

        Post::create($request->all());

        return redirect()->route('post.index');
    }
}
