<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class BoardsController extends Controller
{

    /**
     * Show the form for creating a new Board.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Boards/Create');
    }

    /**
     * Store a new created board and redirect the user to the created board using his Uuid.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);

        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam,'create')){
            abort(401, 'You cannot create board in this team');
        }

        $board = Board::create(
            $request->only('name')
        );

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }

    /**
     * Display the board using his Uuid.
     *
     * @param Board $board
     * @return Response
     */
    public function show(Request $request, Board $board): Response
    {
        $user = $request->user();


        if (!$user->hasTeamPermission($user->currentTeam,'read')){
            abort(401, 'You cannot read this board');
        }

        if (!$user->belongsToTeam($board->team())){
            abort(401, 'You cannot read this board');
        }

        $columns = $board->columns();


        $cards = $board->cards();

        

        dd($cards);


        return Inertia::render('Boards/Show', ['board' => $board, 'columns' => $columns, 'cards' => $cards]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
