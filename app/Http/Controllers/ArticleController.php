<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');

    }
    public function store(Request $request)
    {
        // Validation des champs de la requête
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'a_la_une' => 'boolean',

        ]);
        // Initialisation de la variable pour le chemin de l'image
        $image = null;
        // Vérifier si un fichier image est uploadé
        if ($request->hasFile('image')) {
            // Stocker l'image dans le répertoire 'public/blog'
            $chemin_image = $request->file('image')->store('public/blog');

            // Vérifier si le chemin de l'image est bien généré
            if (!$chemin_image) {
                return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image.');
            }

            // Récupérer le nom du fichier de l'image
            $image = basename($chemin_image);
        }

        // Créer un nouvel article
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $image; // Nom du fichier de l'image
        $article->a_la_une = $request->a_la_une;
        $article->save();

        return redirect()->route('article.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function show($id)
    {
        $article = article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));

    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'a_la_une' => 'boolean',

        ]);

        $article = Article::find($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($article->image) {
                Storage::delete('public/blog/' . $article->image);
            }

            // Stocker la nouvelle image
            $chemin_image = $request->file('image')->store('public/blog');
            $image = basename($chemin_image);
            $article->image = $image;
        }

        $article->nom = $request->nom;
        $article->description = $request->description;
        // $article->a_la_une = $request->a_la_une;


        $article->save();

        return redirect()->route('article.index')
            ->with('success', 'Article mis à jour avec succès.');
    }





}
