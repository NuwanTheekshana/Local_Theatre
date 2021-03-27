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
                <div class="card-header">{{ __('Find Comments') }}</div>

                <div class="card-body" id="find_comment_card">
                       <form id="comment_find_form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="movie_title" class="col-sm-2 col-form-label">Movie Title</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="movie_title" name="movie_title">
                                </div>
    
                                <label for="movie_status" class="col-sm-2 col-form-label">Movie Status</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="movie_status" name="movie_status">
                                        <option value="">Select Status</option>
                                        @foreach ($get_status as $status)
                                        <option value="{{$status}}">{{$status}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <label for="comment_added_user" class="col-sm-2 col-form-label">Comment added user</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="comment_added_user" name="comment_added_user">
                                </div>
    
                                <label for="comment_date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="comment_date" name="comment_date">
                                </div>
                            </div>
                        </div>
                        
                   
                    </div>
                    
                    <center>
                        <button class="btn btn-success mt-3" type="button" id="find_comment_btn" style="background-color: green"><i class="fa fa-search"></i>&nbsp; Search</button>
                        <button class="btn btn-danger mt-3" type="reset" style="background-color: red"><i class="fa fa-repeat"></i>&nbsp; Reset</button>
                    </center>

                </form>

                </div>
            </div>




            <div class="card mt-3">
                <div class="card-body">

                    <table id="find_comment_tbl" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="15%">Date</th>
                                <th width="15%">Movie Title</th>
                                <th width="25%">Comment</th>
                                <th width="15%">Comment Added User</th>
                                <th width="15%">Comment Status</th>
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



<!--Comment update Modal -->
<div id="update_movie_comment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Movie comment update</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         
            <form id="update_movie_comment_form">
                <div class="form-group row">
                    <label for="update_movie_title" class="col-sm-4 col-form-label">Movie Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="update_movie_title" name="update_movie_title" readonly>
                      <input type="hidden" class="form-control" id="update_movie_id" name="update_movie_id" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="update_movie_comment" class="col-sm-4 col-form-label">Comment</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="update_movie_comment" name="update_movie_comment"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="update_comment_user" class="col-sm-4 col-form-label">Added user</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="update_comment_user" name="update_comment_user" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="update_comment_status" class="col-sm-4 col-form-label">Comment Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="update_comment_status" name="update_comment_status">
                            <option value="Accept">Accept</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                </div>
    
    
                      <button type="button" class="btn btn-primary pull-right" id="update_comment_btn">Update Movie</button>
                 
                </form>










        </div>
     
      </div>
  
    </div>
  </div>

@endsection
