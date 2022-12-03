<?php

namespace App\Http\Controllers;
use App\Http\Requests\JoinPokerGameRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PokerGameRequest;
use App\Models\PokerGame;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Contracts\Service\Attribute\Required;

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
     * @param JoinPokerGameRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function joinGame(JoinPokerGameRequest $request): Response|Application|ResponseFactory
    {
        $game_users = $request->user()->usersConnectedToPokerGame()->get();
        $game_user_validate = $request->validated();
        $game_users = $game_users->isNotEmpty()?$game_users[0]:$request->user()->usersConnectedToPokerGame()->create($game_user_validate);
//        $game->users_connected_to_poker_game()->associate($game_users);
        $game_users = $request->user()->usersConnectedToPokerGame()->get();
        return response(json_encode(['response' => 'ok', 'user_record' => $game_users]), 200);
    }


    /**
     * @param PokerGameRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function startNewGame(PokerGameRequest $request): Response|Application|ResponseFactory
    {
        $game = $request->user()->pokerGame()->get();
        $validated = $request->validated();
        $game = $game->isNotEmpty()?$game:$request->user()->pokerGame()->create($validated);
        $game = $request->user()->pokerGame()->get();
        return response(json_encode(['response' => 'ok', 'game' => $game]), 200);
    }
}
