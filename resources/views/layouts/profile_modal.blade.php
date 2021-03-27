

    <!--Profile Modal -->
    <div id="profile_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Profile Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#change_password">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#logout">Log out</a>
                      </li>         
                </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="profile">
    
            <div class="mt-3">
      
                <form id="profile_form">
                <div class="form-group row">
                    
                    <label for="prof_name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="prof_name" value="{{Auth::user()->fullname}}" disabled>
                      <input type="hidden" class="form-control" id="pro_id" name="id" value="{{Auth::user()->id}}">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="pro_add" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pro_add" name="pro_add" value="{{Auth::user()->Address}}">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="pro_city" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="pro_city" name="pro_city" value="{{Auth::user()->city}}">
                    </div>
                  </div>
    
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-primary pull-right" id="update_pro_btn">Update Profile</button>
                  </div>
                 
                </form>
            </div>
               
    
    
        </div>
    
            {{-- change password view --}}
            <div class="tab-pane container fade" id="change_password">
    
                <div class="mt-3">
                    <form id="pass_change_form">
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="password" name="password">
                      <input type="hidden" class="form-control" id="id_pass_id" name="id_pass_id" value="{{Auth::user()->id}}">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="new_pass" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="new_pass" name="new_pass">
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="confirm_pass" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="confirm_pass" name="confirm_pass">
                    </div>
                  </div>
    
    
                    <div class="col-sm-6">
                        <button type="button" id="change_pass_btn" class="btn btn-danger pull-right mr-2">Change Password</button>
                    </div>  
    
                </form>
                </div>
    
            </div>
            
            {{-- Logout view --}}
            <div class="tab-pane container" id="logout">
    
                <div class="col-sm-6 mt-3">
                    <p>Are you sure do you want to logout this page ?</p>
                    <button class="btn btn-danger" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Yes, Logout</button>
                    <button class="btn btn-warning" style="background-color: orange" data-dismiss="modal">No</button> 
                </div>  
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            
            </div>
    
          </div>
    
    
          
    </div>
    
      
        </div>
      </div>
    
    
    </div>