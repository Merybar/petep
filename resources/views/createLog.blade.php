@extends ('layouts.layout')
@section('content')


<form method="post"  action="/logs">
    @csrf
    <div class="mb-3">
        <label for="InputAnimal" class="form-label">Choose an animal</label>
        <select name="animal" class="form-control">
            @foreach ($animals as $animal )
                <option value="{{"$animal->id"}}"> {{"$animal->name"}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="InputWeight" class="form-label">How much does your pet weigh in g</label>
        <input type="number" name="weight" class="form-control" id="InputWeight">
     </div>
    <div class="mb-3">
        <label for="InputSize" class="form-label">How large is your pet weigh in cm</label>
        <input type="number" name="size" class="form-control" id="InputSize">
    </div>
    {{--<div class="mb-3">
        <label for="InputMedication" class="form-label">Does your pet need medication?</label>
        <select name="medication" class="form-control">
            <option value="">Kies medicatie</option>
            @foreach ($medications as $medication )
                <option value="{{"$medication->id"}}"> {{"$medication->name"}}</option>
            @endforeach
        </select>
    </div>--}}
    <div class="mb-3">
        <label for="InputRemarks" class="form-label">Do you have any remarks?</label>
        <input type="text" class="form-control" name="remarks" id="InputRemarks">
    </div>
    
    <input type="submit" name="" id="" value="submit"  class="btn-btn primary mt-3">
  </form>
</div>


@endsection