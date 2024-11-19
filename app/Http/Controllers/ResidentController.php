<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::paginate(10); // Paginação de 10 itens
        return view('residents.index', compact('residents'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('residents.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
        ]);

        Resident::create($validated);

        return redirect()->route('residents.index')->with('success', 'Morador cadastrado com sucesso!');
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
    public function edit(Resident $resident)
    {
        return view('residents.edit', compact('resident'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
        ]);

        $resident->update($validated);

        return redirect()->route('residents.index')->with('success', 'Morador atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Morador excluído com sucesso!');
    }

}
