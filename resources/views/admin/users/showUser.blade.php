@extends('template.main')

@section('content')


<div class="container">

    <div class="card" style="width: 18rem;">

        @if ($show->avatar_id <=1)
            <img src="{{asset('storage/img/'.$avatar[0]->avatar_url)}}" class="card-img-top" alt="...">
        @else
            <img src="{{asset('storage/img/'. $show->avatars->avatar_url)}}" class="card-img-top" alt="...">
            
        @endif
        
        <div class="card-body">
          <h3 class="card-title">{{$show->name}}</h3>
          <h4 class="card-title">{{$show->email}}</h4>
          <h4 class="card-title">{{$show->age}}</h4>
          
          <a href="/users" class="btn btn-primary">GO BACK </a>
        </div>
    </div>

</div>





    
@endsection