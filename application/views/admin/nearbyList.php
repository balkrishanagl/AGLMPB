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
              <h3 class="box-title">Nearby Locations</h3><br>
              <small>One record is sufficient for locating both the places as nearby locations.</small>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Location Name</th>
                  <th>Nearby Name</th>
                  <th>View / Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;foreach($records as $r) { ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$r['location']?></td>
                  <td><?=$r['nearby']?></td>
                  <td><button class="btn btn-danger editModalBtn" data-id="<?=$r['id']?>">Delete</button></td>
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

<!-- Edit Modal -->
<div id="editNearbyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Nearby Locations</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="eLocation">
        <input type="text" id="eNearby">

      </div>
      <div class="modal-footer">
        <button type="button" id="eNearbyBtn"class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


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



    $('.editModalBtn').click(function(e){
        if(confirm('Are you sure that you want to delete this record?'))
        {
            var id = $(this).data("id");

            $.ajax({
                    url: base_url+'deleteNearbyLocation',
                    method: 'post',
                    data: {id:id},
                    success:function(msg)
                    {
                        msg = $.parseJSON(msg);
                        console.log(msg);
                        if(msg[0].status==true)
                        {
                            alert('Deleted Successfully!');
                        }
                        else
                        {
                            alert('Something wrong!');
                        }
                    }
                });   

        }
       
             
    });

  });





</script>
</body>
</html>
