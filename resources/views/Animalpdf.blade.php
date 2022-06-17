<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8"/>

<style>

body {
  font-family: Helvetica;
  margin:0px;
}


table, th, td {
  border:1px;
  border-spacing: 5px;
}

h1 {
    text-align: center;
    color: #F17B61;
    font-weight: 200;
    font-size: 52px;
}

h2 {
  text-align: center;
  color: #F17B61;
}


td {
  color: #BE5038;
  text-align: left;
}

div.footer {
    font-family: Helvetica;
    width: 100%;
    margin-left: -1px;
    padding: 0px;
    background: #BE5038;
    text-align: center;
    height: auto;
    width: 705px;
    padding-top: 4px;
    padding-bottom: 4px;
    color: #fff;
}

.footer-content {
  align-items: center;
}

.footer-bottom {
  align-items: center;
  font-size: 14px;
  word-spacing: 2px;
  text-transform: capitalize;
}



span.total {
    margin-top: 34px!important;
    display: block;
    background-color: #f17b6138;
    padding: 20px;
    border-radius: 7px;
}

h3 {
  color: #BE5038;
}

h4 {
  color: #BE5038;
}

hr {
    /* color: #a52a2a61; */
    border-bottom: 1px;
    border-left: 0px;
    border-top: 1px;
    border-color: #dfdfdf;
    border-style: dashed;
    border-width: 1px;
}

footer {
                position: fixed; 
                bottom: 0cm;
                 
                left: 0cm; 
                right: 0cm;
               
            }


</style>



<body>

<h1>{{$animal->name}}</h1>

<table style="width:140%">

  <tr>
    <td>Breed:</td>
    <td>         </td>
    <td><strong>{{$animal->breed->name}}</strong></td>
  </tr>

  <tr>
    <td>Age:</td>
    <td>         </td>
    <td><strong>{{$animal->age}}</strong></td>
  </tr>
  
  <tr>
    <td>Size:</td>
    <td>         </td>
    <td><strong>{{$log->size}} cm</strong></td>
  </tr>
  
  <tr>
    <td>Weight:</td>
    <td>         </td>
    <td><strong>{{$log->weight}}</strong> <strong>kg</strong></td>
  </tr>
  


  
  <tr>
    <td>Chipnumber:</td>
    <td>         </td>
    <td><strong>{{$animal->chipnumber}}4</strong></td>
  </tr>
  
  
  <tr>
    <td>Insurance number:</td>
    <td>         </td>
    <td><strong>{{$animal->insuranceNumber}}</strong></td>
  </tr>
  
</table>


<h2>Logs</h2>

@php
$total = 0;
@endphp

@foreach($logs as $log)



 <h3> Log van: {{$log->created_at->format('d-m-Y')}}</h3>
 <p> Weight: {{$log->weight}}</p>
 <p> Size: {{$log->size}}</p>
 
 <h4><strong>Medication:</strong></h4>
  @foreach($log->medication as $medication)

  <p>{{$medication->name}} - {{$medication->price}} EUR</p>
 
    @php
       $total = $total + $medication->price;
      
    @endphp
  @endforeach
@endforeach

<h4><span class='total'>Totaal medicatie: <b>{{$total}} EUR</b></span><h4>
  
  


</body>

<footer>
<div class='footer'>
  <div class="footer-content">
    <p>Copyright &copy;2022 Pethalk. designed by <span>Lotte</span> and <span>Yakup</span></p>
  </div>
 
</div>
</footer>
</html>