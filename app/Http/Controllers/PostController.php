<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => ['required', 'min:10']
            ]
        );

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'post is submitted! Title: '
                .$post->title.' Description: '
                .$post->description);
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
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10'],
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->save();

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is updated!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param int $id
//     * @return void
//     */
//    public function destroy(int $id): void
//    {
//        //
//    }
}
