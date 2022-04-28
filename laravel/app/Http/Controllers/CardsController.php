<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Board;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CardsController extends Controller
{
    /**
     * Store a new created cards and redirect the user to the current board his Uuid.
     *
     * @param Request $request
     * @param Board $board
     * @param Column $column
     * @return RedirectResponse
     */
    public function store(Request $request, Board $board, Column $column)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam, 'create')) {
            abort(401, 'You cannot create card in this boards');
        }

        $number = $board->cards()->count();

        $number = ($number == null) ? $number = 0 : $number;

        Card::create([
            'name' => $validated['name'],
            'column_id' => $column->id,
            'count' => $number++,
            'description' => ''
        ]);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Board $board
     * @param Column $column
     * @param Card $card
     * @return RedirectResponse
     */
    public function destroy(Request $request, Board $board, Column $column, Card $card): RedirectResponse
    {
        $user = $request->user();

        if (
            !$user->hasTeamPermission($user->currentTeam, 'delete') ||
            !$user->belongsToTeam($board->team())
        ) {
            abort(401, 'You cannot delete this card');
        }

        $card->update([
            'archive' => false
        ]);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }


    /**
     * Move card position
     *
     * @param Request $request
     * @param Board $board
     * @param Column $column
     */
    public function moveCard(Request $request, Board $board, Column $column, Card $card){

        $validated = $request->validate([
            'prevCardId' => 'nullable|integer',
            'nextCardId' => 'nullable|integer',
        ]);

        if (!empty($validated['prevCardId']) || !empty($validated['nextCardId'])){
            if (empty($validated['prevCardId'])){
                $nextCard = Card::find($validated['nextCardId']);
                $card->moveBefore($nextCard);
            } else {
                $prevCard = Card::find($validated['prevCardId']);
                $card->moveAfter($prevCard);
            }
        }

        $card->update(['column_id' => $column->id]);

        return back(303);
    }
}
