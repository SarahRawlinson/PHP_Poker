<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokerGameRequest;
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
     * @param PokerGameRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function startNewGame(PokerGameRequest $request): Response|Application|ResponseFactory
    {
        $validated = $request->validated();
        $game = $request->user()->poker_game()->create($validated);
        return response(json_encode(['response' => 'ok']), 200);
    }
}
