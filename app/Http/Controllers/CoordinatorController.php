<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoordinatorController extends Controller
{
    public function showAllSocieties(Request $request)
    {
        $societies = Society::with('president')
            ->orderBy('name')
            ->paginate(25)
            ->through(function ($society) {
                return [
                    'id' => $society->id,
                    'name' => $society->name,
                    'isActive' => $society->is_active,
                    'president' => $society->president ? [
                        'id' => $society->president->id,
                        'name' => $society->president->name,
                        'email' => $society->president->email,
                    ] : null,
                ];
            });

        return Inertia::render('Coordinator', [
            'societies' => $societies,
        ]);
    }

    public function updateSocietyStatus(Request $request, Society $society)
    {
        $request->validate([
            'isActive' => 'required|boolean',
        ]);

        $society->update([
            'is_active' => $request->isActive,
        ]);

        $societies = Society::with('president')
            ->orderBy('name')
            ->paginate(25)
            ->through(function ($society) {
                return [
                    'id' => $society->id,
                    'name' => $society->name,
                    'isActive' => $society->is_active,
                    'president' => $society->president ? [
                        'id' => $society->president->id,
                        'name' => $society->president->name,
                        'email' => $society->president->email,
                    ] : null,
                ];
            });

        return Inertia::render('Coordinator', [
            'societies' => $societies,
        ]);
    }

}
