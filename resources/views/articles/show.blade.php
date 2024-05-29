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

    </main>


    </div>
    </div>
    </div>
</body>

</html>
