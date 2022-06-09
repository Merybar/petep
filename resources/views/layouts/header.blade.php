<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <img src="{{URL::asset('/storage/logo.png')}}" alt="" width="60px"  class="d-inline-block align-text-top">
      <h1>Petchalk</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/animals" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              My Pets
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             {{-- @foreach ($animals as $row)
                <li><a class="dropdown-item" href="/animal/{{$row->id}}">{{$row->name}}</a></li>
              @endforeach--}}
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/animals">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</div>