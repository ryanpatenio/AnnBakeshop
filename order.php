  <?php require 'assets/checker.php'; ?>

   <style type="text/css">

    #addQtyModal{
      z-index: 9999;
    }
    #ConfirmPaymentModal{
      z-index: 9999;
    }
     
   </style>


    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Orders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddOrders" type="button"><i class="bi bi-plus-circle"> New</i></button>



        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Customer Name</th> 
                    <th>Contact</th>
                    <th>Address</th> 
                    <th>Date</th> 
                    <th>Status</th>              
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php

                  $all_orders = show_all_orders();

                  if($all_orders != '0'){

                  foreach ($all_orders as $data_orders) { 
                                     
                    if($data_orders['status'] == '0'){
                      $color = 'red';
                      $status = 'unclaim';
                    }else if($data_orders['status'] == '1'){
                      $color = 'green';
                      $status = 'Claimed';
                    }else if($data_orders['status'] == '2'){
                      $color = 'green';
                      $status = 'Delivered';
                    }

                    else{
                      $color = 'red';
                      $status = 'Error';
                    }


                    ?>
                      
                  <tr>
                    <td><?php echo $data_orders['order_code']; ?></td>
                    <td><?php echo $data_orders['name']; ?></td>
                    <td><?php echo $data_orders['contact']; ?></td>
                    <td><?php echo $data_orders['address']; ?></td>
                    <td><?php echo date("d M Y",strtotime($data_orders['order_date'])); ?></td>
                    <td style="color: <?php echo $color; ?>"><?php echo $status; ?></td>
                   
                    <td>
                      <button type="button" class="btn btn-warning bi bi-pencil" id="mod_order_btn" data-id="<?php echo $data_orders['order_id']; ?>"> Modify</button>
                      
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


    <!------------All Modal------------->
    <div class="modal fade" id="AddOrders" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Select Order</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     

                      <div class="card">
                        <div class="card-body pt-3">
                          <!-- Bordered Tabs -->

                          <label class="form-label">Select Customer</label>
                          <input type="text" class="form-control" name="search" id="search-input" placeholder="Search Customer">

                          <div class="display" id="display">
                           
                          </div>

                          <hr>
                          <ul class="nav nav-tabs nav-tabs-bordered">


                          <li class="nav-item">
                         <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#customer-profile">Customer</button>
                          </li>

                            <li class="nav-item">
                              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Product</button>
                            </li>

                            <li class="nav-item">
                              <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit" >My Cart <span class="badge bg-danger badge-number" id="mycart_count"></span></button> 
                            </li>
                          </ul>



                          <div class="tab-content pt-2">
                            <div class="tab-pane fade show active customer-profile" id="customer-profile">
                              <!-- Profile Edit Form -->
                              <form>

                                <input type="hidden" name="hidden_customer_id" id="hidden_customer_id">



                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Customer Name</label>
                                      <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name" required="">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Contact</label>
                                      <input type="text" class="form-control" name="contact" id="contact" placeholder="contact" required="">
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" id="address" required="">
                                  </div>
                                </div>

                                
                              </form><!-- End Customer Form -->

                            </div>



                            <div class="tab-pane fade profile-overview" id="profile-overview">                      
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Product Name</th> 
                                       
                                        <th>Price</th> 
                                                     
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody>

                                      <?php

                                      $product = showProduct();
                                      $i = 1;
                                      foreach ($product as $res) {
                                        ?>
                                        <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $res['prod_name']; ?></td>
                                         
                                          <td><?php echo $res['prod_price']; ?></td>

                                         
                                          <td>
                                            <button type="button" data-id="<?php echo $res['prod_id']; ?>" class="btn btn-success bi bi-plus-circle" id="addQtyBtn"> Add</button>
                                            
                                          </td>
                                        </tr>


                                        <?php
                                    $i++;  }

                                       ?>

                                      
                              

                                    </tbody>
                                  </table>
                                </div>
                              </div>


                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                              <!-- Profile Edit Form -->
                              <form method="post" id="customer_cart_form">
                                <input type="hidden" name="idd_customer" id="idd_customer">

                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Product Name</th> 
                                       
                                        <th>Price</th> 
                                        <th>Quantity</th>
                                                     
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    
                                    <tbody id="table-cart">
                           

                                    </tbody>

                                  </table>
                                  <p><strong id="total_price_cart"></strong></p>
                                  <input type="hidden" id="hidden_total_price" name="hidden_total_price">
                                  <input type="hidden" name="cash_total" id="cash_total">
                                  <input type="hidden" name="exchange_total" id="exchange_total">
                                </div>
                              </div>


                                <div class="text-center">
                                  <button type="submit" id="checkout" class="btn btn-primary">Checkout</button>
                                </div>
                              </form><!-- End Profile Edit Form -->

                            </div>

                          </div><!-- End Bordered Tabs -->

                        </div>
                   </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->



              <!----------Edit Modal------------->
              <div class="modal fade" id="editModal" tabindex="-1" >
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content"> 
                    <div class="modal-header">
                      <h5 class="modal-title">Update Orders</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <input type="hidden" name="hidden_order_id" id="hidden_order_id">

                     <div class="row">
                       <div class="col">
                         <label class="form-label">Customer Name</label>
                         <input type="text" class="form-control" name="customer_name_edit" id="customer_name_edit" required="" readonly="">
                       </div>
                       <div class="col">
                         <label class="form-label">Address</label>
                         <input type="text" class="form-control" name="customer_address_edit" id="customer_address_edit" required="" readonly="">
                       </div>

                       <div class="col">
                           <label class="form-label">Contact</label>
                           <input type="text" name="contact_edit" id="contact_edit" required="" class="form-control" readonly="">
                        </div>

                        <div class="row" style="margin-top: 20px;">
                          <div class="col"></div>
                          <div class="col">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="order_status" required="" id="order_status">
                              <option id="edit_status"></option>
                              <option value="1">Claimed</option>
                              <option value="2">Delivered</option>
                              <option value="0">Pending</option>
                            </select>
                          </div>
                          <div class="col"></div>
                        </div>
                        <hr style="margin-top: 20px;">

                               <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Product Name</th> 
                                       
                                        <th>Price</th> 
                                        <th>Quantity</th>

                                      </tr>
                                    </thead>
                                    
                                    <tbody id="display_ordered_list">

                                                          

                                    </tbody>

                                  </table>
                                  <p><strong id="total_price_ordered"></strong></p>
                                </div>
                              </div>                      
                     </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="save_ordered_btn">Save</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Edit Modal Scrollable-->


              <div class="modal" id="addQtyModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="box-shadow: 0 3px 20px 2px rgb(1 1 1 / 0.98);">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Quantity</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="add_to_cart_form">

                        <input type="hidden" name="id_customer" id="id_customer">
                        <input type="hidden" name="pass_prod_id" id="pass_prod_id">

                        <label class="form-label">Quantity</label>
                        <input type="number" min="0" name="quantity" required="" id="quantity" class="form-control">

                      
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" id="add_to_cart" name="add_to_cart" value="add">
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->


              <!-----------Confirm Payment Modal----------->
              <div class="modal" id="ConfirmPaymentModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content" style="box-shadow: 0 3px 20px 2px rgb(1 1 1 / 0.98);">
                    <div class="modal-header">
                      <h5 class="modal-title">Confirm Payment</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="confirm_payment_form">

                        

                        <label class="form-label">Total Price</label>
                        <input type="number" min="0" readonly="" name="total_pay" id="total_pay" class="form-control">

                        <label class="form-label">Cash</label>
                        <input type="number" min="0" name="cash_amount" id="cash_amount" class="form-control">
                        <span id="error_cash"></span>
                        <br>

                        <label class="form-label">Exchange</label>
                        <input type="text" min="0" readonly="" name="exchange" id="exchange" class="form-control">

                      
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" id="confirm_checkout" name="confirm_checkout" value="Confirm">
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->





    <!----------------End of All Modal--------------------->

  </main> <!------------- end of Main ----->

  <script type="text/javascript" src="allScript/orders-script.js"></script>

<?php
  function showProduct(){
    global $mydb;
    $mydb->setQuery("select * from product");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);

    if($numrows > 0){
      return $cur;
    }else{
      return 0;
    }
  }

  function show_all_orders(){
    global $mydb;

    $mydb->setQuery("select o.order_id,o.order_code,c.name,o.order_date,c.contact,c.address,o.`status` from customer c,orders o where c.customer_id = o.customer_id order by o.order_date desc");
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);

    if($numrows > 0){
      return $cur;
    }else{
      return 0;
    }

  }

 ?>
