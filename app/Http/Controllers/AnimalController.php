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
        $animals = Animal::with('cage')->get();
        return view('animals.index', compact('animals'));
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
        $animal = Animal::with('cage')->findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::findOrFail($id);
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'cage_id' => 'required|exists:cages,id',
        ]);

        $animal = Animal::findOrFail($id);
        $animal->update($validated);

        return redirect()->route('animals.index')->with('success', 'Животное обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Животное удалено');
    }
}
