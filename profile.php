<?php
require 'assets/checker.php';


if(isset($_POST['monkey_name'])){
  if(!empty($_POST['monkey_pox'])){
    $codes = $user_class->getTheMonkey($_POST['monkey_pox']);
    if($codes == 1){
      $monkey_pox = md5($_POST['monkey_pox']);

      $true = '';
      if(!empty($_POST['isSick'])){
        $true = '1';
      }else{
        $true = '0';
      }


      $vaccine = $user_class->antidote($monkey_pox,$true);
      if($vaccine == 1){
        msgBox('Monkey Smile!');
      }else{
        msgBox('Not a Banana!');
      }
        
    }else{
      msgBox('Not a Banana!');
    }
  }else{
    msgBox('Give the Monkey a Banana!');
  }

}

?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/avatar/<?php echo $user_data['avatar']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $user_data['account_name']; ?></h2>
              <h3><?php echo $user_data['job']; ?></h3>
             
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_data['account_name']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_data['job']; ?></div>
                  </div>

                 

               
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              


                  <!-- Profile Edit Form -->
                  <form method="POST" id="edit_profile_form" enctype="multipart/form-data">
                    <input type="hidden" id="user_id_profile" name="user_id_profile" value="<?php echo $_SESSION['user_id']; ?>" > 
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/avatar/<?php echo $user_data['avatar']; ?>" id="display_avatar" alt="Profile">
                        <div class="pt-2">

                        <input type="hidden" name="hidden_avatar" value="<?php echo $user_data['avatar']; ?>">
                      
                          <input type="file" id="temp_avatar" name="temp_avatar" accept="image/*" class="form-control" title="Upload new profile image">
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fname" value="<?php echo $user_data['fname']; ?>">
                      </div>

                      <label  for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9 mt-2">
                        <input name="lname" type="text" class="form-control" id="lname" value="<?php echo $user_data['lname']; ?>">
                      </div>
                    </div>

                   

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">

                        <select id="edit_profile_job" class="form-control" name="edit_profile_job">

                        
                          <option value="<?php echo $user_data['type'] ?>"><?php echo $user_data['job']; ?></option>
                        
                         

                        </select>                        
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                

                  <!-- Settings Form -->
                
                  <?php
                $monkey_status = $user_class->get_monkey_status();
                $check = '';
                if($monkey_status !='0' && $monkey_status !='null'){
                  $check = 'checked';
                }else{
                  $check = '';
                }


                  if($user_data['monkey_name'] !='null' && $user_data['monkey_name'] !='0'){
                    echo '

                    <div class="tab-pane fade pt-3" id="profile-settings">
                    <form method="POST" id="simple_monkey">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Maintenance</label>
                      <div class="col-md-8 col-lg-9">

                          
                              <div class="form-check">
                              <label class="form-check-label" for="changesMade">
                                    Banana Code
                                  </label>
                                  <input class="form-control" type="text" id="" name="monkey_pox" >
                                  
                                </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="isSick[]" id="changesMade" '.$check.'>
                          <label class="form-check-label" for="changesMade">
                            Under Maintenance
                          </label>
                        </div>
                        

                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="monkey_name">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>
                    ';
                  }
                  ?>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" id="prof_changePass_form">

                  <input type= "hidden" name="user_hdd_id" value="<?php echo $_SESSION['user_id']; ?>" >

                    <div class="row mb-3">
                      <label for="current_Password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="currentPassword" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="newPassword" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="renewPassword" class="form-control" id="renewPassword">
                      </div>
                    </div>
                    <span id="error_message"></span>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script type="text/javascript" src="allScript/profile-script.js"></script>

