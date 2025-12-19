<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     *afficher la liste des todos
     */
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('statut') && $request->statut != '') {
            $query->where('statut', $request->statut);
        }

        $tasks = $query->orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     *e formulaire de création d'une todo
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     *enregistrer une nouvelle todo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:à faire,en cours,terminée',
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')
        ->with('success', 'Tâche créée avec succès.');
    }

    /**
     * une tache spécifique
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * le formulaire de modification d'une tache
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     *;odifier une tache
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'required|in:à faire,en cours,terminée',
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index')
        ->with('success', 'Tâche mise à jour avec succès.');
    }

    /**
     * Marquer une tache comme terminée
     */
    public function markAsCompleted(Task $task)
    {
        $task->update(['statut' => 'terminée']);
        return redirect()->route('tasks.index')
        ->with('success', 'Tâche marquée comme terminée.');
    }

    /**
     *supprimer une tache
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
        ->with('success', 'Tâche supprimée avec succès.');
    }
}
