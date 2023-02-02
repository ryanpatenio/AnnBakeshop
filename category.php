<?php require 'assets/checker.php'; ?>
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#AddCat" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Category Name</th>                  
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <!---------
                  1.bread
                  2. cookies
                  3.donuts
                  4.pies
  

                    ------------------->

                    <?php

                    $category = showCategory();

                    $i = 1;
                    foreach ($category as $res) {
                      
                      ?>

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $res['name']; ?></td>
                       
                        <td>
                          <button type="button" id="edit_cat_btn" data-id="<?php echo $res['cat_id']; ?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                        </td>
                      </tr>

                      <?php

                 $i++;   }


                     ?>
             
                     

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   


    </section>



<!--------------All Modal-------------------->
  
  <div class="modal fade" id="AddCat" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">ADD New Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="addcat" >
                        <div class="card-body">

                          <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Category Name</label>
                             <input type="text" class="form-control" id="cat_name" name="cat_name"  required>       
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

                <div class="modal fade" id="editCat" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="upcat" >
                        <div class="card-body">

                          <div class="row">
                            
                            <label for="validationDefault01" class="form-label">Category Name</label>
                            <input type="hidden" name="hidden_cat_id" id="hidden_cat_id">
                             <input type="text" class="form-control" name="upCatName" id="upCatName"  required>       
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

<!---------------end of all Modal---------------------->




  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="allScript/category-script.js"></script>
<?php

function showCategory(){
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