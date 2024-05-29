<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">


    <main class="mt-6 container mb-6">
        <div class="row mt-5 ">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

                <div class="row mt-5 ">
                    <div class="col-lg-11">
                        <h2>Gestion Article</h2>
                    </div>
                    <div class="col-lg-1">
                        <a href="/articles" class="btn btn-outline-primary">Retour</a>
                    </div>
                </div>

                <div class="col">
                    @if ($article->image)
                        <img src="{{ asset('storage/blog/' . $article->image) }}" width="100" height="600"
                            class="card-img-top" alt="{{ $article->nom }}">
                    @endif
                </div>

                <table class="table table-bordered">

                    <tr>
                        <th>Nom :</th>
                        <td>{{ $article->nom }}</td>
                    </tr>

                    <tr>

                        <th>Description:</th>
                        <td>{{ $article->description }}</td>

                    </tr>


                    </tr>

                    <tr>

                        <th>Date:</th>
                        <td>{{ $article->created_at }}</td>

                    </tr>

                </table>
            </div>
            <h1>{{ $article->nom }}</h1>
            <p>{{ $article->description }}</p>


    <h2>Commentaires</h2>
    @foreach($commentairs as $commentair)
        <div>
            <h4>{{ $commentair->nom_complet_auteur }}</h4>
            <p>{{ $commentair->contenu }}</p>
            <small>{{ $commentair->created_at->format('d/m/Y H:i') }}</small>
            <form action="{{ url('commentaire/' . $commentair->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endforeach

    <h3>Ajouter un commentaire</h3>
    <form action="{{ route('comments.store', $article->id) }}" method="POST">
        @csrf
        <div>
            <label for="nom_complet_auteur">Nom :</label>
            <input type="text" id="nom_complet_auteur" name="nom_complet_auteur" required>
        </div>
        <div>
            <label for="contenu">Commentaire :</label>
            <textarea id="contenu" name="contenu" required></textarea>
        </div>
        <button type="submit">Ajouter</button>
    </form>

    </main>


    </div>
    </div>
    </div>
</body>

</html>
