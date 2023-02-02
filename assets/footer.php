

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
       <strong><span>ANN's Bakeshop Management System</span></strong>. All Rights Reserved 2022
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<script type="text/javascript" src="allScript/sweet.js"></script>
<script type="text/javascript" src="assets/lineChart.js"></script>

  <script type="text/javascript">

    function message($text='',$msg_type=''){
     swal($text, {
                icon: $msg_type,
              }).then((confirmed)=>{
                 window.location.reload();

         });
  }

function msg($text='',$msg_type=''){
     swal($text, {
                icon: $msg_type,
              });
  }

  const resetForm = (thisForm)=>{
    thisForm.get(0).reset();
  }

 
    // var chart = new ApexCharts(document.querySelector(apexChart), options);
    // chart.render();


        
    //     }




  </script>
  
