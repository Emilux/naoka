<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ColumnsController extends Controller
{

    /**
     * Store a new created board and redirect the user to the created board using his Uuid.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Board $board)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);

        $user = $request->user();

        dd($validated);

        if (!$user->hasTeamPermission($user->currentTeam, 'create')) {
            abort(401, 'You cannot create column in this boards');
        }

        dd($request);

        $column = Column::create(
            $validated->only('name')
        );


        return Redirect::route('boards.show', ['board' => $board->uuid], 303);
    }
}
