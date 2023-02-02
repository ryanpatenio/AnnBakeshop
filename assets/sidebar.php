

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo WEB_ROOT; ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php
      
      if($user_data['type'] == '1'){
        echo '
        <li class="nav-item ">
        <a class="nav-link collapsed" href="index.php?page=product">
          <i class="bi bi-cart-plus"></i>
          <span>Product</span>
        </a>
      </li><!-- End Product Page Nav -->



      <li class="nav-item">
      <a class="nav-link collapsed" href="index.php?page=category">
        <i class="bi bi-card-list"></i>
        <span>Category</span>
      </a>
    </li><!-- End Category Page Nav -->
        ';
      }
      
      ?>

       
      

       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=customer">
          <i class="bi bi-people"></i>
          <span>Customer</span>
        </a>
      </li><!-- End Customers Page Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=order">
          <i class="bi bi-cart-plus"></i>
          <span>Orders</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=Transaction">
          <i class="bi bi-cash-coin"></i>
          <span>Transaction</span>
        </a>
      </li><!-- End Register Page Nav -->
      <?php
      
      if($user_data['type'] == '1'){
        echo '
        <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=user">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li><!-- End Register Page Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
     
        ';
      }
      
      
      ?>
<!--  <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=archive">
          <i class="bi bi-folder-symlink"></i>
          <span>Archive</span>
        </a>
      </li>End Profile Page Nav -->

 
      <!-- <li class="nav-heading">Pages</li> -->

  

     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li> --><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <script>
  //$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>