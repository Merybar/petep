@extends ('layouts.layout')

@section('content')

    <h1>My Pets</h1>

    @foreach ($animals as $row)

    <div class="card" style="width: 18rem;">
        <h5 class="card-title"><img src='{{$row->Image}} ' class="card-img-top" alt="..."> {{$row->name}} </h5>
        <div class="card-body">
            <a href='/animal/{{$row->id}}' class="btn btn-primary">Details</a>
            <a href='/edit/animal/{{$row->id}}'  class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-primary">Delete</a>
        </div>
    </div>

    <br>

    @endforeach
    <a href='/add/animal'  class="btn btn-primary">Add a new pet</a>
        
@endsection