<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('Admin.Team.index', compact('team'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request, Team $team)
    {
        $team->member_name = $request->input('member_name');
        $team->member_role = $request->input('member_role');
        $team->member_message = $request->input('member_message');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/team', $imageName);
            $team->image = $imageName;
        }

        $team->save();
        return redirect()->route('team.index')->with('success', 'Team created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = Team::findorfail($id);
        return view('Admin.Team.show', compact('team'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::findorfail($id);
        return view('Admin.Team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request,  $id)
    {
        $team = Team::findorfail($id);
        $team->member_name = $request->input('member_name');
        $team->member_role = $request->input('member_role');
        $team->member_message = $request->input('member_message');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/team', $imageName);
            $team->image = $imageName;
        }


        $team->update();
        return redirect()->route('team.index')->with('success', 'Team updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findorfail($id);
        $team->delete();
        return redirect()->route('team.index')->with('success', 'Team deleted successfully');
    }

}


