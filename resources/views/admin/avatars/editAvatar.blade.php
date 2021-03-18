@extends('template.main')

@section('content')
    <div class="container mt-5 col-9">
        <h1>Update l'avatar</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/avatars/{{$edit->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nom de l'avatar : </label>
                <input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $edit->name}}">
            </div>

            <div class="form-group">
                <input type="file" name="avatar_url" id="">
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection