<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Board;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CardsController extends Controller
{
    /**
     * Store a new created board and redirect the user to the created board using his Uuid.
     *
     * @param Request $request
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

        Card::create([
            'name' => $validated['name'],
            'column_id' => $column->id,
            'count' => $number++,
            'description' => ''
        ]);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }
}
