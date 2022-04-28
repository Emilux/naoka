<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Card;
use Illuminate\Database\Eloquent\Collection;
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
     * @param Request $request
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
            'identifier' => ['nullable','max:5', 'regex:/^[a-zA-Z]*$/'],
        ]);

        if (empty($validated['identifier']))
            $validated['identifier'] = $this->generateIdentifier($validated['name']);

        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam, 'create')) {
            abort(401, 'You cannot create board in this team');
        }

        $board = Board::create($validated);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }

    /**
     * Display the board using his Uuid.
     *
     * @param Request $request
     * @param Board $board
     * @return Response
     */
    public function show(Request $request, Board $board): Response
    {
        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam,'read')){
            abort(401, 'You cannot read this board');
        }

        if (!$user->belongsToTeam($board->team())) {
            abort(401, 'You cannot read this board');
        }

        return Inertia::render('Boards/Show', ['board' => $board, 'columns' => $board->columns()->with('cards')->get()]);
    }

    /**
     * Show the form for editing a board.
     *
     * @param Request $request
     * @param Board $board
     * @return Response
     */
    public function edit(Request $request, Board $board): Response
    {
        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam,'edit')){
            abort(401, 'You cannot read this board');
        }

        if (!$user->belongsToTeam($board->team())){
            abort(401, 'You cannot read this board');
        }

        return Inertia::render('Boards/Edit', ['board' => $board]);
    }

    /**
     * Update the board.
     *
     * @param Request $request
     * @param Board $board
     * @return RedirectResponse
     */
    public function update(Request $request, Board $board): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'identifier' => 'required|max:5|regex:/^[a-zA-Z]*$/i',
        ]);

        $user = $request->user();

        if (
            !$user->hasTeamPermission($user->currentTeam,'edit')
        ){
            abort(401, 'You cannot edit board in this team');
        }

        $board->update(
            $validated
        );

        return Redirect::route('dashboard', [], 303);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Board $board
     * @return RedirectResponse
     */
    public function destroy(Request $request, Board $board): RedirectResponse
    {
        $user = $request->user();

        if (
            !$user->hasTeamPermission($user->currentTeam,'delete') ||
            !$user->belongsToTeam($board->team())
        ){
            abort(401, 'You cannot delete this board');
        }

        $board->delete();

        return Redirect::route('dashboard', 303);
    }

    /**
     * Generate an 1 or 2 character(s) long identifier from a string
     *
     * @param String $string
     * @return string
     */
    private function generateIdentifier($string): string
    {
        $name = explode(' ',preg_replace('/[^a-zA-Z ]/', '', $string));
        return substr($name[0], 0,1).(count($name) > 1 ? substr(end($name), 0, 1) : '');
    }
}
