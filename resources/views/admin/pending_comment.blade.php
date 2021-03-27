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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pending Movie Comments') }}</div>

                <div class="card-body" id="pending_com_card">
                       
                    <table id="pending_comment_tbl" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="15%">Date</th>
                                <th width="15%">Movie Title</th>
                                <th width="20%">Movie Comment</th>
                                <th width="15%">Request By</th>
                                <th width="15%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending_comment as $comment)
                            <tr>
                                <td>{{$comment->movie_comment_date}}</td>
                                <td>{{$comment->movie_title}}</td>
                                <td>{{$comment->movie_comment}}</td>
                                <td>{{$comment->movie_comment_user}}</td>
                                <td>{{$comment->movie_comment_status}}</td>
                                <td>
                                    <center>
                                        <Button class="btn btn-success btn_style" id="accept_btn" onclick="accept('{{$comment->id}}');" style="background-color: green">Accept</Button>
                                        <Button class="btn btn-warning btn_style" onclick="edii_update('{{$comment->id}}', '{{$comment->movie_title}}', '{{$comment->movie_comment}}')" style="background-color: orange">Edit & Accept</Button>
                                        <Button class="btn btn-danger btn_style" onclick="reject('{{$comment->id}}');" style="background-color: red">Reject</Button>
                                        
                                    </center>
                                  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table> 



                </div>
            </div>
        </div>
    </div>
</div>


<!--Update Modal -->
<div id="update_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update comment modal</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <form id="form_update">

            <div class="form-group row">
                <label for="update_movie_title" class="col-sm-4 col-form-label">Movie Title</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="update_movie_title" name="update_movie_title">
                  <input type="hidden" name="update_id" id="update_id">
                </div>
              </div>

              <div class="form-group row">
                <label for="update_movie_title" class="col-sm-4 col-form-label">Movie Comment</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" id="update_movie_comment" name="update_movie_comment"></textarea>
                </div>
              </div>

         
        </div>

        <div class="mb-3">
            <center>
                <button type="button" class="btn btn-warning" id="update_cmt_btn" style="background-color: orange">Update & Accept</button>
            </center>
        </div>

    </form>
           
      </div>
  
    </div>
  </div>

@endsection
