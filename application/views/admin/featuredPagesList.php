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
              <h3 class="box-title">Featured Pages</h3>
              <div class="button-spacing"> 
                <button type="button" id="addFeaturePage" class="btn btn-block btn-success" data-toggle="modal" data-target="#feature-modal">
                Add Featured Page
                </button>              
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Slot</th>
                  <th>View / Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;foreach($records as $r) { ?>
                <tr>
                  <td><?=$i++?></td>
                  <td><?=$r['name']?></td>
                  <td><?=$r['status']?></td>
                  <td><select class="slot-change" data-id="<?=$r['id']?>">
                    <option value="1" <?php echo $r['slot'] == 1 ? 'selected' : '' ?> >Slot 1</option>
                    <option value="2" <?php echo $r['slot'] == 2 ? 'selected' : '' ?> >Slot 2</option>
                    <option value="3" <?php echo $r['slot'] == 3 ? 'selected' : '' ?> >Slot 3</option>
                    <option value="4" <?php echo $r['slot'] == 4 ? 'selected' : '' ?> >Slot 4</option>
                    <option value="5" <?php echo $r['slot'] == 5 ? 'selected' : '' ?> >Slot 5</option>
                    <option value="6" <?php echo $r['slot'] == 6 ? 'selected' : '' ?> >Slot 6</option>
                    <option value="7" <?php echo $r['slot'] == 7 ? 'selected' : '' ?> >Not in home page</option>
                  </select></td>
                  <td><a class="btn btn-success" href="<?=base_url()?>index.php/AdminDashboard/featuredPagesDetail?id=<?=encrypt($r['id'])?>">View / Edit</a></td>
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

<!-- Modal -->
<div id="feature-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Featured Page</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>index.php/AdminDashboard/addFeaturedPage" enctype="multipart/form-data" method="POST">
            <label>Feature Name</label>
            <input type="text" name="featured_name" class="form-control">

            <label>Feature Description</label>
            <input type="text" name="featured_description" class="form-control">

            <label>Feature Cover Picture</label>
            <input type="file" name="cover[]" class="form-control">

            <br>
            <button type="submit" class="btn btn-success">Submit</buttom>
        </form>
      </div>
      <div class="modal-footer">
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

    $('.slot-change').change(function(e){
      var dataid = $(this).data("id");
      var slot = $(this).val();

      $.ajax({
                url: base_url+'updateFeaturedSlot',
                method: 'post',
                data: {id:dataid,slot:slot},
                success:function(msg)
                {
                  msg = $.parseJSON(msg);
                  console.log(msg);
                  if(msg.status==true)
                  {
                    alert('Slot Updated Successfully!');
                  }
                  else
                  {
                    alert('Something wrong!');
                  }
                }
            });
      
    });



  });





</script>
</body>
</html>