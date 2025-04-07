<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::with('auteur')->get();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string',
            'auteur_id' => 'required|exists:auteurs,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $validated['image'] = 'images/' . $imageName; // Save path in DB
        }

        Livre::create($validated);

        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès.');
    }

    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    public function update(Request $request, Livre $livre)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'nullable|string',
            'auteur_id' => 'required|exists:auteurs,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $livre->update($data);

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
    }

    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }
}
