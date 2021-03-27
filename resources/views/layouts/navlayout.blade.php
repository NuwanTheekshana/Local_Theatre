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
            <i class="fa fa-film" style="font-size:32px;color:red"></i><i class="fa fa-film" style="font-size:32px;color:red"></i>
                        Local Theatre
                    </a>
    
                    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              
            <li class="nav-item active">
              <a class="nav-link select" id="home" style="color:orange ;font-weight: bold;font-style: bold;font-size: 20px;">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link select" id="menu" style="color:orange ;font-weight: bold;font-size: 20px;">Browse Movies</a>
            </li>
    
            <li class="nav-item ml-5">
                {{-- <a  style="color:orange ;font-weight: bold;font-size: 20px;" title="Profile">
             <span class="badge badge-pill" style="color:orangered"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
             </a> --}}
             <a href="{{ url('/login') }}" class="nav-link select" id="menu" style="color:orange ;font-weight: bold;font-size: 20px;">Login &nbsp;&nbsp;&nbsp;|</a>
            
            </li>
            <li class="nav-item">
             <a class="nav-link select" id="menu" style="color:orange ;font-weight: bold;font-size: 20px;">Register</a>
          
            </li>
    
          </ul>
        </div>
      </div>
    </nav>
    
    
    
    
    
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active image" style="">
            <div class="carousel-caption d-none d-md-block" style="top: 60%;transform: translateY(-60%);">
              <h2 class="display-4" style="font-family: 'Sofia';font-weight: bold">Welcome to the Local Theatre Website</h2>
              <p class="lead" style="text-transform: uppercase;font-weight: bold" >Share your experience with us.</p>
              <br><br>
              <button class="btn btn-orange" id="menucoverbtn1" style="background-color:orange">VIEW MOVIES</button>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item image2" style="">
            <div class="carousel-caption d-none d-md-block" style="top: 60%;transform: translateY(-60%);">
              <h2 class="display-4" style="font-family: 'Sofia';font-weight: bold;">Welcome to the Local Theatre Website</h2>
              <p class="lead" style="text-transform: uppercase;font-weight: bold">Share your experience with us.</p>
              <button class="btn btn-danger mt-5" id="menucoverbtn2" style="background-color:red">VIEW MOVIES</button>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item image3" style="">
            <div class="carousel-caption d-none d-md-block" style="top: 60%;transform: translateY(-60%);">
              <h2 class="display-4" style="font-family: 'Sofia';font-weight: bold">Welcome to the Local Theatre Website</h2>
              <p class="lead" style="text-transform: uppercase;font-weight: bold">Share your experience with us.</p>
              <button class="btn btn-dark mt-5" id="menucoverbtn3" style="background-color:blue;">VIEW MOVIES</button>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
    </header>
    
    