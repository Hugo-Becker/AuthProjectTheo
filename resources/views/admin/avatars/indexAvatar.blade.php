@extends('template.main')

@section('content')
    <div class="mt-5 col-9">
        <h1>Les avatars</h1>

        @if (count($avatars)>4)
            <a href="/avatars/create" class="btn btn-success my-2" style="display: none">Ajouter un avatar</a>
        @else
            <a href="/avatars/create" class="btn btn-success my-2">Ajouter un avatar</a>
        @endif
        <div class="mt-5 row">
            @foreach ($avatars as $avatar)
                <div class="card col-3 m-2" style="width: 18rem;">
                    <div class="text-center">
                        @if ($avatar->id ==1)
                            <img src="{{asset('storage/img/'.$avatars[0]->avatar_url)}}" alt="" class="img-fluid">
                        @else
                            <img src="{{asset('storage/img/'.$avatar->avatar_url)}}" alt="" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$avatar->name}}</h5>
                        
                            <div class="row justify-content-around">
                                <a href="/avatars/{{$avatar->id}}/edit" class="btn btn-warning">EDIT</a>

                                @if ($avatar->id == 1)
                                    <form action="/avatars/{{$avatar->id}}" method="POST" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                @else
                                    <form action="/avatars/{{$avatar->id}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection