<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;
use Auth;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{

    /**
     * Constructs new post object.
     * Ensures only authorized users may create, edit, or delete.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest('published_at')->published()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        Auth::user()->posts()->save($post);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \App\Http\Controllers\Response
     * @internal param int $id
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \App\Http\Controllers\Response
     * @internal param int $id
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Post $post
     * @return \App\Http\Controllers\Response
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return \App\Http\Controllers\Response
     * @internal param int $id
     */
    public function destroy(Post $post)
    {
        $post->destroy();

        return redirect('posts');
    }

}
