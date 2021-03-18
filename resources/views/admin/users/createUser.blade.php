@extends('template.main')

@section('content')

<div class="container">
    @if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul>
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul> 
        </div> 
    @endif

    <form action="/users" method="POST" enctype="multipart/form-data">
        @csrf
       
        <label for="">Name</label>
        <input type="text" value="{{old('name')}}" name="name" class="card-title">
        <label for="">Email</label>
        <input type="email" value="{{old('email')}}" name="email" class="card-title">
        <label for="">Age</label>
        <input type="number" value="{{old('age')}}" name="age" class="card-title">
        <label for="">Password</label>
        <input type="password" value="{{old('password')}}" name="password" id="">

        <div class="form-group container row mx-5"> 

            @foreach ($avatars as $avatar)
                <div class="input-group my-2 col-6">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" aria-label="Radio button for following text input" id="{{$avatar->id}}" value="{{$avatar->id}}" name="avatar_id">
                        </div>
                        @if ($avatar->id ==1)
                            <img src="{{asset('storage/img/'.$avatars[0]->avatar_url)}}" alt="" height="100px">
                        @else
                            <img src="{{asset('storage/img/'.$avatar->avatar_url)}}" alt="" height="100px">
                        @endif
                        
                    </div>
                </div>
            @endforeach  

        </div>

        <button type="submit"> Create </button>

    </form>
</div>
    
@endsection