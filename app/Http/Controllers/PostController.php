<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
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
        $tags = Tag::lists('name', 'id');
        return view('posts.create', compact('tags'));
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
        $post = $this->createArticle($request);

        flash()->success('Your post has been created :)');

        return redirect(action('PostController@show', $post->id));
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
        $tags = Tag::lists('name', 'id');
        return view('posts.edit', compact('post', 'tags'));
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

        $this->syncTags($post, $request->input('tag_list'));

        flash()->success("{$post->title} has been updated :)");
        return redirect(action('PostController@show', $post->id));
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

        return redirect(action('PostController@index'));
    }

    /**
     * @param \App\Post $post
     * @param array     $tags
     *
     */
    private function syncTags(Post $post, array $tags)
    {
        $post->tags()->sync($tags);
    }

    /**
     * @param \App\Http\Requests\PostRequest $request
     *
     * @return \App\Post $post
     */
    public function createArticle(PostRequest $request)
    {
        $post = Auth::user()->posts()->create($request->all());

        $post->tags()->attach($request->input('tag_list'));

        return $post;
    }

}
