<?php require 'assets/checker.php'; ?>
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Customers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Customers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddCustomer" type="button"><i class="bi bi-plus-circle"> New</i></button>



        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th> 
                    <th>Contact</th>
                    <th>Address</th>                
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php
                  $cust_data = getCustomer();
                  $j = 1;
                  foreach ($cust_data as $data_cus) {
                    ?>

                  <tr>
                      <td><?php echo $j; ?></td>
                      <td><?php echo $data_cus['name']; ?></td>
                      <td><?php echo $data_cus['contact']; ?></td>
                      <td><?php echo $data_cus['address']; ?></td>
                     
                      <td>
                        <button type="button" class="btn btn-warning bi bi-pencil" id="edit_cust_btn" data-id="<?php echo $data_cus['customer_id']; ?>"> Modify</button>
                       <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                      </td>
                  </tr>

                    <?php
                 $j++; }


                   ?>
          

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   


    </section>

    <!---------All Modal-------------->

      <div class="modal fade" id="AddCustomer" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">ADD New Customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="newCustomer" >
                        <div class="card-body">

                          <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Customer Name</label>
                             <input type="text" class="form-control" id="customerName" name="customerName" required>       
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Contact</label>
                             <input type="text" class="form-control" name="contact1" id="contact1"  required>       
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Address</label>
                             <input type="text" class="form-control" name="address" id="address"  required>       
                          </div>


                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End Add Modal-->

               <div class="modal fade" id="editCustomer" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Udpate Customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="updateCus" >
                        <div class="card-body">

                          <input  type="hidden" name="hidden_customer_id" id="hidden_customer_id">

                          <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Customer Name</label>
                             <input type="text" class="form-control" name="editCustomerName" id="editCustomerName"  required>       
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Contact</label>
                             <input type="text" class="form-control" name="editContact" id="editContact"  required>       
                          </div>
                           <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Address</label>
                             <input type="text" class="form-control" name="editAddress" id="editAddress"  required>       
                          </div>


                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End Edit Modal-->

  <!----------end of All Modal----------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="allScript/customer-script.js"></script>
  
<?php
function getCustomer(){
  global $mydb;
  $mydb->setQuery('select * from customer');
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }
}


 ?>