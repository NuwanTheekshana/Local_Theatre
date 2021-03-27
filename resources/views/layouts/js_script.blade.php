
<script>

    $("#menu").click(function() {
    $('html, body').animate({
        scrollTop: $("#menulist").offset().top
    }, 1500);
});

 $("#home").click(function() {
    $('html, body').animate({
        scrollTop: $('body').offset().top
    }, 1500);
});


$("#menucoverbtn1").click(function() {
    $('html, body').animate({
        scrollTop: $("#menulist").offset().top
    }, 1500);
});
$("#menucoverbtn2").click(function() {
    $('html, body').animate({
        scrollTop: $("#menulist").offset().top
    }, 1500);
});
$("#menucoverbtn3").click(function() {
    $('html, body').animate({
        scrollTop: $("#menulist").offset().top
    }, 1500);
});

</script>


<script>
  $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll < 300){
            $('.fixed-top').css('background', 'transparent');
        } else{
            $('.fixed-top').css('background', 'rgba(6, 0, 6, 0.7)');
        }
    });
</script>


<script>
    $('#update_pro_btn').click(function () 
    {
        let profile_form = $('#profile_form');

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/update_user_profile")}}',
        data:profile_form.serialize(),
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#profile_modal').modal('hide');
        },
        error:function(error) 
        {
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });

    })
</script>

<script>
    $('#change_pass_btn').click(function () 
    {
        let pass_change_form = $('#pass_change_form');

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/update_user_password")}}',
        data:pass_change_form.serialize(),
        success:function(data)
        {
            if (data.errors) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;'+data.errors,
                {
                    type: 'danger',
                    width: 450,
                    delay: 5000,  
        
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;
            }
            else
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
                {
                    type: 'success',
                    width: 450,
                    delay: 5000,  
        
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $('#profile_modal').modal('hide');
            }
        },
        error:function(error) 
        {
            var password_error = error.responseJSON.errors.password[0];
            var new_pass_error = error.responseJSON.errors.new_pass[0];
            var confirm_pass_error = error.responseJSON.errors.confirm_pass[0];

            if (password_error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;'+password_error,
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });  
            }

            if (new_pass_error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;'+new_pass_error,
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            if (confirm_pass_error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;'+confirm_pass_error,
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });  
            }

            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });  
            }
            
        }

        });

    })
</script> 


<script>
    $('#submit_comment').click(function () 
    {
       var movie_comment = $('#movie_comment').val();
       var id = $('#movie_ids').val();

       if (movie_comment == "") 
       {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Please enter your feedback..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
       }

       $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/add_comment")}}',
        data:{id:id, movie_comment:movie_comment},
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#movie_comment').val('');
        },
        error:function(error) 
        {
            console.log(error);
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });

    });
</script>

<script>
    function accept(id) 
    {
        var confirm = window.confirm("Do you want to accept this request?");
        if (confirm) 
        {}
        else
        {return false}

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/accept_comment")}}',
        data:{id:id},
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#pending_com_card').load(location.href+" #pending_com_card>*","");
        },
        error:function(error) 
        {
            console.log(error);
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });
        
        
    }
</script>

<script>
    function edii_update(id, title, comment) 
    {
        $('#update_id').val(id);
        $('#update_movie_title').val(title);
        $('#update_movie_comment').val(comment);
        $('#update_modal').modal('show');
    }
</script>

<script>
    $('#update_cmt_btn').click(function () 
    {
        var update_form = $('#form_update');
        var update_movie_title = $('#update_movie_title').val();
        var update_movie_comment = $('#update_movie_comment').val();

        if (update_movie_title == "" || update_movie_comment == "") 
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;All fields are required..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;  
        }

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/update_accept_comment")}}',
        data:update_form.serialize(),
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#pending_com_card').load(location.href+" #pending_com_card>*","");
            $('#update_modal').modal('hide');
        },
        error:function(error) 
        {
            console.log(error);
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });

    });
</script>

