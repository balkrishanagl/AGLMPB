<?php include 'headers.php' ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'adminNavbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Casa Grande
          <?php //echo '<pre>'; print_r($records); echo'</pre>' ?>

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
              <h3 class="box-title">Existing Projects</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Project Name</th>
                  <th>Location</th>
                  <th>City</th>
                  <th>Manager</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($records as $r) { ?>
                <tr>
                  <td><?=$r['project_id']?></td>
                  <td><?=$r['name']?></td>
                  <td><?=ucfirst($r['location_name'])?></td>
                  <td><?=ucfirst($r['cityName'])?></td>
                  <td><?=$r['project_mgr_name']?></td>
                  <td><?=ucfirst($r['status'])?></td>
                  <td><a href="<?php echo base_url() ?>index.php/adminDashboard/devProjectDetail?id=<?php echo encrypt($r['project_id']); ?>" class="btn btn-info btn-sm">View</a></td>
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
  })

  $(document).ready(function(){

    $('.new').hide();
    $('.existing').hide();

    $('#manager_type').change(function(){
        if($(this).val() == 'newMgr'){ // or this.value == 'volvo'
            $('.new').show();
            $('.existing').hide();

        }
        if($(this).val() == 'oldMgr'){ // or this.value == 'volvo'
            $('.existing').show();
            $('.new').hide();
        }
    });


    $('#addNewProjectBtn').click(function(){
      $.ajax({
                url:base_url+'addProjectForm',
                method:'post',
                data: $('#newProjectForm').serialize(),
                success:function(msg)
                {
                  msg = $.parseJSON(msg);
                  console.log(msg);

                  if(msg.status==true)
                  {
                      alert("New Project Added!");
                      location.href= msg.redirectURL;                  
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
