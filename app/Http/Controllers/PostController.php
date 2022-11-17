<?php

namespace App\Http\Controllers;

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
        return redirect()
            ->route('posts.create')
            ->with('success', 'post is submitted! Title: '
                .$request->input('title').' Description: '
                .$request->input('description'));
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return void
//     */
//    public function show(int $id): void
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param int $id
//     * @return void
//     */
//    public function edit(int $id): void
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param Request $request
//     * @param int $id
//     * @return void
//     */
//    public function update(Request $request, int $id): void
//    {
//        //
//    }
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
