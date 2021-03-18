@extends('template.main')

@section('content')


<div class="container">

    <div class="card" style="width: 18rem;">

        {{-- @if ($show->avatar_id <=1)
            <img src="{{asset('storage/img/'.$avatar[0]->avatar_url)}}" class="card-img-top" alt="...">
        @else
            <img src="{{asset('storage/img/'. $show->avatars->avatar_url)}}" class="card-img-top" alt="...">
            
        @endif --}}
        @if ($errors->any()) 
            <div class="alert alert-danger"> 
            <ul> @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
            @endforeach </ul> 
            </div> 
        @endif


        
        
        <div class="card-body">
            <form action="/users/{{$edit->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <input type="text" value="{{$edit->name}}" name="name" class="card-title">
                <input type="email" value="{{$edit->email}}" name="email" class="card-title">
                <input type="number" value="{{$edit->age}}" name="age" class="card-title">

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

                <button type="submit"> Update </button>

            </form>



          
        </div>
    </div>

</div>





    
@endsection