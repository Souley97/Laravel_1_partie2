<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
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

    public function destroy($id)
    {

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return back();

        // return redirect('/articles')->with('success', 'Commentaire Supprime avec succès');

    }

    public function edit($id)
    {

        $commentaire = Commentaire::findOrFail($id);

        return view('commentaires.edit', compact('commentaire'));

    }


    /**
     * Enregistre la modification dans la base de données
     */
    public function update(Request $request, $id)
    {
        // Valider les champs de la requête : 'nom_complet_auteur' et 'contenu' sont requis
        $request->validate([
            'nom_complet_auteur' => 'required',
            'contenu' => 'required',
        ]);

        // Trouver le commentaire correspondant à l'ID fourni
        $commentaire = Commentaire::find($id);

        // Mettre à jour les champs du commentaire avec les nouvelles données de la requête
        $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
        $commentaire->contenu = $request->contenu;

        // Enregistrer les modifications dans la base de données
        $commentaire->save();

        // Rediriger l'utilisateur vers la page précédente avec un message de succès
        return redirect()->route('article.details', $commentaire->id_article);
    }

}
