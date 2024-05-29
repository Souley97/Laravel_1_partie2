<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD Blog</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gestion Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-success mb-3">Ajoute Article</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">

                    @if($article->image)
                        <img src="{{ asset('storage/blog/' . $article->image) }}" class="card-img-top "   height="250"   alt="{{ $article->nom }}">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image placeholder">
                    @endif
                    <div class="card-body">
                        <div class="row mt-1 ">
                            <div class="col-lg-7">
                                <h5 class="card-title">{{ $article->nom }}</h5>
                            </div>
                            <div class="col-lg-4">
                                <span class="card-text">{{ $article->created_at}}</span> <br>
                            </div>
                        </div>

                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text">{{ $article->a_la_une ? 'A la une' : 'No a la une' }}</p>
                        <a href="{{ url('article/' . $article->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ url('article/' . $article->id . '/edit') }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ url('article/' . $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Inclure les fichiers JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
