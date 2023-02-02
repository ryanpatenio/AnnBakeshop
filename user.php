<?php require 'assets/checker.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT;  ?>">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" type="button"><i class="bi bi-plus-circle"> New</i></button>



        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th> 
                    <th>Type</th>              
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                $data = getAllUser();
                $i = 1;
                foreach($data as $res){
                  ?>

                  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $res['fname'].' '.$res['lname']; ?></td>
                      <td><?php echo $res['job']; ?></td>
                    
                    
                      <td>
                        <button type="button" id="mod_user_btn" class="btn btn-warning bi bi-pencil" data-id="<?php echo $res['user_id']; ?>"> Modify</button>
                        <!-- <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
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
      </div>
  
    </section>

    <!--------All Modal-------------->

              <div class="modal fade" id="addModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">

                      <form method="POST" id="n_user" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col">
                            <label class="form-label">First Name </label>
                            <input type="text" class="form-control" name="fname" required="" placeholder="First Name">
                          </div>
                          <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" required="" placeholder="Last Name">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="uname" required="" placeholder="Username">
                          </div>
                          <div class="col">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass" required="">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <label for="form-label">Type</label>
                            <select class="form-control" name="user_type" id="user_type">
                              <option value="1">Administrator</option>
                              <option value="2">Staff</option>
                              
                            </select>
                          </div>
                        </div>
                      <br>
                        <div class="row">
                          <div class="col">
                            <label for="form-label">Avatar</label>
                           <input type="file" class="form-control" name="avatar" id="avatar" required="">
                          </div>
                        </div>


                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div><!-- End add Modal-->


              <div class="modal fade" id="editUserModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">

                      <form method="POST" id="edit_user_form" enctype="multipart/form-data">

                        <input type="hidden" name="hidden_user_id" id="hidden_user_id">
                        <div class="row">
                          <div class="col">
                            <label class="form-label">First Name </label>
                            <input type="text" class="form-control" name="ed_fname" id="ed_fname" required="" placeholder="First Name">
                          </div>
                          <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="ed_lname" id="ed_lname" required="" placeholder="Last Name">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="ed_uname" id="ed_uname" required="" placeholder="Username">
                          </div>
                          <div class="col">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="ed_pass" id="ed_pass">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <label for="form-label">Type</label>
                            <select class="form-control" name="ed_user_type" id="ed_user_type">
                              <option id="data_ed_type"> Administrator</option>
                              <option value="1">Administrator</option>
                              <option value="2">Staff</option>
                              
                            </select>
                          </div>
                        </div>
                      <br>
                        <div class="row">
                          <div class="col">
                            <label for="form-label">Avatar</label>
                            <input type="hidden" name="hidden_avt" id="hidden_avt">
                           <input type="file" class="form-control" name="new_avatar" id="new_avatar">
                          </div>
                        </div>


                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div><!-- End Basic Modal-->


    <!------------ end of All Modal------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="allScript/user-script.js"></script>
<?php

function getAllUser(){
  global $mydb;

  $mydb->setQuery("select * from user where special_code ='0'");
  $cur = $mydb->executeQuery();
  $numrows = $mydb->num_rows($cur);

  if($numrows > 0){
    return $cur;
  }else{
    return false;
  }
}


?>