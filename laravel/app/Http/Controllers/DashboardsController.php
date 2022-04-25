<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Board;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;

class DashboardsController extends Controller
{
    /**
     * Get All Team for a users
     */
    public function index()
    {
        $boards = Board::where('team_id', Auth::user()->current_team_id)->orderBy('updated_at')->get();
        // dd($boards);
        return Inertia::render('Dashboard', [
            'boards' => $boards
        ]);
    }
}
