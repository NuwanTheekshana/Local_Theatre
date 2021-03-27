@extends('layouts.app1')

@section('content')


{{-- @extends('layouts.nav') --}}
@extends('layouts.navlayout')

@section('title')
Home
@endsection



@section('content')

<div id="menulist"></div>

<!-- Page Content -->
 <div class="container">
<section class="py-5">
 
    <h1 class="mt-5" style="font-family: 'Aclonica';text-align:center;" id="menulist"><i class="fa fa-film" style="font-size:32px;color:red;"></i> Movies</h1>
    
    
    <div class="card bg-dark mb-3" style="background-color: transparent">
        <div class="card-body">
            
            <div class="row">
                @foreach ($find_movies as $movie)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                    <div class="card" style="background-color: transparent">
                       
                    <div class="profile-card">
                        <div class="profile-img">
                            <img src="{{ asset($movie->movie_image_path) }}" style="max-height: 365px;max-width: 300px;" alt="Team Image"/>
                        </div>
                        <div class="profile-content">
                            <h2 class="title">{{$movie->movie_title}}
                                <span>{{$movie->movie_genres}}</span>
                            </h2>
                            <ul class="social-link">
                                <a href="{{url('movie_view')}}/{{$movie->id}}"><button class="btn btn-dark viewbtn">View Details</button></a>
                            </ul>
                        </div>
                    </div>


                    </div>
                </div>
                @endforeach

            </div>
  
        </div>
    </div>

</section>


{{-- 
<br><br>
<div id="servicedetails"></div> --}}

 

{{-- <br><br>
<div id="contactdetails"></div> --}}

</div>




@endsection





@endsection







