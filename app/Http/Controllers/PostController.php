<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return void
//     */
//    public function index(): void
//    {
//        //
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostFormRequest $request
     * @return RedirectResponse
     */
    public function store(PostFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $post = $request->user()->posts()->create($validated);
        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'post is submitted! Title: '
                . $post->title . ' Description: '
                . $post->description);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): Application|Factory|View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post): View|Factory|Application
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostFormRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostFormRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();
        $post->update($validated);
        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $id = $post->id;
        $title = $post->title;
        $post->delete();
        return redirect()->route('home')
            ->with('deleted', '"Post ' . $id . ' : ' . $title . '" has now been deleted');
    }
}
