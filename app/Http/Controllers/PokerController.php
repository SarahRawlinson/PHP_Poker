<?php

namespace App\Http\Controllers;

use App\Models\PokerGame;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PokerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('poker.create');
    }

    /**
     * Display the specified resource.
     *
     * @param PokerGame $poker
     * @return Application|Factory|View
     */
    public function show(PokerGame $poker): Application|Factory|View
    {
        return view('poker.create', compact('poker'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id): Application|View|Factory
    {
        return view('poker.create',[PokerGame::find($id)]);
    }



}
