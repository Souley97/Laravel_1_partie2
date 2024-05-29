<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <main class="container mt-6 mb-6">
        <div class="row mt-5">
            <div class="d-flex justify-content-between">
                <h2>Gestion Article</h2>
                <a href="/articles" class="btn btn-outline-primary">Retour</a>
            </div>

            <div class="col-lg-12 mt-5">
                @if ($article->image)
                    <img src="{{ asset('storage/blog/' . $article->image) }}" class="img-fluid" alt="{{ $article->nom }}">
                @endif
            </div>

            <div class="col-lg-12 mt-5">
                <table class="table table-bordered">
                    <tr>
                        <th>Nom :</th>
                        <td>{{ $article->nom }}</td>
                    </tr>
                    <tr>
                        <th>Description :</th>
                        <td>{{ $article->description }}</td>
                    </tr>
                    <tr>
                        <th>Date :</th>
                        <td>{{ $article->created_at }}</td>
                    </tr>
                </table>
            </div>

            <h2 class="mt-5">Commentaires</h2>
            @foreach($commentairs as $commentaire)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $commentaire->nom_complet_auteur }}</h5>
                        <p class="card-text">{{ $commentaire->contenu }}</p>
                        <p class="text-muted">{{ $commentaire->created_at->format('d/m/Y') }}</p>
                        <div class="d-flex">
                            <a href="{{ url('commentaire/' . $commentaire->id . '/edit') }}" class="btn btn-primary me-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ url('commentaire/' . $commentaire->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <h3 class="mt-5">Ajouter un commentaire</h3>
            <form action="{{ route('comments.store', $article->id) }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="nom_complet_auteur" class="form-label">Nom :</label>
                    <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Commentaire :</label>
                    <textarea id="contenu" name="contenu" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