<script>
    function reject(id) 
    {
        var confirm = window.confirm("Do you want to reject this request?");
        if (confirm) 
        {}
        else
        {return false}

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/reject_comment")}}',
        data:{id:id},
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#pending_com_card').load(location.href+" #pending_com_card>*","");
        },
        error:function(error) 
        {
            console.log(error);
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });
        
        
    }
</script>

<script>
    function useredit(id) 
    {
        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("find_user_details")}}',
        data:{id:id},
        success:function(data)
        {
            $('#userid').val(data.find_user.id);
            $('#f_name').val(data.find_user.fname);
            $('#l_name').val(data.find_user.lname);
            $('#user_gender').val(data.find_user.gender);
            $('#user_dob').val(data.find_user.DOB);
            $('#email').val(data.find_user.email);
            $('#user_add').val(data.find_user.Address);
            $('#user_city').val(data.find_user.city);
            $('#user_permission').val(data.find_user.premission_type);
            $('#user_update_modal').modal('show');
        },
        error:function(error) 
        {
            if (error) 
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });

    }
</script>

<script>
    $('#update_user_btn').click(function () 
    {
        let user_form = $('#update_user_form').serialize();

         $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("update_user_details")}}',
        data:user_form,
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#pending_com_card').load(location.href+" #pending_com_card>*","");
            $('#user_update_modal').modal('hide');
        },
        error:function(error) 
        {
            if (error) 
            {
                console.log(error);
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });
    });
</script>

<script>
    function userremove(id) 
    {
        var confirm_remove = window.confirm("Do you want to remove this user ?");

        if (confirm_remove) 
        {
            $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("remove_user")}}',
            data:{id:id},
            success:function(data)
            {
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
                {
                    type: 'success',
                    width: 450,
                    delay: 5000,  
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

        }
    }
</script>

<script>
    $('#find_comment_btn').click(function () 
    {
        let find_data_form = $('#comment_find_form').serialize();

        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("find_comment_data")}}',
            data:find_data_form,
            success:function(jsonData)
            {
                // find comment details
                console.log(jsonData.data);
                $("#find_comment_tbl").dataTable().fnDestroy();
                var myDataTable =  $('#find_comment_tbl').DataTable({
                data  :  jsonData.data,
                columns : 
                [
                { data : "movie_comment_date" },
                { data : "movie_title" },
                { data : "movie_comment" },
                { data : "movie_comment_user" },
                { data : "movie_comment_status" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center><button onclick=editcomment('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-edit'></i>&nbsp;Edit</button> <button onclick=removecomment('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i> Remove</button> </center>"
                }},

                ],
           
             });



            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

    });
</script>

<script>
    function editcomment(id) 
    {
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("update_movie_comment")}}',
            data:{id:id},
            success:function(data)
            {
                
                $('#update_movie_title').val(data.find_comment.movie_title);
                $('#update_movie_id').val(data.find_comment.id);
                $('#update_movie_comment').val(data.find_comment.movie_comment);
                $('#update_comment_user').val(data.find_comment.movie_comment_user);
                $('#update_comment_status').val(data.find_comment.movie_comment_status);
                $('#update_movie_comment_modal').modal('show');
            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });
        
    }
</script>

<script>
    $('#update_comment_btn').click(function () 
    {
        let update_movie_comment_form = $('#update_movie_comment_form').serialize();
        let update_movie_title = $('#update_movie_title').val();
        let update_movie_id = $('#update_movie_id').val();
        let update_movie_comment = $('#update_movie_comment').val();
        let update_comment_user = $('#update_comment_user').val();
        let update_comment_status = $('#update_comment_status').val();

        if (update_movie_title == "" || update_movie_id == "" || update_movie_comment == "" || update_comment_user == "" || update_comment_status == "") {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;All fields are required..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false; 
        }

         $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("update_comment_details")}}',
        data:update_movie_comment_form,
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#find_comment_tbl').load(location.href+" #find_comment_tbl>*","");
            $('#update_movie_comment_modal').modal('hide');
        },
        error:function(error) 
        {
            if (error) 
            {
                console.log(error);
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });
    });
