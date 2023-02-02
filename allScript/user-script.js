$(document).on('submit','#n_user',function(e){
    e.preventDefault();

    let fd = new FormData($('#n_user')[0]);
	let files = $('#avatar')[0].files;

    $.ajax({
        url:'ajax.php?action=new_user',
        method:'post',
        data: fd,
        contentType:false,
        processData:false,
        cache:false,

        success:function(data){
            if(data == 1){
                message('New user added Successfull!','success');
            }

            if(data == 2){
                message('Error Occur!','error');
            }
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });

});

$(document).on('click','#mod_user_btn',function(e){
    e.preventDefault();

    let user_id = $(this).attr('data-id');
    let job;
    

        $.ajax({
            url:'ajax.php?action=request_user_data',
            method:'post',
            data: {user_id : user_id},
            dataType:'json',

            success:function(data){
                $('#hidden_user_id').val(data.user_id);
                $('#ed_fname').val(data.fname);
                $('#ed_lname').val(data.lname);
                $('#ed_uname').val(data.uname);
                $("#hidden_avt").val(data.avatar);
                if(data.type == 1){
                    job = 'Administrator';
                }else{
                    job = 'Staff';
                }
                $('#data_ed_type').val(data.type);
                $('#data_ed_type').text(job);

            },

            error:function(xhr,status,error){
                alert(xhr.responseText);
            }

        });

    $('#editUserModal').modal('show');


});

$(document).on('submit','#edit_user_form',function(e){
    e.preventDefault();

    let fdd = new FormData($('#edit_user_form')[0]);
    let files = $('#new_avatar')[0].files;

    swal({
        title: "Are you sure you want Update this user?",
        text:'',
        icon: "info",
        buttons: true,
        dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){

                $.ajax({
                    url:'ajax.php?action=request_edit_user',
                    method:'post',
                    data: fdd,
                    contentType:false,
                    cache:false,
                    processData:false,
            
                    success:function(data){
                        if(data == 1){
                            message('User updated Successfully!','success');
                        }
                        if(data == 2){
                            message('Error Occur!','error');
                        }
                        if(data == 100){
                            message('Error Occur 101','error');
                        }
                    },
            
                    error:function(xhr,status,error){
                        alert(xhr.responseText);
                    }
            
                });
            }

        });

});


