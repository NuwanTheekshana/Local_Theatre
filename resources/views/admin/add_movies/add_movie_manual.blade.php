@extends('layouts.app')

@section('content')

<div class="container" style="margin-bottom: 100%;">

        <div class="card mt-4">
          <div class="card-header">{{ __('Insert Movie') }}</div>
            <div class="card-body">

                <form action="{{url('/admin/insert_movie_db')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                      <label for="movie_title" class="col-sm-4 col-form-label">Movie Title</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="movie_title" name="movie_title">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="movie_year" class="col-sm-4 col-form-label">Year</label>
                        <div class="col-sm-2">
                          <input type="number" class="form-control" id="movie_year" name="movie_year">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="movie_imdb_rate" class="col-sm-4 col-form-label">Imdb Rate</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="movie_imdb_rate" name="movie_imdb_rate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="movie_summary" class="col-sm-4 col-form-label">Movie Summery</label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="movie_summary" name="movie_summary"></textarea>
                        </div>
                    </div>
                      
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-4 col-form-label">Genres</label>
                      <div class="col-sm-8">
                        <div class="form-check">
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres1" name="genres[]" value="Comedy">
                                <label class="form-check-label" for="Genres1">Comedy</label>  
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres2" name="genres[]" value="Crime">
                                <label class="form-check-label" for="Genres2">Crime</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres3" name="genres[]" value="Thriller">
                                <label class="form-check-label" for="Genres3">Thriller</label>
                            </div>
                            <div></div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres4" name="genres[]" value="Drama">
                                <label class="form-check-label" for="Genres4">Drama</label>  
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres5" name="genres[]" value="Music">
                                <label class="form-check-label" for="Genres5">Music</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres6" name="genres[]" value="Romance">
                                <label class="form-check-label" for="Genres6">Romance</label>
                            </div>

                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres7" name="genres[]" value="Documentary">
                                <label class="form-check-label" for="Genres7">Documentary</label>
                            </div>

                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres8" name="genres[]" value="Biography">
                                <label class="form-check-label" for="Genres8">Biography</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres9" name="genres[]" value="History">
                                <label class="form-check-label" for="Genres9">History</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres10" name="genres[]" value="Action">
                                <label class="form-check-label" for="Genres10">Action</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres11" name="genres[]" value="Horror">
                                <label class="form-check-label" for="Genres11">Horror</label>
                            </div>
                            <div class="checkbox-inline">
                                <input class="form-check-input" type="checkbox" id="Genres12" name="genres[]" value="Adventure">
                                <label class="form-check-label" for="Genres12">Adventure</label>
                            </div>
                            
                            
                          </div>
                          
                      </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="movie_image" class="col-sm-4 col-form-label">Movie Image</label>
                        <div class="col-sm-4">
                          <input type="file" class="form-control" id="movie_image" name="movie_image">
                        </div>
                    </div>
                  
                    <div class="form-group mt-5">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" style="margin-left: 85%"> Insert Movie</button>
                      </div>
                    </div>
                  </form>


            </div>
        </div>


        
@endsection