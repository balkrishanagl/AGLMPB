<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php// echo base_url()?>assets/admin/dist/js/demo.js"></script> -->
<!-- CHECK BOX AND RADIO BUTTONS ICHECK  -->
<script src="<?php echo base_url()?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Validation -->
<script src="<?php echo base_url()?>assets/admin/plugins/jquery-validate/jquery.validate.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/adminFormValidation.js"></script>



<script> 
var base_url = "<?php echo base_url();?>index.php/AdminDashboard/"; 
//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    $('.select2').select2()


</script>


<footer class="main-footer">
<div class="pull-right hidden-xs">
  <!-- <b>Version</b> 2.4.0 -->
</div>
<!-- <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights -->
</footer>
