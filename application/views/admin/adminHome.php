<?php include 'headers.php' ?>

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
              <h3 class="box-title">Developers</h3>
              <div class="pull-right">
                <a class="btn btn-success" href="<?=base_url()?>index.php/AdminDashboard/addDeveloper">Add Developer</a>
                             
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Developer ID</th>
                  <th>Developer Name</th>
                  <th>Phone No.</th>
                  <th>Allowed Listings</th>
                  <th>Status</th>
                  <th>View</th>				  <!--<th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php foreach($records as $r) { ?>
                <tr>
                  <td><?=$r['developer_id']?></td>
                  <td><?=$r['name']?></td>
                  <td><?=$r['contact_phone']?></td>
                  <td><?=$r['allowed_listings']?></td>
                  <td><?=$r['status']?></td>
                  <td><a href="<?php echo base_url() ?>index.php/adminDashboard/adminDevDetail?id=<?php echo $r['developer_id']; ?>" class="btn btn-info btn-sm">View</a></td>				  <!--<td>				  <?php if($r['status']=='enabled'){?>						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_dev('<?php echo $r['developer_id']; ?>', '0')">Active</a>					<?php }else{ ?>						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_dev('<?php echo $r['developer_id']; ?>', '1')">Inactive</a>					<?php } ?>				  </td>-->
                </tr>
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
  <!-- ADD NEW DEVELOPER MODAL -->
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Project</h4>
              </div>
              <div class="modal-body">
              <form id="newDeveloperForm">
                <div class="form-group">
                  <label for="dName">Developer Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Name:</label>
                  <input type="text" class="form-control" name="contact_name" id="contact_name" required>
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Email:</label>
                  <input type="email" class="form-control" name="contact_email" id="contact_email" required>
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Phone:</label>
                  <input type="number" class="form-control" name="contact_phone" id="contact_phone" required>
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Address:</label>
                  <textarea class="form-control" name="contact_address" id="contact_address" required></textarea>
                </div>

                <div class="form-group">
                  <label for="dName">Allowed Listings:</label>
                  <input type="number" class="form-control" name="allowed_listings" id="allowed_listings" required>
                </div>

                <div class="form-group">
                  <label for="dName">Status:</label>
                  <select id="status" name="status" class="select2" required>
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                  </select>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewDevBtn">Add Developer</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- End Modal -->

<!-- FOOTER LINKS -->
<?php include 'footers.php'; ?>


  <!-- Control Sidebar -->
    <!-- Create the tabs -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- page script -->
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
    })
  })/*
function delete_dev(id,status){	if(status=='0')		var r = confirm('Are you sure you want to delete this developer?');	else		var r = confirm('Are you sure to you want to Activate this developer?');		if(r==true){		window.location.href = '<?=base_url()?>index.php/AdminDashboard/delete_dev/'+id+'/'+status;	}}*/
  $(document).ready(function(){

    $('#addNewDevBtn').click(function(e){
      e.preventDefault();
      $('#newDeveloperForm').validate();
      $.ajax({
                url:base_url+'addNewDevForm',
                method:'POST',
                data: $('#newDeveloperForm').serialize(),
                success:function(msg)
                {
                  msg = $.parseJSON(msg);
                  console.log(msg);

                  if(msg.status==true)
                  {
                      alert("New Project Added!");
                      location.reload();                
                  }
                  else
                  {
                      alert("Something wrong");
                  }

                }
              });
    });


  });


</script>
</body>
</html>
