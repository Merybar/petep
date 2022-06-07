@extends ('layouts.layout')

@section('content')

    <h1> <img src="{{$animal->image}}" alt=""> {{$animal->name}}  </h1>
    

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title">Basic Info </h3> 
        
        <p class="card-text">
            <b>Birthday:</b> {{$animal->age}} <br>
            <b>Breed:</b> {{$animal->breed->name}} <br>
            <b>Remarks:</b> {{$animal->remarks}}
        </p>
        <a href="/edit/pet/{{$animal->id}}"  class="btn btn-primary">Edit</a> 
        <a href="/update/pet/{{$animal->id}}" class="btn btn-primary">Update</a> 
        <a href="#" class="btn btn-primary">Delete</a>
       
    </div>
    </div>

    <br>

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title">Medication </h3> 
        {{--<p class="card-text">{{$row->medication}} </p>--}}
        <a href="/edit/medication/{{$animal->id}}"  class="btn btn-primary">Edit</a>
    </div>
    </div>

    <br>

    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title">Graphs </h3> 
        <p class="card-text">  </p>
    <a href="#" class="btn btn-primary">Weight</a>
    <a href="#" class="btn btn-primary">Height</a> <br> <br>
    <a href="#" class="btn btn-primary">BMI</a>
    <a href="#" class="btn btn-primary">Meds</a>
    </div>
    </div>

    
@endsection