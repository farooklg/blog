<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::all();
        return view('Team.index', compact('team'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Team.create');
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
            $image->move(public_path('images'), $imageName);
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
        return view('Team.show', compact('team'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('Team.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request,  $id)
    {
        $team = findorfail($id);
        $team->member_team = $request->input('member_name');
        $team->member_role = $request->input('member_role');
        $team->member_message = $request->input('member_message');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
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

    public function admin()
    {
        $team = Team::all();
        return view('Team.admin', compact('team'));

    }
}
