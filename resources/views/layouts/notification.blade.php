
{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> --}}

{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script> --}}
<script src="{{ asset('js/1jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.bootstrap-growl.min.js') }}"></script>




@if ($message = Session::get('success'))


<script type="text/javascript">

$(document).ready(function()
{

$.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;{{ $message }}',
{
    type: 'success',
    width: 500,
    delay: 5000,  

});

});

</script>

@endif  




@if (Session::get('errors'))


@foreach ($errors->all() as $error)
               
          

<script type="text/javascript">

$(document).ready(function()
{

$.bootstrapGrowl(' <span class = "fa fa-exclamation-triangle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;{{ $error }}',
{
    type: 'danger',
    width: 500,
    delay: 10000,  

});

});

</script>

@endforeach

@endif 


