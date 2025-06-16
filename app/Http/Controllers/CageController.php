<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cage;
class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cages = Cage::with('animals')->get();
        return view('cages.index', compact('cages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('cages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Cage::create($validated);

        return redirect()->route('cages.index')->with('success', 'Клетка создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    $cage->load('animals'); 
        $cage = Cage::with('animals')->findOrFail($id);
        return view('cages.show', compact('cage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cage = Cage::withCount('animals')->findOrFail($id);
        return view('cages.edit', compact('cage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cage = Cage::withCount('animals')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => ['required', 'integer', 'min:' . $cage->animals_count],
        ]);

        $cage->update($validated);

        return redirect()->route('cages.show', $cage->id)->with('success', 'Клетка обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cage = Cage::findOrFail($id);

        if ($cage->animals()->exists()) {
            return redirect()->route('cages.show', $cage->id)
                ->with('error', 'Нельзя удалить клетку, в которой есть животные.');
        }
        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Клетка удалена.');
    }

}
