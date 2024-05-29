<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Article</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Modifier un Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('article/' . $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" value="{{ old('nom', $article->nom) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description', $article->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if ($article->image)
                <div>
                    <img src="{{ asset('storage/blog/' . $article->image) }}" alt="{{ $article->nom }}" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control mt-2" id="image">
        </div>
        {{-- <div>
            <label for="a_la_une">L'article est-il à la une</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="a_la_une" id="oui" value="1">
              <label class="form-check-label" for="oui">
                Oui
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="a_la_une" id="non" value="0">
              <label class="form-check-label" for="non">
                Non
              </label>
            </div>
        </div> --}}
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<!-- Inclure les fichiers JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
