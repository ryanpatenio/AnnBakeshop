$(document).on('click','#btn_view_transaction',function(e){
    e.preventDefault();

    let trans_id = $(this).attr('data-id');

    $.ajax({
        url:'ajax.php?action=request_trans_data',
        method:'post',
        data:{trans_id : trans_id},
        dataType:'json',

        success:function (data) {
            $('#hidden_od_id').val(data.od_id);
            $('#od_code').text(data.od_code);
            $('#od_date').text(": "+data.od_date);
            $('#od_name').text(": "+data.name);
            
            $('#viewModal').modal('show');
            load_myTable();
            total_cash_ex();
        },

        error:function(error,status,xhr){
            alert(xhr.responseText);
        }

    });
});

const load_myTable = () =>{
    let od_id = $('#hidden_od_id').val();
    
    $.ajax({
        url:'ajax.php?action=ordered_list',
        method:'post',
        data: {od_id : od_id},
        

        success:function(data){
            $('#trans_table_display').html(data);            
        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
    
}

const total_cash_ex = () =>{
    let odd_id = $('#hidden_od_id').val();

    $.ajax({
        url:'ajax.php?action=total_trans_data',
        method:'post',
        data: {odd_id : odd_id},
        dataType: 'json',

        success:function(data){
            
            $('#tt_price').text(": "+data.total_p);
            $('#od_cash').text(": "+data.cash);
            $('#od_exchange').text(": "+data.exchange);

        },

        error:function(xhr,status,error){
            alert(xhr.responseText);
        }

    });
    

}

