@extends('template.main')

@section('content')
    <div class="container mt-5">
        <form action="/categories" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Nom de la catégorie :</label>
                <input type="text" name="category_name" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection