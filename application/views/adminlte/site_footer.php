
<?php if($datepicker) {?>

 <script type="text/javascript">

  // When the document is ready
    $(document).ready(function () {

        $('.datepicker').datepicker({
            format: "dd-mm-yyyy"
        });
        //$('[data-toggle="true"]').tooltip();
      $('[data-toggle~="tooltip"]' ).tooltip({ container: 'body' });
  
    });
</script>
<?php }?>


     <!--  <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.

      </footer>
 -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
     <!--  <div class="control-sidebar-bg"></div> -->
    <!-- ./wrapper -->


 
  </body>
</html>
