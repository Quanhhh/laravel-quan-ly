<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('flowers.index', ['flowers' => Flower::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Flower $flowers)
    {
        // $flowers = DB::table('flowers')->get();
        return view('flowers.create', compact('flowers')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'origin' => 'required',
        ]);
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->input('image');
        $origin = $request->input('origin');
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        DB::table('flowers')->insert([
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'origin' => $origin
        ]);
        return redirect()->route('flowers.index')->with('success', 'Flower added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flower $flower)
    {
        return view('flowers.show', compact('flower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flower $flower)
    {
        return view('flowers.edit', [
            'flower' => $flower
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flower $flower)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->input('image');
        $origin = $request->input('origin');

        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'origin' => 'required'
        ]);

        $flower->update([
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'origin' => $origin
        ]);

        return redirect()->route('flowers.index')->with('success', 'Flower Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flower $flower)
    {
        $flower->delete();
        return redirect()->route('flowers.index')->with('success', 'Flower Data deleted successfully');
    }

// app/Http/Controllers/FlowersController.php
public function search(Request $request)
{
    $query = $request->input('query');
    $flowers = Flower::where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->paginate(10);

    return view('flowers.index', compact('flowers'))->with('query', $query);
}

}
