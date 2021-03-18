@extends('template.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($show as $item)
                <div class="col-4">
                    <img src="{{asset('storage/img/'.$show->images->image_url)}}" alt="" height="200px">
                </div>
            @endforeach
        </div>
    </div>
@endsection