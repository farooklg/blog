<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.create')->with('success', 'Category created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        $category = Category::findorfirst($id);
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('category.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findorfail($id);
        $category->name = $request->input('name');
        $category->update();
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findorfail();
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }



    public function admin()
    {
        $category = Category::all();
        return view('category.admin',compact('category'));
    }
}