</script>


<script>
    function removecomment(id) 
    {
        var confirm = window.confirm("Do you want to remove this comment?");
        if (confirm) 
        {
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("remove_movie_comment")}}',
            data:{id:id},
            success:function(jsonData)
            {
                // success status
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+jsonData.success,
                    {
                        type: 'success',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false; 

            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

        }
        else
        {
            return false;
        }
    }
</script>




<script>
    $('#find_movie_btn').click(function () 
    {
        let movie_find_form = $('#movie_find_form').serialize();

        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("find_movie_data")}}',
            data:movie_find_form,
            success:function(jsonData)
            {
                // find comment details
                console.log(jsonData.data);
                $("#find_movie_tbl").dataTable().fnDestroy();
                var myDataTable =  $('#find_movie_tbl').DataTable({
                data  :  jsonData.data,
                columns : 
                [
                { data : "created_at" },
                { data : "movie_title" },
                { data : "movie_year" },
                { data : "movie_summary" },
                { data : "movie_genres" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center><button onclick=editmovie('"+row.id+"'); class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-edit'></i>&nbsp;Edit</button> <button onclick=removemovie('"+row.id+"'); class='btn btn-danger btn-sm btn_style' style='background-color:red;'><i class='fa fa-trash'></i> Remove</button> </center>"
                }},

                ],
           
             });



            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

    });
</script>


<script>
    function editmovie(id) 
    {
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("find_movie_val")}}',
            data:{id:id},
            success:function(data)
            {
                $('#update_movie_id').val(data.value.id);
                $('#update_movie_title').val(data.value.movie_title);
                $('#update_movie_year').val(data.value.movie_year);
                $('#update_movie_summery').val(data.value.movie_summary);
                $('#update_movie_genres').val(data.value.movie_genres);
                $('#update_movie_modal').modal('show');
            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

    }
</script>



<script>
    function removemovie(id) 
    {
        var confirm = window.confirm("Do you want to remove this movie?");
        if (confirm) 
        {

        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("remove_movie")}}',
            data:{id:id},
            success:function(jsonData)
            {
                // success status
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+jsonData.success,
                    {
                        type: 'success',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false; 

            },
            error:function(error) 
            {
                if (error) 
                {
                    console.log(error);
                    $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                    {
                        type: 'danger',
                        width: 550,
                        delay: 5000,  
        
                    });
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return false;   
                }
            }

            });

        }
        else
        {return false}
    }
</script>

<script>
    $('#update_movie_btn').click(function () 
    {
        let movie_form = $('#update_movie_form').serialize();
        let update_movie_title = $('#update_movie_title').val();
        let update_movie_year = $('#update_movie_year').val();
        let update_movie_summery = $('#update_movie_summery').val();
        let update_movie_genres = $('#update_movie_genres').val();
        
        if (update_movie_title == "" || update_movie_year == "" || update_movie_summery == "" || update_movie_genres == "") {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;All fields are required..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false; 
        }

         $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("update_movie_details")}}',
        data:movie_form,
        success:function(data)
        {
            $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Success&nbsp;!&nbsp;'+data.success,
            {
                type: 'success',
                width: 450,
                delay: 5000,  
    
            });
            window.scrollTo({ top: 0, behavior: 'smooth' });
            $('#find_movie_tbl').load(location.href+" #find_movie_tbl>*","");
            $('#update_movie_modal').modal('hide');
        },
        error:function(error) 
        {
            if (error) 
            {
                console.log(error);
                $.bootstrapGrowl('<span class = "fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Something went wrong. please check and try again..!',
                {
                    type: 'danger',
                    width: 550,
                    delay: 5000,  
    
                });
                window.scrollTo({ top: 0, behavior: 'smooth' });
                return false;   
            }
        }

        });
    });
</script>