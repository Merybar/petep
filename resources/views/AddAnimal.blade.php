<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>


<style>

input[type="date"] {
    padding: 40px;
}

input[type="text"] {
    padding: 12px;
}

input[type="number"] {
    padding: 12px;
}


h1 {
text-align: center;
color: brown;
}

p {
text-align: center;
}

div {
text-align: center;

}



input.placeholder {
    text-align: center;
}
input {
	border-radius: 10px;
}

button {
	border-radius: 10px;
}



</style>
<body>

<h1>Add a pet</h1>

  <form action="/action_page.php">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="name" type="text" placeholder="Name" required value="{{ old('name') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
   <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="pettype" type="text" placeholder="Pet type" required value="{{ old('pettype') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="breed" type="text" placeholder="Breed" required value="{{ old('breed') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="age" type="number" placeholder="Age" required value="{{ old('birthday') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="weight" type="number" placeholder="Weight (kg)" required value="{{ old('weight') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="size" type="number" placeholder="Size" required value="{{ old('size') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
     <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="chipnumber" type="number" placeholder="Chip number" required value="{{ old('chipnumber') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  
       <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="insurancenumber" type="text" placeholder="Insurancenumber" required value="{{ old('insurancenumber') }}"></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
    <button type="submit">Add Medication</button>
    <button>Add Pet</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  </form>

</body>
</html>