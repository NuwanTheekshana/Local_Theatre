@extends('layouts.app')

<style>
    .btn_style
{
       width: 100%;
       border-radius: 0px;
       z-index: 2;
       margin-bottom: 5px;
}
</style>

@section('content')
<div class="container" style="margin-bottom: 100%;">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Find Movie') }}</div>

                <div class="card-body" id="find_comment_card">
                       <form id="movie_find_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="movie_title" class="col-sm-2 col-form-label">Movie Title</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="movie_title" name="movie_title">
                                </div>
    
                                <label for="movie_year" class="col-sm-2 col-form-label">Movie Year</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="movie_year" name="movie_year">
                                        <option value="">Select Movie Year</option>
                                        @foreach ($movie_year as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="movie_genres" class="col-sm-2 col-form-label">Movie Genres</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="movie_genres" name="movie_genres">
                                </div>
    
                                <label for="movie_added_user" class="col-sm-2 col-form-label">Movie Added Users</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="movie_added_user" name="movie_added_user">
                                        <option value="">Select Admin User</option>
                                        @foreach ($admin_user as $admin_user)
                                        <option value="{{$admin_user->id}}">{{$admin_user->fullname}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>
                        
                   
                    </div>
                    
                    <center>
                        <button class="btn btn-success mt-3" type="button" id="find_movie_btn" style="background-color: green"><i class="fa fa-search"></i>&nbsp; Search</button>
                        <button class="btn btn-danger mt-3" type="reset" style="background-color: red"><i class="fa fa-repeat"></i>&nbsp; Reset</button>
                    </center>

                </form>

                </div>
            </div>




            <div class="card mt-3" id="movie_find_data_card">
                <div class="card-body">

                    <table id="find_movie_tbl" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th width="15%">Movie Title</th>
                                <th width="10%">Movie Year</th>
                                <th width="30%">Movie Summery</th>
                                <th width="15%">Movie Genres</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>

                    </table> 




                </div>
            </div>









        </div>
    </div>
</div>


<!--Movie Update Modal -->
<div id="update_movie_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Movie details update</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
         
            <form id="update_movie_form">
                <div class="form-group row">
                    <label for="update_movie_title" class="col-sm-4 col-form-label">Movie Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="update_movie_title" name="update_movie_title">
                      <input type="hidden" class="form-control" id="update_movie_id" name="update_movie_id">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="update_movie_year" class="col-sm-4 col-form-label">Movie Year</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="update_movie_year" name="update_movie_year">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="update_movie_summery" class="col-sm-4 col-form-label">Movie Summery</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="update_movie_summery" name="update_movie_summery"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="update_movie_genres" class="col-sm-4 col-form-label">Movie Genres</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="update_movie_genres" name="update_movie_genres">
                    </div>
                </div>
    
    
                      <button type="button" class="btn btn-primary pull-right" id="update_movie_btn">Update Movie</button>
                 
                </form>


        </div>
  
      </div>
  
    </div>
  </div>




@endsection
