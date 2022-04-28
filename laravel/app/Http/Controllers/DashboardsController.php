<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Board;
use App\Models\Membership;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardsController extends Controller
{
    /**
     * Get boards and collaborateur for the current team
     * @TODO add link parameter in CardKanban
     * @TODO add identifiant for a kanban in CardKanban
     *
     */
    public function index(Request $request)
    {
        $boards = Board::where('team_id', Auth::user()->current_team_id)->orderBy('updated_at','DESC')->get();

        $team = $request->user()->currentTeam;

        return Inertia::render('Dashboard', [
            'boards' => $boards,
            'CollaborateUsers' => $team->users,
        ]);
    }
}
