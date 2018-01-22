<?php include 'headers.php';
$aid = $this->uri->segment(3);
$msg = $this->uri->segment(4);
if($msg=='pass'){ ?>
<script>
alert('Successfully updated ad.');
</script>
<?php }else if($msg=='fail'){
 ?>
 <script>
alert('error in updating record');
</script>
<?php } ?>
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
        <li class="active">Edit Ad</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Ad</h3>
        </div>
        <div class="box-body">
          <form id="editNewAdForm" action="<?php echo base_url() ?>index.php/AdminDashboard/editNewAdForm" method="POST" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" -->
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
					<input type="hidden" value="<?php echo $aid; ?>" name="aid" id="aid" />
					<input type="hidden" value="<?php echo $record->adImage; ?>" name="editImage" id="editImage" />
					<div class="form-group">
					  <label>Select Developer</label>
					   <select id="dev" name="dev" class="form-control select2">
						<option value="">Select One</option>
						<?php foreach($devs as $dev){ ?>
						<option value="<?php echo $dev['developer_id']; ?>" <?php if($dev['developer_id']==$record->developer_id){ echo "selected"; } ?>><?php echo $dev['name']; ?></option>
						<?php } ?>
					  </select>                  
					</div>

					<div class="form-group">
					  <label>Select Projects</label>
					   <select id="projects" name="projects" class="form-control select2">
						<option value="">Select One</option>
						
					  </select>
					</div>
					
					<div class="form-group">
						<label>Ad Name:</label>
						<input type="text" name="adName" id="adName" value="<?php if(isset($record->name)){ echo $record->name; } ?>" class="form-control" />
					</div>
					<div class="form-group">
						<label>Update Image:</label>
						<input type="file" name="adImage" id="adImage" class="form-control" accept=".jpg, .jpeg, .png" />
						<?php if(!empty($record->adImage)){ ?>
						<img src="<?php echo base_url(); ?>/assets/uploads/images/<?php echo $record->adImage; ?>" width="80px" height="80px" />
						<?php } ?>
					</div>
					<div class="form-group">
					  <label>Status</label>
					   <select id="adSts" name="adSts" class="form-control select2">
						<option value="">Select One</option>
						<option value="enabled" <?php if($record->status=='enabled'){ echo "selected"; } ?>>enabled</option>
						<option value="disabled" <?php if($record->status=='disabled'){ echo "selected"; } ?>>disabled</option>
					  </select>
					</div>
					<button type="submit" id="editNewAdFormBtn" class="btn btn-success">Submit</button>
				</div>
			</div>
          </form>
        </div>
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
		var devId = <?php echo $dev['developer_id']; ?>;
		var pId = <?php echo $record->project_id; ?>;
		$('#projects').html("<option value=''>Select Project</option>");
		$.ajax({
		  url: '<?php echo base_url(); ?>index.php/adminDashboard/getDevProjects',
		  method: 'POST',
		  data : 'id='+devId,
		  success:function(msg)
		  {
			msg = $.parseJSON(msg);
			$.each(msg, function( index, value ) {
				if(pId==value.project_id){
					var sel = 'selected';
				}else{
					var sel = '';
				}
				$('#projects').append('<option '+sel+' value='+value.project_id+'>'+value.name+'</option>' );
		    });
		  }
        });
  });
  
  
$('#editNewAdFormBtn').click(function(){
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
	/*var adImage = $('#adImage').val();
	if(adImage==''){
		alert('please upload a image for ad.');
		$('#adImage').focus();
		return false;
	}*/
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
