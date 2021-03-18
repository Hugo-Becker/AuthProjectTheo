@extends('template.main')

@section('content')
    <div class="container">
        <h1>Les images</h1>

        <a href="/images/create" class="btn btn-success">Ajouter des images</a>

        <div class="row mt-5">
            @foreach ($images as $img)
                <div class="col-4">
                    <a href="/images/{{$img->id}}"><img src="{{asset('storage/img/'.$img->image_url)}}" alt="" height="200px"></a> <br>
                    <div class="row">
                        <a href="/images/{{$img->id}}/edit" class="btn btn-warning">EDIT</a>
                        <form action="/images/{{$img->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection