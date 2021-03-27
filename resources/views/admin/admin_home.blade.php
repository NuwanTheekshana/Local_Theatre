@extends('layouts.app')

@section('content')


<div class="container" style="margin-bottom: 100%;">
    <center>

   
        <div class="col-10">
            <div class="card bg-dark">
                <div class="card-header">Movie Dashboad</div>
                <div class="card-body">
                   

                    <div class="card-deck">
                        <div class="card bg-dark border-danger h-75 d-inline-block">
                          <div class="card-body bg-dark">
                            <h5 class="card-title"><center><b>Total Added Movies</b></center></h5>
                            <center>
                                <h1>
                                   {{$total_added_movie_count}}
                                </h1>
                            </center>
                            
                          </div>
                        </div>
                        <div class="card border-primary h-75 d-inline-block">
                          <div class="card-body bg-dark">
                            <h5 class="card-title"><center><b>Pending Comments</b></center></h5>
                            <center>
                                <h1>
                                    {{$pending_comment_count}}
                                </h1>
                            </center>
                            
                          </div>
                        </div>
                      
                      </div>


                </div>
            </div>
        </div>


        
<div class="col-10 mt-3">
    <div class="card bg-dark">
        <div class="card-header">Movies</div>
        <div class="card-body">
           
             
    <div class="card bg-dark mb-3" style="background-color: transparent">
        <div class="card-body">
            
            <div class="row">
                @foreach ($find_movies as $movie)
                <div class="col-sm-8 col-md-6 col-lg-4 mt-3">
                    <div class="card" style="background-color: transparent">
                       
                    <div class="profile-card">
                        <div class="profile-img">
                            <img src="{{ asset($movie->movie_image_path) }}" style="max-height: 365px;max-width: 300px;" alt="Movie Image"/>
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
         

        </div>
    </div>
</div>


</center>








</div>




@endsection
