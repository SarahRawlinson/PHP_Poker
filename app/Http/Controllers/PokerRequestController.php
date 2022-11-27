<?php

namespace App\Http\Controllers;

use App\Models\PokerGame;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Factory|View|Application
    {
        $pokergame = PokerGame::all();
        return view('poker.create')->with(compact('pokergame'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request): Response|Application|ResponseFactory
    {
//        $data = $request->validate([
//            'number' => 'required|max:255'
//        ]);
//        $game = PokerGame::create($data);
        return response(json_encode(['response' => 'ok']), 200);
    }
}
