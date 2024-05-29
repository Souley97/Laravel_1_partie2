<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
// Spécifie les attributs pouvant être assignés en masse
protected $fillable = ['nom', 'description', 'image', 'a_la_une'];

// Définit la relation entre l'article et les commentaires
public function commentaires()
{
    // Indique qu'un article peut avoir plusieurs commentaires
    // Utilise la clé étrangère 'id_article' pour établir la relation
    return $this->hasMany(Commentaire::class, 'id_article');
}

}
