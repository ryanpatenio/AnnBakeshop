$(document).ready(function(){

	$(document).on('submit','#addcat',function(e){
		e.preventDefault();

		$.ajax({
			url:'ajax.php?action=addcat',
			method:'post',
			data:$(this).serialize(),

			success:function(data){
				if(data == 1){
					message('New Category added Successfully!',"success");					
				}

				if(data == 2){
					message('Unexpected Error!',"error");
				}
			},
			error:function(error,xhr,status){
				alert(xhr.responseText);
			}



		});


	});

	$(document).on('click','#edit_cat_btn',function(e){
		e.preventDefault();



		let ID = $(this).attr('data-id');

			$.ajax({
				url:'ajax.php?action=request_data_cat',
				method:'post',
				data:{ID : ID},
				dataType:'json',

				success:function(data){
					
					$('#hidden_cat_id').val(data.cat_id);
					$('#upCatName').val(data.name);
					$('#editCat').modal('show');
				},
				error:function(error,xhr,status){
					alert(xhr.responseText);
				}

			});
		

	});

	$(document).on('submit','#upcat',function(e){
		e.preventDefault();


		swal({
			title: "Are you sure you want Update this Category?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){

					$.ajax({
						url:'ajax.php?action=updateCat',
						method:"post",
						data:$(this).serialize(),
			
						success:function(data){
							if(data == 1){
								message('Category updated Successfully!','success')
							}
							if(data == 2){
								message('An error occur!','error')
							}
										
						},
						error:function(error,status,xhr){
							alert(xhr.responseText);
						}
			
					});

				}
			});

	});

});