<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $validateData = [
        'post_title' => 'required|min:3|max:255|unique:posts',
        'post_image' => 'required|active_url',
        'post_content' => 'required|min:10|max:255',
        'tags' => 'required|exists:tags,id',
    ];

    public function index()
    {
        // Show only the posts of logged user
        // $posts = Post::where('user_id', Auth::id())->get();

        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();
        return view('admin.posts.create', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate($this->validateData);
        
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['post_date'] = new DateTime();

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();
        $newPost->tags()->sync($data['tags']);

        // Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'The post ' . '"' . $data['post_title'] . '"' . ' has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'tags' => $tags]);
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
        $validateData = $request->validate($this->validateData);
        
        $oldPost = Post::findOrFail($id);
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['post_date'] = $oldPost->post_date;

        $oldPost->update($data);
        return redirect()->route('admin.posts.show', ['post' => $oldPost->id])->with('success', 'The post ' . '"' . $data['post_title'] . '"' . ' has been modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', 'The post ' . '"' . $post['post_title'] . '"' . ' has been deleted successfully');
    }
}
