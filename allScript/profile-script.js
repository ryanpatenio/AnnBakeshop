$('#temp_avatar').change(function(e){
    e.preventDefault();
    let output_img = document.getElementById("display_avatar");
      output_img.src=URL.createObjectURL(event.target.files[0]);
        output_img.onload = function(){
          URL.revokeObjectURL(output_img.src);
        };
       
  });

  $(document).on('submit','#edit_profile_form',function(e){
    e.preventDefault();

    let fd = new FormData($(this)[0]);
    let file = $('#temp_avatar')[0].files;

    $.ajax({
        url:'ajax.php?action=request_edit_profile',
        method:'POST',
        data: fd,
        cache:false,
        contentType:false,
        processData:false,

        success:function(data){
            if(data == 1){
                message('Profile Update successfully!','success');
            }
            if(data == 100){
                message('Unexpected error 100!','error');
            }
            if(data == 200){
                message('Unexpected error 200!','error');
            }
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }
        

    });

  });

  $(document).on('submit','#prof_changePass_form',function(e){
    e.preventDefault();

    let thisForm = $(this);
    
    SavePassword(thisForm);


  });

 const SavePassword = (thisForm) =>{
    $.ajax({
        url:"ajax.php?action=request_edit_password",
        method:"POST",
        data:$(thisForm).serialize(),
        
        success:function(data){
           if(data == 1){
            message("Password Updated Successfully!",'success');
           }
           if(data == 200){
            message('Unexpected error 200!','error');
           }
           if(data == 300){
            message("Password Didn't Match!",'info');
           }
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
 }

$(document).on('keyup','#renewPassword',function(e){
    e.preventDefault();

    let newPass = $('#newPassword').val();
    let rePass = $(this).val();

    if(newPass != ''){
        if(newPass != rePass){
            $('#error_message').text('Password Not Match!');
            $('#error_message').attr('class','text-danger');
        }else{
            $('#error_message').text('Password Match!');
            $('#error_message').attr('class','text-success');
        }
    }else{
        $('#error_message').text('');
        $('error_message').attr('class','');
    }

});
$(document).on('keyup','#newPassword',function(e){
    e.preventDefault();

    let rePass = $('#renewPassword').val();
    let newPass = $(this).val();

    if(rePass != ''){
        if(rePass != newPass){
            $('#error_message').text('Password Not Match!');
            $('#error_message').attr('class','text-danger');
        }else{
            $('#error_message').text('Password Match!');
            $('#error_message').attr('class','text-success');
        }
    }
    else{
        $('#error_message').text('');
        $('error_message').attr('class','');
    }

});