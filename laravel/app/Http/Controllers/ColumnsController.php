<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;


class ColumnsController extends Controller
{
    /**
     * Store a new created column and redirect the user to the created board using his Uuid.
     *
     * @param Request $request
     * @param Board $board
     * @return RedirectResponse
     */
    public function store(Request $request, Board $board)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $user = $request->user();

        if (!$user->hasTeamPermission($user->currentTeam, 'create')) {
            abort(401, 'You cannot create column in this boards');
        }

        Column::create([
            'name'=>$validated['name'],
            'board_id'=> $board->id
        ]);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Board $board
     * @param Column $column
     * @return RedirectResponse
     */
    public function destroy(Request $request, Board $board, Column $column): RedirectResponse
    {
        $user = $request->user();

        if (
            !$user->hasTeamPermission($user->currentTeam, 'delete') ||
            !$user->belongsToTeam($board->team())
        ) {
            abort(401, 'You cannot delete this column');
        }

        $column->update([
            'archive' => false
        ]);

        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }
}
