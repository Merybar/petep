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
    color: #888095;
    font-weight: 200;
    font-size: 52px;
}

h2 {
  text-align: center;
  color: #888095;
}


td {
  color: #342a4c;
  text-align: left;
}

div.footer {
    font-family: Helvetica;
    width: 100%;
    margin-left: -1px;
    padding: 0px;
    background: #342a4c;
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
    background-color: #888095;
    padding: 20px;
    border-radius: 7px;
}

h3 {
  color: #342a4c;
}

h4 {
  color: #342a4c;
}

h5 {
  color: #fff;
}

hr {
    /* color: #a52a2a61; */
    border-bottom: 1px;
    border-left: 0px;
    border-top: 1px;
    border-color: #342a4c;
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
    <td>Birthday:</td>
    <td>         </td>
    <td><strong>{{$animal->birthday}}</strong></td>
  </tr>

  <tr>
    <td>Age:</td>
    <td>         </td>
    <td><strong>{{$age}} old</strong></td>
  </tr>
  
  <tr>
    <td>Chipnumber:</td>
    <td>         </td>
    <td><strong>{{$animal->chipnumber}}</strong></td>
  </tr>
  
  
  <tr>
    <td>Insurance number:</td>
    <td>         </td>
    <td><strong>{{$animal->insuranceNumber}}</strong></td>
  </tr>

  @if (is_null($log))
  </table>  
  Add Logs to see the current size and weight of {{$animal->name}}
  @else
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
  </table>
  @endif

  <br>



<h2>Logs</h2>

@php
$total = 0;
@endphp

@if (is_null($log))
  You have not added any logs yet for {{$animal->name}}. 
@else  
  @foreach($logs as $log)

    <h3> Log van: {{$log->created_at->format('d-m-Y')}}</h3>
    <p> Weight: {{$log->weight}}</p>
    <p> Size: {{$log->size}}</p>

    <h4><strong>Medication:</strong></h4>

    @if (!$log->medication->isEmpty())
      @foreach($log->medication as $medication)
        <p>{{$medication->name}} - {{$medication->price}} EUR</p>
        @php
          $total = $total + $medication->price;
          
        @endphp
      @endforeach
    @else                                    
      <p>{{$animal->name}} was not taking any medication.</p>
    @endif
  @endforeach
@endif



<h5><span class='total'>Totaal medicatie prijs: <b>{{$total}} EUR</b></span><h5>
  
  


</body>

<footer>
<div class='footer'>
  <div class="footer-content">
    <p>Copyright &copy;2022 Pethalk. designed by <span>Lotte</span> and <span>Yakup</span></p>
  </div>
 
</div>
</footer>
</html>