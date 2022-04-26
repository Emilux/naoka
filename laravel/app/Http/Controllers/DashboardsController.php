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
    public function index()
    {
        $boards = Board::where('team_id', Auth::user()->current_team_id)->orderBy('updated_at')->get();
        $users = DB::table('team_user')
                ->join('users', function ($join) {
                    $join
                        ->on('team_user.id', '=', 'users.id')
                        ->where('team_user.team_id', '=', Auth::user()->current_team_id);
                })
                ->select('users.name', 'users.profile_photo_path')
                ->get();

        return Inertia::render('Dashboard', [
            'boards' => $boards,
            'CollaborateUsers' => $users,
        ]);
    }
}
