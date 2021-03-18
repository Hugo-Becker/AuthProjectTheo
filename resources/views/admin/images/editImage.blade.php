@extends('template.main')

@section('content')
    <div class="container mt-5">
        <h1>Update l'image</h1>

        @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <ul>
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul> 
            </div> 
        @endif

        <form action="/images/{{$edit->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="file" name="image_url" id="">
            </div>
            <div class="form-group">
                <select name="category_id" id="">
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection