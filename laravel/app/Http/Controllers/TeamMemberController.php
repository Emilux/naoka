<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamMemberController
{

    public function updateColor(Request $request, Team $team, User $user){
        Gate::forUser($request->user())->authorize('updateTeamMember', $team);

        Validator::make([
            'color' => $request->color,
        ], [
            'color' => ['required', 'string', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3}|[A-Fa-f0-9]{8})$/'],
        ])->validate();

        $team->users()->updateExistingPivot($user->id, [
            'color' => $request->color
        ]);

        return back(303);
    }

}
