@extends('template.main')

@section('content')
    <div class="container">
          <h1>Les catégories</h1>

        <a href="/categories/create" class=" my-4 btn btn-success"> Ajouter une catégorie</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a class="btn btn-primary" href="/categories/{{$category->id}}"> Show </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/categories/{{$category->id}}/edit"> Edit </a>
                        </td>
                        <td>
                            <form action="/categories/{{$category->id}}" method="POST">
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