<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Http\Response;

class CrudController extends Controller {
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Factory|View|Application
    {
        $todo = Todo::all();
        return view('todo')->with(compact('todo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request): Response|Application|ResponseFactory
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $todo = Todo::create($data);
        return response(json_encode($todo), 200);
    }
    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Application|Factory|View
     */
    public function show(Todo $todo): Application|Factory|View
    {
        return view('todo', [compact('todo')]);
    }
}
