<?php require 'assets/checker.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal" type="button"><i class="bi bi-plus-circle"> New</i></button>


        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $data = getProduct();
                  $i = 1;
                  foreach ($data as $res) { ?>
                    

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $res['prod_name']; ?></td>
                    <td><?php echo $res['prod_price']; ?></td>
                    <td><?php echo $res['prod_desc']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning bi bi-pencil" id="edit_prod" data-id="<?php echo $res['prod_id']; ?>"> Modify</button>
                      <!-- <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                    </td>
                  </tr>



                <?php  $i++; }

                  ?>

                 

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   


    </section>


<!-----------------All Modal Sections---------------------------->


            <div class="modal fade" id="AddModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">ADD New Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="addP" enctype="multipart/form-data">
                        <div class="card-body">

                          <div class="row">
                            
                              <label for="validationDefault01" class="form-label">Product Name</label>
                             <input type="text" class="form-control" id="productName" name="productName"  required>       
                          </div>

                          <div class="row">
                              <label for="Product Name" class="form-label">Price</label>
                              <input type="number" min="0" class="form-control" name="productPrice" required="">
                          </div>
                            <div class="row">
                              <label for="Product Name" class="form-label">Decription</label>
                              <textarea class="form-control" rows="3" name="product_description" required=""></textarea>
                            </div>
                            <div class="row">
                              <label for="picture" class="form-label">Image</label>
                              <input type="file" class="form-control" name="avatar_img" id="avatar_img" accept="image/*"required>
                            </div>
                             <div class="row">
                              <label for="picture" class="form-label">Category</label>
                              <select class="form-control" name="cat_id">
                                <?php
                                $data_cat = getCat();
                                foreach ($data_cat as $res) {
                                  ?>

                                  <option value="<?php echo $res['cat_id']; ?>"><?php echo $res['name']; ?></option>

                                  <?php 
                                }


                                 ?>
                              </select>
                            </div>

                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="saveB" value="Save">
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->



               <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Product</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="editP" enctype="multipart/form-data">

                        <input type="hidden" id="hidden_prod_id" name="hidden_prod_id">

                        <div class="card-body">

                          <div class="row">
                            
                              <label for="validationDefault01" class="form-label">Product Name</label>
                             <input type="text" class="form-control" id="edit_prodName" name="edit_prodName"  required>       
                          </div>

                          <div class="row">
                              <label for="Product Name" class="form-label">Price</label>
                              <input type="number" min="0" class="form-control" name="edit_prodPrice" required="" id="edit_prodPrice">
                          </div>
                            <div class="row">
                              <label for="Product Name" class="form-label">Decription</label>
                              <textarea class="form-control" rows="3" name="edit_prodDesc" required="" id="edit_prodDesc"></textarea>
                            </div>
                            <div class="row">
                              <label for="picture" class="form-label">Image</label>
                              <input type="hidden" id="old_avatar" name="old_avatar">
                              <input type="file" class="form-control" name="edit_avatar" id="edit_avatar" accept="image/*">
                            </div>
                             <div class="row">
                              <label for="picture" class="form-label">Category</label>
                              <select class="form-control" name="edit_category">
                                <option id="hidden_cat_id"></option>
                               <?php

                               foreach ($data_cat as $res2) {
                                ?>
                                 <option value="<?php echo $res2['cat_id']; ?>"><?php echo $res2['name']; ?></option>
                                
                             <?php  }

                                ?>
                              </select>
                            </div>

                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="save" id="saveB" value="Save">
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End Edit Modal-->

<!-------------------end of All Modal----------------------->


  </main> <!------------- end of Main ----->

  <script type="text/javascript" src="allScript/product-script.js"></script>

  <?php

function getProduct(){
  global $mydb;

  $mydb->setQuery("select * from product");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0 ){
    return $cur;
  }else{
    return 0;
  }
}

function getCat(){
  global $mydb;
  $mydb->setQuery('select * from category');
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }
}



   ?>