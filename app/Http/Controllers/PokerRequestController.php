<?php

namespace App\Http\Controllers;
use App\Http\Requests\JoinPokerGameRequest;
use App\Http\Requests\PokerGameUsersRequest;
use App\Models\User;
use App\Models\UsersConnectedToPokerGame;
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
    public function join(): Factory|View|Application
    {
        $pokerGames = PokerGame::all();
        return view('poker.home-poker')->with(compact('pokerGames'));
    }
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
        $responseMessage = "Already Joined To Game";
        $status = "warning";
        if($game_users->isEmpty())
        {
            $responseMessage = "Game Joined";
            $status = "success";
            $request->user()->usersConnectedToPokerGame()->create($game_user_validate);
            $game_users = $request->user()->usersConnectedToPokerGame()->get();
        }
        return response(json_encode(['response' => $responseMessage, 'user_record' => $game_users, 'status' => $status]), 200);
    }


    /**
     * @param PokerGameRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function startNewGame(PokerGameRequest $request): Response|Application|ResponseFactory
    {
        $game = $request->user()->pokerGame()->get();
        $validated = $request->validated();
        $responseMessage = "Game Exists";
        $status = "warning";
        if($game->isEmpty())
        {
            $responseMessage = "Game Created";
            $status = "success";
            $request->user()->pokerGame()->create($validated);
            $game = $request->user()->pokerGame()->get();
        }
        return response(json_encode(['response' => $responseMessage, 'game' => $game, 'status' => $status]), 200);
    }

    /**
     * @param PokerGameUsersRequest $request
     * @return Response|Application|ResponseFactory
     */
    public function getGameUsers(PokerGameUsersRequest $request): Response|Application|ResponseFactory
    {

        $validated = $request->validated();
        $gameID = $request->input('poker_game_id');
        $game = PokerGame::find($gameID);
        $returnedUsers = UsersConnectedToPokerGame::where('poker_game_id', '=', $gameID)->cursor();
        $users = [];
        foreach ($returnedUsers as $key => $user)
        {
            $dbUser = User::find($user->user_id);
            $users[$key]['name'] = $dbUser->name;
        }
//        $users = UsersConnectedToPokerGame::all();
        $responseMessage = "ok";
        $status = "success";
        return response(json_encode(
            [
                'response' => $responseMessage,
                'game' => $game,
                'users' => $users,
                'status' => $status
            ]), 200);
    }
}
