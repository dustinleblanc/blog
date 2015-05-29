<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller {

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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
        return view('posts.show', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PostRequest $request)
	{
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('posts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $post = Post::findOrFail($id);
	}

}
