<?php require 'assets/checker.php'; ?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Transactions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Transactions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           



        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Transaction Code</th>
                    <th>Name</th> 
                    <th>Date</th>
                                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php

                  $data = show_transaction();

                  if($data !='0'){
                    foreach ($data as $res) {
                      ?>

                    <tr>
                          <td><?php echo $res['order_code'];  ?></td>
                          <td><?php echo $res['name']; ?></td>
                          <td><?php echo date("d M Y",strtotime($res['order_date'])); ?></td>
                          
                         
                          <td>
                            <button type="button" class="btn btn-primary bi bi-search" id="btn_view_transaction" data-id="<?php echo $res['order_id']; ?>"> View</button>
                            
                          </td>
                    </tr>

                      <?php
                    }
                  }

                   ?>

                 

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
    </section>


<!------------All Modal-------------->

              <div class="modal fade" id="viewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Transaction Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                  <input  type="hidden" id="hidden_od_id" name="hidden_od_id" >

                      <div class="card-body">
                        <div class="row">
                         <div class="col">
                            <label class="form-label">Transaction Code : </label>
                            <label class="form-label" ><strong id="od_code">203992</strong></label>
                        </div>
                        <div class="col">
                          <label class="form-label">Date</label>
                          <label ><strong id="od_date"> : August 19,2020</strong></label>
                        </div>
                       </div>
                       <div class="row">
                         <div class="col">
                           <label class="form-label">Customer Name</label>
                           <label class="form-label" ><strong id="od_name">: Romeo</strong></label>
                         </div>
                       </div>
                       <div class="row">
                         <div class="col">
                           <label class="text-center" style="position: relative;margin-left: 40%;margin-right: 40%;"><strong>Purchase</strong></label>
                           <hr>
                           <table class="table table-bordered">
                            <th>No.</th>
                             <th>Product Name</th>
                             <th>Price</th>
                             <th>Quantity</th>

                             <tbody id="trans_table_display">
                               
                             </tbody>

                           </table>
                           <div class="row">
                             <div class="col">
                                <label class="form-label">Total Price</label>
                                <label class="form-label" ><strong id="tt_price">: 400</strong></label>
                             </div>
                           </div>

                           <div class="row">
                             <div class="col">
                               <label class="form-label">Cash</label>
                               <label class="form-label" ><strong id="od_cash"> : 500</strong></label>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col">
                               <label class="form-label">Exchange</label>
                               <label class="form-label" ><strong id="od_exchange">: 100</strong></label>
                             </div>
                           </div>
                         </div>
                       </div>
                      </div>                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->



<!-------------end Of all Modal----------------->



  </main> <!------------- end of Main ----->

<script type="text/javascript" src="allScript/transaction-script.js"></script>
  <?php

  function show_transaction(){
    global $mydb;
    $mydb->setQuery("select o.order_id,o.order_code,c.name,o.order_date from customer c,orders o where c.customer_id = o.customer_id order by o.order_date desc");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);

    if($numrows > 0){
      return $cur;
    }else{
      return 0;
    }
  }

   ?>
