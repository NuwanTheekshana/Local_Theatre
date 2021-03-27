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
                <div class="card-header">{{ __('Update User Details') }}</div>

                <div class="card-body" id="pending_com_card">
                       
                    <table id="pending_comment_tbl" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="15%">User Name</th>
                                <th width="15%">Address</th>
                                <th width="20%">City</th>
                                <th width="15%">Permission Type</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_users as $user)
                            <tr>
                                <td>{{$user->fullname}}</td>
                                <td>{{$user->Address}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->premission_type}}</td>
                                <td>
                                    <center>
                                        <Button class="btn btn-success btn_style" id="accept_btn" onclick="useredit('{{$user->id}}');" style="background-color: green"><i class="fa fa-pencil-square-o"></i> Edit</Button>
                                        <Button class="btn btn-danger btn_style" onclick="userremove('{{$user->id}}');" style="background-color: red"><i class="fa fa-trash"></i> Remove</Button>
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
<div id="user_update_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update User Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <form id="update_user_form">
                <div class="form-group row">
                    <label for="f_name" class="col-sm-4 col-form-label">First Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="f_name" name="f_name">
                      <input type="hidden" class="form-control" id="userid" name="userid">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="l_name" class="col-sm-4 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="l_name" name="l_name">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="user_gender" class="col-sm-4 col-form-label">Gender</label>
                  <div class="col-sm-8">
                      <select class="form-control" id="user_gender" name="user_gender">
                          <option value="M">Male</option>
                          <option value="F">Female</option>
                        </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="user_dob" class="col-sm-4 col-form-label">Date of Birth</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="user_dob" name="user_dob">
                  </div>
              </div>
    
                <div class="form-group row">
                    <label for="user_email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="user_add" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="user_add" name="user_add">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="user_city" class="col-sm-4 col-form-label">City</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="user_city" name="user_city">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="user_permission" class="col-sm-4 col-form-label">Permission</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="user_permission" name="user_permission">
                            <option value="admin">Admin User</option>
                            <option value="non_admin">Default User</option>
                          </select>
                    </div>
                  </div>
    
                      <button type="button" class="btn btn-primary pull-right" id="update_user_btn">Update User</button>
                 
                </form>
           
      </div>
  
    </div>
  </div>

@endsection
