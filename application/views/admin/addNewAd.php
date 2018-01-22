<?php include 'headers.php' ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include 'adminNavbar.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/adminDashboard/listSearchAds">Seacrh Ads</a></li>
        <li class="active">Add New Ad</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Ad</h3>
        </div>
		<?php if(!empty($devs)){ ?>
        <div class="box-body">
          <form id="addNewAdForm" action="<?php echo base_url() ?>index.php/AdminDashboard/addNewAd" method="POST" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" -->
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
                
					<div class="form-group">
					  <label>Select Developer</label>
					   <select id="dev" name="dev" class="form-control select2">
						<option value="">Select One</option>
						<?php foreach($devs as $dev){ ?>
						<option value="<?php echo $dev['developer_id']; ?>"><?php echo $dev['name']; ?></option>
						<?php } ?>
					  </select>                  
					</div>

					<div class="form-group">
					  <label>Select Projects</label>
					   <select id="projects" multiple name="projects[]" class="form-control select2">
						<option value="">Select One</option>
						
					  </select>
					</div>
					
					<div class="form-group">
						<label>Ad Name:</label>
						<input type="text" name="adName" id="adName" class="form-control" />
					</div>
					<div class="form-group">
						<label>Ad Image:</label>
						<input type="file" name="adImage" id="adImage" class="form-control" accept=".jpg, .jpeg, .png" />
					</div>
					<div class="form-group">
					  <label>Status</label>
					   <select id="adSts" name="adSts" class="form-control select2">
						<option value="">Select One</option>
						<option value="enabled">enabled</option>
						<option value="disabled">disabled</option>
					  </select>
					</div>
					<button type="submit" id="addNewAdFormBtn" class="btn btn-success">Submit</button>
				</div>
			</div>
          </form>
        </div>
		<?php }else{ ?>
		<h4 class="box-title">No developer with paid ads found.</h4>
		<?php } ?>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOOTER LINKS -->
<?php include 'footers.php'; ?>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
	$('#dev').change(function(){
		var devId = $('#dev').val();
		$('#projects').html("<option value=''>Select Project</option>");
		$.ajax({
		  url: '<?php echo base_url(); ?>index.php/adminDashboard/getDevProjects',
		  method: 'POST',
		  data : 'id='+devId,
		  success:function(msg)
		  {
			msg = $.parseJSON(msg);
			$.each(msg, function( index, value ) {
				$('#projects').append('<option value='+value.project_id+'>'+value.name+'</option>' );
		    });
		  }
        });
	 });
  });
  
  
$('#addNewAdFormBtn').click(function(){
	var dev = $('#dev').val();
	if(dev==''){
		alert('please select a developer');
		$('#dev').focus();
		return false;
	}
	var projects = $('#projects').val();
	if(projects==''){
		alert('please select projects');
		$('#projects').focus();
		return false;
	}
	var adName = $('#adName').val();
	if(adName==''){
		alert('please enter ad name.');
		$('#adName').focus();
		return false;
	}
	var adImage = $('#adImage').val();
	if(adImage==''){
		alert('please upload a image for ad.');
		$('#adImage').focus();
		return false;
	}
	var adSts = $('#adSts').val();
	if(adSts==''){
		alert('please select a status');
		$('#adSts').focus();
		return false;
	}
	
	return true;
});
</script>
</body>
</html>
