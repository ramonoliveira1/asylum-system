<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se o usuário for administrador, vê todas as visitas
        if (auth()->user()->isAdmin()) {
            $visits = Visit::with(['user', 'resident'])->paginate(10);
        } else {
            // Caso contrário, só vê as visitas dele
            $visits = Visit::with(['user', 'resident'])
                ->where('user_id', auth()->id())
                ->paginate(10);
        }

        return view('visits.index', compact('visits'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = auth()->user()->isAdmin() ? User::all() : null; // Apenas admins recebem todos os usuários
        $residents = Resident::all();
        return view('visits.create', compact('users', 'residents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'resident_id' => 'required|exists:residents,id',
            'visit_date' => 'required|date',
        ]);

        Visit::create($validated);

        return redirect()->route('visits.index')->with('success', 'Visita agendada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        return view('visits.show', compact('visit'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        $residents = Resident::all();
        return view('visits.edit', compact('visit', 'residents'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        $validated = $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'visit_date' => 'required|date',
        ]);

        $visit->update($validated);

        return redirect()->route('visits.index')->with('success', 'Visita atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();

        return redirect()->route('visits.index')->with('success', 'Visita excluída com sucesso!');
    }
}
