<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentairController extends Controller
{
    public function store(Request $request, $articleId)
    {
        // Valide les champs de la requête : 'nom_complet_auteur' et 'contenu' sont requis
        $request->validate([
            'nom_complet_auteur' => 'required',
            'contenu' => 'required',
        ]);

        // Trouve l'article correspondant à l'ID fourni, ou échoue si l'article n'existe pas
        $article = Article::findOrFail($articleId);

        // Crée un nouveau commentaire associé à l'article trouvé
        // Les champs 'nom_complet_auteur' et 'contenu' sont remplis avec les données de la requête
        $article->commentaires()->create([
            'nom_complet_auteur' => $request->nom_complet_auteur,
            'contenu' => $request->contenu,
        ]);

        // Redirige vers la page de détails de l'article avec un message de succès
        return redirect()->route('article.details', $articleId)
            ->with('success', 'Commentaire ajouté avec succès.');
    }

}
