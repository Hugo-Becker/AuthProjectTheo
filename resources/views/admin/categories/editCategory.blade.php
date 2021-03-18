@extends('template.main')

@section('content')
    <div class="container mt-5">
        <form action="/categories/{{$edit->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="">Nom de la catégorie :</label>
                <input type="text" name="category_name" class="form-control" value="{{$edit->category_name}}">
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection