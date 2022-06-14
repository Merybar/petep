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

<h1>Add Medication</h1>

  <form action="/action_page.php">
  
     <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="petname" type="text" placeholder="Petname" required>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="name" type="text" placeholder="Name" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="amount" type="text" placeholder="Amount" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="frequency" type="number" placeholder="Frequency" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="startdate" type="number" placeholder="startdate (medication)" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="enddate" type="number" placeholder="Enddate (medication)" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
     <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center"><input name="description" type="number" placeholder="Description" required></div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  
  
  
  
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
    <button>Add Medication</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  </form>

</body>
</html>