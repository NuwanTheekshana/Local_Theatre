@extends('layouts.app')

@section('content')

<div class="container">


    {{--YTS API View --}}

      <div class="row">
        @for ($i = 0; $i < count($data); $i++)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
              <div class="card" style="background-color: transparent">    
                <div class="profile-card">
                    <div class="profile-img">
                        <img src="{{$data[$i]['large_cover_image']}}" style="max-height: 365px;max-width: 300px;" alt="Team Image"/>
                    </div>
                    <div class="profile-content">
                        <h2 class="title">{{$data[$i]['title']}}
                     
                            <span></span>
                        </h2>
                        <ul class="social-link">
                           <button type="button" style="cursor: pointer;" id="api_add_btn" data-toggle="modal" data-target="#addtopage_modal{{$data[$i]['id']}}" class="btn btn-dark viewbtn">Add to Page</button>
                        </ul>
                    </div>
                </div>


                </div>
              </div>




              <!-- Modal -->
<div id="addtopage_modal{{$data[$i]['id']}}" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Movie Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
          <form id="api_form" action="{{route('api_movie_submit')}}" method="POST">
          @csrf
          <div class="form-group row">
              <label class="control-label col-sm-4" for="m_title">Movie Title</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="m_title" name="m_title" value="{{$data[$i]['title']}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4" for="m_year">Movie Year</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="m_year" name="m_year" value="{{$data[$i]['year']}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4" for="m_summery">Movie Summery</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" id="m_summery" name="m_summery">{{$data[$i]['summary']}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4" for="m_genres">Movie Genres</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="m_genres" name="m_genres" value="{{implode(',', $data[$i]['genres'])}}">
              </div>
            </div>
            <input type="hidden" class="form-control" id="m_img_link" name="m_img_link" value="{{$data[$i]['medium_cover_image']}}">
            <input type="hidden" class="form-control" id="imdb_code" name="imdb_code" value="{{$data[$i]['imdb_code']}}">
            <input type="hidden" class="form-control" id="m_rating" name="m_rating" value="{{$data[$i]['rating']}}">
            

            <button type="submit" id="api_submit_btn" class="btn btn-success pull-right" style="background-color: green"><i class="fa fa-plus-circle"></i> Add</button>

          </form>

      </div>
     
    </div>

  </div>
</div>










      @endfor
    
      </div>

</div>




@endsection