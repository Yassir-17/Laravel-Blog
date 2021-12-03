<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        // return view('posts.index')->with('posts', $posts);

        // test for API:
        // return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max: 255',
            'slug'        => 'required|alpha_dash|min: 5|max: 255|unique:posts,slug',
            'category_id' => 'required|integer',
            // 'tags'      => 'required|integer',
            'body'        => 'required',
        ],[
            'integer'     => 'please select a category!!',
        ]);

        $post = new Post;
        $post->title = $request->input('title'); //or using request helper function request('title');
        $post->slug  = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body  = $request->body;
        $post->save();

        $post->tag()->sync($request->tags, false);

        Session::flash('success','The post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $cats =  [];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }

        $post = Post::find($id);

        return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $post = Post::find($id);
       if ($request->input('slug') == $post->slug) {
        $this->validate($request, [
        'title' => 'required|max: 255',
        'category_id' => 'required|integer',
        'body' => 'required',
        ],[
            'integer' => 'please select a category!!',
        ]);

       }
       else {
        $this->validate($request, [
        'title' => 'required|max: 255',
        'slug'  => 'required|alpha_dash|min: 5|max: 255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body' => 'required',
        ],[
            'integer' => 'please select a category!!',
        ]);
       }

        $post = Post::find($id);
        $post->title = $request->input('title'); //or $request->input()->get('title')
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->body; //or $request->input('body') or request('body')
        $post->save();

        //check if the tags field is empty
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            //delete all old tags from post if the tags fiels submited empty. by passing an empty array(no file)
            $post->tags()->sync([]);
        }

        Session::flash('success','The post was successfully Updated!');

        return redirect()->route('posts.show', $post->id); //or redirect('the url here');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

		$post = Post::find($id);
        $post->tags()->detach(); //Delete manay to manay relationships. detach() delete any reference to the post.
		$post->delete();

		Session::flash('success','The post was successfully deleted!');

		return redirect()->route('posts.index');
    }
}
