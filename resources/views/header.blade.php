

{{-- ---------------------------------------- --}}
<div class="pb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/')}}">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (session()->has('name'))
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/list')}}">List</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/add_page')}}">Add</a>
                </li>         
                      
                @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login_page')}}">Login</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/registration_page')}}">registration</a>
                        </li> 
                @endif                          
            </ul>
            <ul class="d-flex navbar-nav pr-4  mb-2 mb-lg-0">
            
                @if (session()->has('name'))                        
                    <li class="nav-item">
                        <span class="nav-link">
                            <img src="{{asset("/storage/users/".session()->get('image'))}}"
                            class = "rounded-circle"
                            style ="width:40px ;height:40px;"
                            alt=""
                            >
                        </span>
                    </li>                  
                    <li class="nav-item">
                        <span class="nav-link">
                            {{session()->get('name')}}
                        </span>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                    </li>  
                @endif
            </ul>             
          </div>
        </div>
      </nav>
</div>