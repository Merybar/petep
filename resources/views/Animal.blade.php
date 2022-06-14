<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px;
}

table {

}
</style>
<body>

<h2>Basic info</h2>

@section('content')
<h1>Welcome.blade.php</h1>







@endsection

<table style="width:100%">

  <tr>
    <td>Birthday:</td>
    <td><strong>date</strong></td>
  </tr>
  
  <tr>
    <td>Size:</td>
    <td><strong>50 cm</strong></td>
  </tr>
  
    <tr>
    <td>Weight:</td>
    <td><strong>19 kg</strong></td>
  </tr>
  
  
    <tr>
    <td>BMI:</td>
    <td><strong>75</strong></td>
  </tr>
  
  
    <tr>
    <td>Chipnumber:</td>
    <td><strong>123456789474</strong></td>
  </tr>
  
  
    <tr>
    <td>Insuranc enumber:</td>
    <td><strong>234434534</strong></td>
  </tr>
  
</table>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
    <button>Edit</button>
    <button>Update</button>
    <button>Delete</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>


<h2>Medication</h2>

<table style="width:100%">

  <tr>
    <td><strong>Antibiotica</strong></td>
    <td><strong>2 maal per dag</strong></td>
  </tr>
  
  <tr>
    <td><strong>Dafalgan</strong></td>
    <td><strong>3 maal per dag</strong></td>
  </tr>
  
</table>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
    <button>Edit</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  
  
  <h2>BMI</h2>
  
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
    <button>Weight</button>
    <button>Height</button>
    <button>BMI</button>
    <button>Meds</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>
  

<p>To undestand the example better, we have added borders to the table.</p>
@foreach ($Animals as $Animal)
 {{$Animal->name}}<hr>
   
@endforeach
</body>
</html>

