<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Team;

use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::all();
        $about = About::first();
        return view('About.index', compact('about','team'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request, About $about)
    {
        $about->company_history = $request->input('company_history');
        $about->mission_vision = $request->input('mission_vision');
        $about->phone_number = $request->input('phone_number');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
                $about->save();
        return redirect()->route('about.index')->with('success', 'About created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = About::first();
        return view('about.show', compact('about'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('about.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request,  $id)
    {
        $about->company_history = $request->input('company_history');
        $about->mission_vision = $request->input('mission_vision');
        $about->email = $request->input('email');
        $about->address = $request->input('address');
        $about->update();
        return redirect()->route('about.index')->with('success', 'About updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::first();
        $about->delete();
        return redirect()->route('about.index')->with('success', 'About deleted successfully');
    }



    public function userindex(){
        $team = Team::all();
        $about = About::first();
        return view('about.home', compact('about','team'));
    }
}
