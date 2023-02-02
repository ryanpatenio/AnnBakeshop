$(document).ready(function(){

	$(document).on('submit','#newCustomer',function(e){
		e.preventDefault();

		$.ajax({
			url:'ajax.php?action=add_cust',
			method:'post',
			data:$(this).serialize(),

			success:function(data){
				
				if(data == 1){
					message('New Customer added Successfully!','success');
				}
				if(data == 2){
					message('Unexpected Error!','success');
				}
			},

			error:function(xhr,status,error){
				alert(xhr.responseText);
			}


		});


	});

	$(document).on('click','#edit_cust_btn',function(e){
		e.preventDefault();
		let ID = $(this).attr('data-id');

		$.ajax({
			url:'ajax.php?action=request_data_cust',
			method:'post',
            data:{ID : ID},
			dataType:'json',
			
			success:function(data){
					
				$('#hidden_customer_id').val(data.customer_id);
				$('#editCustomerName').val(data.name);
				$('#editContact').val(data.contact);
				$('#editAddress').val(data.address);
				$('#editCustomer').modal('show');
			},

			error:function(xhr,status,error){
				alert(xhr.responseText);
			}
		});


	});

	$(document).on('submit','#updateCus',function(e){
		e.preventDefault();
		var ThisForm = $(this);

		swal({
			title: "Are you sure you want Update this Customer Details?",
			text:'Please Click the `OK` Button to Continue!',
			icon: "info",
			buttons: true,
			dangerMode: true,
			}).then((willconfirmed) => {

				if(willconfirmed){
					$.ajax({
						url:'ajax.php?action=update_cust',
						method:'post',
						data: $(this).serialize(),

						success:function(data){
							if(data == 1){
								message('Customer Updated Successfully!','success')
							}
							if(data == 2){
								message('Unexpected Error!','error');
							}
							resetForm(ThisForm);
						},

						error:function(xhr,status,error){
							alert(xhr.responseText);

						}



					});

				}
			});


	});


});