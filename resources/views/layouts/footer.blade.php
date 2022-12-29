    <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#" target="_blank">Kitchen</a> 2022</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">All rights reserved by <a href="#" target="_blank">Kitchen </a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- base:js -->
    <script src="{{asset('web/')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('web/')}}/js/off-canvas.js"></script>
    <script src="{{asset('web/')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('web/')}}/js/template.js"></script>
    <script src="{{asset('web/')}}/js/settings.js"></script>
    <script src="{{asset('web/')}}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('web/')}}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('web/')}}/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('web/')}}/js/dashboard.js"></script>
    <!-- End custom js for this page-->
      <!-- plugin js for this page -->
  <script src="{{asset('web/')}}/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="{{asset('web/')}}/vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{asset('web/')}}/js/file-upload.js"></script>
  <script src="{{asset('web/')}}/js/typeahead.js"></script>
  <script src="{{asset('web/')}}/js/select2.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
   <!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{asset('web/')}}/js/moment.min.js"></script>
  <script src="{{asset('web/')}}/js/daterangepicker.min.js"></script>
  <link rel="stylesheet" href="{{asset('web/')}}/css/daterangepicker.css">
 <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> -->
<!-- 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/> -->
  
  <script>
    var elem = document.getElementById("myvideo");
    function openFullscreen() {
      if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    
    }
    // function openFullscreen() {
    //   if (document.fullscreenElement === null) {
    //     this._fullscreen.openFullscreen();
    //   } else {
    //     this._fullscreen.closeFullscreen();
    //   }
    // }

    
    $(document).ready(function(){
   $("#fromDate").datepicker({
       format: 'dd-mm-yyyy',
       autoclose: true,
   }).on('changeDate', function (selected) {
       var minDate = new Date(selected.date.valueOf());
       $('#toDate').datepicker('setStartDate', minDate);
   });

   $("#toDate").datepicker({
       format: 'dd-mm-yyyy',
       autoclose: true,
   }).on('changeDate', function (selected) {
           var minDate = new Date(selected.date.valueOf());
           $('#fromDate').datepicker('setEndDate', minDate);
   });
});
  </script>
  @yield('scripts');
  <!-- End custom js for this page-->
  </body>
</html>