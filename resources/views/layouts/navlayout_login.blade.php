<style>

    .carousel-item {
      height: 100vh;
      min-height: 350px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    
        .image
        {
        background: 
        /* top, transparent red, faked with gradient */ 
        linear-gradient(to top, rgba(90, 88, 90, 0), rgba(11, 1, 8, 5)),
        /* bottom, image */
        url('img/cover_img/set1.jpg');
        background-size: cover;
        }
        .image2
        {
        background: 
        /* top, transparent red, faked with gradient */ 
        linear-gradient(to top, rgba(90, 88, 90, 0), rgba(11, 1, 8, 5)),
        /* bottom, image */
        url('img/cover_img/set2.jpg');
        background-size: cover;
        }
        .image3
        {
        background: 
        /* top, transparent red, faked with gradient */ 
        linear-gradient(to top, rgba(90, 88, 90, 0), rgba(11, 1, 8, 5)),
        /* bottom, image */
        url('img/cover_img/set3.jpg');
        background-size: cover;
        }
    
        .display-4 {
      transition: opacity .25s ease-in-out;
      -moz-transition: opacity .25s ease-in-out;
      -webkit-transition: opacity .25s ease-in-out;
    }
    
     
    
    
    
    
    
    
    @media (max-width: 768px) {
    
    .navbar-nav {
        float:none;
        margin:0 auto;
        display: block;
        text-align: center;
    }
    
    .navbar-nav > li {
        display: inline-block;
        float:none;
    }
    
    }
    
    .select:hover
    {
        border-bottom: 5px solid orange;
        cursor: pointer;
    }

    .btnsignIn
    {
       width: 100%;
       border-radius: 0px;
       z-index: 2;
       margin-bottom: 5px;
       margin-left: 50%;
    }

    .btnsignup
    {
       width: 100%;
       border-radius: 0px;
       z-index: 2;
       margin-bottom: 5px;
    }
    
    
      </style>
       
       
       <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-default fixed-top" style="">
      <div class="container">
        <a class="navbar-brand" href="#" style="font-family: 'Sofia';font-weight:bold;color:orange;font-size:32px;">
            <i class="fa fa-film" style="font-size:32px;color:red"></i>
                        Local Theatre
                    </a>
    
                    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              
            @guest
            <li class="nav-item active">
              <a href="{{ url('/') }}" class="nav-link select" id="home" style="color:orange ;font-weight: bold;font-style: bold;font-size: 20px;">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
    
            <li class="nav-item ml-5">
                {{-- <a  style="color:orange ;font-weight: bold;font-size: 20px;" title="Profile">
             <span class="badge badge-pill" style="color:orangered"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
             </a> --}}
             

             <a href="{{ url('/login') }}" class="nav-link select" id="menu" style="color:orange ;font-weight: bold;font-size: 20px;">Login &nbsp;&nbsp;&nbsp;|</a>
            
            </li>
            <li class="nav-item">
             <a href="{{ url('/register') }}" class="nav-link select" id="menu" style="color:orange ;font-weight: bold;font-size: 20px;">Register</a>
          
            </li>

             </div>



             @else

             <li class="nav-item active">
              <a href="{{ url('/home') }}" class="nav-link select" id="home" style="color:orange ;font-weight: bold;font-style: bold;font-size: 20px;">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
    
            <li class="nav-item ml-5">

             @if (Auth::user()->premission_type == "admin")
             <li class="nav-item">
                 <a href="{{route('adminhome')}}" class="nav-link select" id="admin" style="color:orange ;font-weight: bold;font-size: 20px;">Admin Pannel</a>
             </li>
             @endif
             
             <li class="nav-item ml-5">
                 <a  style="color:orange ;font-weight: bold;font-size: 20px;cursor: pointer;" title="{{Auth::user()->fullname}}" data-toggle="modal" data-target="#profile_modal">
                  <span class="badge badge-pill" style="color:orangered"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
              </a>
             
             </li>

             @endguest

            
 

            
    
          </ul>
        </div>
      </div>
    </nav>

    @guest

    @else
             
    @include('layouts.profile_modal')
 
    @endguest