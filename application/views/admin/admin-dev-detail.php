<?php include 'headers.php' ?>
<?php include 'adminNavbar.php' ?>
<?php $login_details = $records['login_details'];
preg_match("/[^\/]+$/", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", $matches);
$msgs = $matches[0];
if($msgs=='fail'){
?>
<script>
alert('Error in updating Developer details!');
</script>
<?php } else if($msgs=='pass'){ ?>
<script>
alert('Successfully updated Developer details!');
</script>
<?php }else{ } ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Developer Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Developer profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			<?php if(!empty($login_details[0]['img_path'])){ ?>
			<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/uploads/images/<?php echo $login_details[0]['img_path']; ?>" alt="User profile picture">
			<?php } else { ?>
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/admin/dist/img/user4-128x128.jpg" alt="User profile picture">
			<?php } ?>
              <h3 class="profile-username text-center"><?=$records[0]['name']?></h3>

              <p class="text-muted text-center">Developer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Allowed Listings</b> <a class="pull-right"><?=$records[0]['allowed_listings']?></a>
                </li>
                <li class="list-group-item">
                  <b>Used Listings</b> <a class="pull-right"><?=$records['usedListings']?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?=$records[0]['status']?></a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
             <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Project Details</h3>
          <!-- <button class="btn btn-sm btn-success pull-right">Edit Project Details -->
        </div>
        <div class="box-body">
          <form id="editDevForm" method="post" action="<?php echo base_url() ?>index.php/AdminDashboard/adminEditDevForm" name="editDevForm" enctype="multipart/form-data">
          <div class="form-group col-md-9">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                      <tr>
                        <td><b>Developer Name</b></td>
                        <td><input type="text" class="form-control" name="name" id="name" value="<?=$records[0]['name']?>"></td>
                        <input type="hidden" class="form-control" name="developer_id" id="developer_id" value="<?=$records[0]['developer_id']?>">
                      </tr>
                      <tr>
                        <td><b>Contact Person Name</b></td>
                        <td><input type="text" class="form-control" name="contact_name" id="contact_name" value="<?=$records[0]['contact_name']?>"></td>
                      </tr>
                      <tr>
                        <td><b>Contact Person Email</b></td>
                        <td><input type="text" class="form-control" name="contact_email" id="contact_email" value="<?=$records[0]['contact_email']?>"></td>
                      </tr>
                      <tr>
                        <td><b>Contact Person Phone</b></td>
                        <td><input type="text" class="form-control" name="contact_phone" id="contact_phone" value="<?=$records[0]['contact_phone']?>"></td>
                      </tr>
                      <tr>
                        <td><b>Contact Person Address</b></td>
                        <td><input type="text" class="form-control" name="contact_address" id="contact_address" value="<?=$records[0]['contact_address']?>"></td>
                      </tr>
                      <tr>
                        <td><b>About Developer</b></td>
                        <td><textarea class="form-control" name="description" id="dev_description"> <?=$records[0]['description']?> </textarea></td>
                      </tr>
                      <tr>
                        <td><b>Allowed Listings</b></td>
                        <td><input type="text" class="form-control" name="allowed_listings" id="allowed_listings" value="<?=$records[0]['allowed_listings']?>"></td>
                      </tr>
                      <tr>
                        <td><b>Used Listings</b></td>
                        <td><?=$records['usedListings']?></td>
                      </tr>
                      <tr>
                        <td><b>Total No.of Projects</b></td>
                        <td><?=$records['usedProjects']?></td>
                      </tr>
                      <tr>
                        <td><b>Status</b></td>
                          <td>
                          <select id="status" name="status" class="form-control">
                            <option <?php echo $records[0]['status'] == 'enabled' ? 'selected' : '' ?> value="enabled">Enabled</option>
                            <option <?php echo $records[0]['status'] == 'disabled' ? 'selected' : '' ?> value="disabled">Disabled</option>
                          </select>
                        </td>
                      </tr>
					  <tr>
                        <td><b>Update Logo </b></td>
                          <td>
                          <input type="file" id="dLogo" name="dLogo[]" />
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
              <input type="submit" id="editDevSubmitBtn" value="Submit" class="btn btn-primary pull-right"/>
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
        </div>

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


</div>
<!-- ./wrapper -->

<script>
/*
  $(document).ready(function(){
    $('#editDevForm').on('submit', function (e) {
	//alert('aads');
	var file_data = $('#dLogo').prop('files')[0]; 
		var form_Data = $('#editDevForm').serialize();
		form_Data.append('file', file_data);
		console.log(form_Data);
		//return false;
		$.ajax({

			url: base_url+'adminEditDevForm',
			type : "POST",
			data : form_Data,
			cache: false,
            contentType: false,
            processData: false,
			success: function (data) {
				var response = JSON.parse(data);
				alert(response.msg);
			},
			error: function(xhr, resp, text) {
				console.log(xhr, resp, text);
			}
		});
		return false;*/
      /*$.ajax({
                url: base_url+'adminEditDevForm',
                method: 'post',
                data: $('#editDevForm').serialize(),
                success:function(msg)
                {
                  msg = $.parseJSON(msg);
                  console.log(msg);
                  if(msg.status==true)
                  {
                    alert(msg.msg);
                    location.reload();
                  }
                  else
                  {
                    alert(msg.msg);
                  }
                }
            });
    });
    
  });*/
</script>


</body>
</html>
