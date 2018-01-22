<?php include 'headers.php' ?>
<style>
      .button-spacing{

        padding-top: 10px;

        padding-right: 20px;

        float: right;

      }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'adminNavbar.php' ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome Admin!
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
		  <!-- <small>Casa Grande</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Search Ads</h3>
              <div class="button-spacing">
				<a href="<?php echo base_url(); ?>index.php/adminDashboard/addNewAd" class="btn btn-success">Add New Ad</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sno</th>
                  <th>Ad Name</th>
                  <th>Developer</th>
                  <th>Image</th>
                  <th>Edit</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($records != null) { ?>
                <?php $i=1 ;foreach($records as $r) { ?>
                <tr>
                  <td><?=$i ?></td>
                  <td><?=$r['adName']?></td>
				  <td><?=$r['devName']?></td>
                  <td><img src="<?=base_url()?>assets/uploads/images/<?=$r['adImage']?>" style="width:100px;height:100px;"></td>
                  <td><a href="<?php echo base_url(); ?>index.php/adminDashboard/editAd/<?=$r['id']?>" class="btn btn-primary" id="editAds" data-id="<?=$r['id']?>">Edit</a></td>
				  <td>
				  <?php if($r['status']=='enabled'){?>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_ad('<?php echo $r['id']; ?>', '0')">Delete</a>
					<?php }else{ ?>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_ad('<?php echo $r['id']; ?>', '1')">Inactive</a>
					<?php } ?>
				  </td>
                </tr>
                <?php $i++; } ?>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- FOOTER LINKS -->
<?php include 'footers.php'; ?>
  <div class="control-sidebar-bg"></div>
</div>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
  
function delete_ad(id,status){
	if(status=='0')
		var r = confirm('Are you sure you want to delete this ad?');
	else
		var r = confirm('Are you sure to you want to Activate this ad?');
	
	if(r==true){
		window.location.href = '<?=base_url()?>index.php/AdminDashboard/delete_ad/'+id+'/'+status;
	}
}
</script>
</body>
</html>

