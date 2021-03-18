@extends('template.main')

@section('content')





<div class="container">
  <a href="/users/create" class=" my-4 btn btn-success"> Ajouter un user</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Age</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->age}}</td>
                <td>
                    <a class="btn btn-primary" href="/users/{{$user->id}}"> Show </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="/users/{{$user->id}}/edit"> Edit </a>
                </td>
                <td>
                    <form action="/users/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"> Delete</button>
                    </form>
                </td>

              </tr>

                
            @endforeach

        
        </tbody>
      </table>
</div>


    
@endsection