<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('admin.pages.teams.index', compact('teams'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        //
    }

    public function update(Request $request, Team $team)
    {
        //
    }

    public function destroy(Team $team)
    {
        //
    }
}
