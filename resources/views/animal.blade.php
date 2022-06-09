<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <img src="{{Storage::url($animal->image)}}" alt="" style="width: 45px; margin:10px"> 
            {{ __('My Pets') }}
        </h2>
    </x-slot>

    <div class="row" style="display:flex; flex-wrap:wrap">
        <div class="card col-md-4" style="width: 25rem; margin:5px; background:white; position: relative; display:flex; flex-direction:column; word-wrap:break-word">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h3 class="card-title">Basic Info </h3> 
                    </div>
                    <div class="col-3">
                        <a href="#collapseInfo" data-bs-toggle="collapse" > hier</a>
                    </div>
                </div>
                <div id="collapseInfo">
                    <p class="card-text">
                        <b>Name:</b> {{$animal->name}} <br>
                        <b>Birthday:</b> {{$animal->age}} <br>
                        <b>Breed:</b> {{$animal->breed->name}} <br>
                        <b>Size:</b> {{$log->size}} <br>
                        <b>Weight:</b> {{$log->weight}} <br>
                        <b>Remarks:</b> {{$animal->remarks}}
                    </p>
                    <a href="/edit/pet/{{$animal->id}}"  class="btn btn-primary">Edit</a> 
                    <a href="/update/pet/{{$animal->id}}" class="btn btn-primary">Update</a> 
                    <a href="#" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    
        <br>
    
        <div class="card col-md-4" style="width: 25rem; margin:5px; background:white; position: relative; display:flex; flex-direction:column; word-wrap:break-word">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h3 class="card-title">Medication </h3>  
                    </div>
                    <div class="col-3">
                        <a href="#collapseMeds" data-bs-toggle="collapse"> hier</a>
                    </div>
                </div>
                <div id="collapseMeds">
                    @foreach ($log->medication as $row)
                        <p class="card-text">{{$row->name}} </p>
                    @endforeach
                    <a href="/edit/medication/{{$animal->id}}"  class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    
        <br>
    
        <div class="card col-md-4" style="width: 25rem; margin:5px; background:white; position: relative; display:flex; flex-direction:column; word-wrap:break-word">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h3 class="card-title">Graphs </h3> 
                    </div>
                    <div class="col-3">
                        <a href="#collapseGraph" data-bs-toggle="collapse"> hier</a>
                    </div>
                </div>
                <div id="collapseGraph">
                    <p class="card-text">  </p>
                    <a href="#" class="btn btn-primary">Weight</a>
                    <a href="#" class="btn btn-primary">Height</a> <br> <br>
                    <a href="#" class="btn btn-primary">BMI</a>
                    <a href="#" class="btn btn-primary">Meds</a>
                </div>
            </div>
        </div>
    </div>
    

        
</x-app-layout>


    