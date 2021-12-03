<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug) {
        $post = Post::where('slug', $slug)->first();
        // I used first() instead of get()
        // because the slug is unique in the database.
        // so if you finded stop and bring it.
        // and then displayed as single post object instead of a collection.
        // and that make the query faster.

        return view('blog.single')->with('post', $post);
    }

    public function getIndex() {
        $posts = Post::paginate(10);

        return view('blog.index')->with('posts', $posts);
    }
}
