@extends('template.main')

@section('content')
    <div class="container mt-">
        <div class="card" style="width: 18rem;">

            <img src="{{asset('storage/img/'. $show->image_url)}}" class="card-img-top" alt="...">
             
            
            <div class="card-body">
              <h3 class="card-title">{{$show->category_name}}</h3>
              
              <div class="row justify-content-around">
                <a href="/downloadIMG/{{$show->id}}" class="btn btn-info">DOWNLOAD</a>
                <a href="/users" class="btn btn-primary">GO BACK </a>
              </div>
            </div>
        </div>
    </div>
@endsection