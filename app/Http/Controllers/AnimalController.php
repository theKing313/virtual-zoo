<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cage;
use App\Models\Animal;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cages = Cage::with('animals')->get();
        return view('animals.create', compact('cages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'species' => 'required',
            'name' => 'required',
            'age' => 'required|integer|min:0',
            'description' => 'nullable',
            'cage_id' => 'required|exists:cages,id',
        ]);

        $cage = Cage::find($request->cage_id);

        if ($cage->animals()->count() >= $cage->capacity) {
            return back()->withErrors(['cage_id' => 'This cage is full.']);
        }

        Animal::create($request->all());

        return redirect()->route('cages.show', $cage->id)->with('success', 'Animal added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
