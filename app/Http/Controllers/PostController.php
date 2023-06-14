<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->postService->getAll();

        return Inertia::render('Posts/Index', ['posts' => $result['data']]);
    }

    /**
     * Display the create page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        $result = $this->postService->addPost($request);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Display the edit page.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Models\Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        $result = $this->postService->updatePost($request, $id);

        return redirect()->route('posts.index');
    }

    /**
     * Delete the specified resource.
     *
     * @param  \App\Models\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->postService->deletePost($id);

        return redirect()->route('posts.index');
    }
}
