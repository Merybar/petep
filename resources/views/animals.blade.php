@extends ('layouts.layout')
@section('content')

<div class="row">
    @foreach ($animals as $row)
        <div class="card" style="width: 20rem; margin:2px">
            <div class="col-9">
                <h4 class="card-title" style="margin:2px"> {{$row->name}} </h4>
            </div>
            <div class="col-3">
                <a href="#collapse{{$row->id}}" data-bs-toggle="collapse" > hier</a>
            </div>
            <div class="card-body" id="collapse{{$row->id}}">
                <div class="row">
                    <div class="col-3">
                        <img src='{{Storage::url($row->image)}} ' class="card-img-top" alt="..." style="width: 50px;">
                    </div>
                    <div class="col-9">
                        {{--@foreach ($log->medication as $row)--}}
                            <p class="card-text">{{$row->name}} </p>
                        {{--@endforeach--}}
                    </div>
                </div>
                <br>
                <a href='/animal/{{$row->id}}' class="btn btn-primary">Details</a>
                <a href='/edit/animal/{{$row->id}}'  class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-primary">Delete</a>
            </div>
        </div>
        <br>

    @endforeach
</div>

<br><br><br>
<a href='/add/animal'  class="btn btn-primary">Add a new pet</a>

@endsection