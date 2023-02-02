$(document).ready(function(){


	$(document).on('submit','#addP',function(e){
		e.preventDefault();

		let fd = new FormData($('#addP')[0]);
		let files = $('#avatar')[0].files;

		$.ajax({
			url:'ajax.php?action=add_p',
			method:'post',
			data:fd,
			contentType:false,
            processData:false,
            cache:false,

			success:function(data){

				if(data == 1){
					message('New Product added Successfully!','success');
				}
				if(data == 2){
					message("Unexpected Error!",'error');
				}
			},

			error:function(error,xhr,status){
				alert(xhr.responseText);
			}


		});


	});


	$(document).on('click','#edit_prod',function(e){
		e.preventDefault();

		let prod_id = $(this).attr('data-id');


		if(prod_id !=''){
			$.ajax({
				url:'ajax.php?action=get_prod',
				method:'post',
				data:{prod_id : prod_id},
				dataType:'json',

				success:function(data){
				
					$('#hidden_prod_id').val(data.prod_id);
					$('#edit_prodName').val(data.prod_name);
					$('#edit_prodPrice').val(data.prod_price);
					$('#edit_prodDesc').val(data.prod_desc);
					$('#hidden_cat_id').val(data.cat_id);

					$('#old_avatar').val(data.avatar);

					$('#hidden_cat_id').text(data.name);
					$('#editModal').modal('show');
					
				},
				error:function(xhr,status,error){
					alert(xhr.responseText);
				}


			});
		}

	});

	$(document).on('submit','#editP',function(e){
		e.preventDefault();

		let fd = new FormData($('#editP')[0]);
		let files = $('#edit_avatar')[0].files;

		swal({
			title: "Are you sure you want Update this Product?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){
					$.ajax({
						url:'ajax.php?action=edit_p',
						method:'post',
						data:fd,
						contentType:false,
			            processData:false,
			            cache:false,

						success:function(data){
							
							if(data == 1){
								message('Product Updated Successfully!','success');
							}
							if(data == 2){
								message('Unexpected Error!','error');
							}
						},

						error:function(error,xhr,status){
							alert(error.responseText);
						}


					});
				}

			});


	});

});