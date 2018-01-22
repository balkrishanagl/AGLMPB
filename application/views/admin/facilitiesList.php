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
              <h3 class="box-title">Facilities</h3>
              <div class="button-spacing">
              <button class="btn btn-success" data-toggle="modal" data-target="#addFacilityModal">Add New Facility</button>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sno</th>
                  <th>Facility Name</th>
                  <th>Image</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php if($records != null) { ?>
                <?php $i=1 ;foreach($records as $r) { ?>
                <tr>
                  <td><?=$i ?></td>
                  <td><?=$r['name']?></td>
                  <td><img src="<?=base_url()?>assets/uploads/images/<?=$r['img_url']?>" style="width:100px;height:100px;"></td>
                  <td><button class="btn btn-primary editModalBtn" class="btn btn-primary" data-toggle="modal" data-target="#editFacilityModal" data-id="<?=$r['facilities_id']?>">Edit</button></td>
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

<!-- EDIT Modal -->
<div id="editFacilityModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Facility</h4>
      </div>
      <div class="modal-body">
        <form id="editFacilityForm" action="<?=base_url()?>index.php/AdminDashboard/editFacilities" enctype="multipart/form-data" method="POST">
        <label>Facility Name</label>
            <input type="text" name="efacility_name" class="form-control" id="efacility_name">
            <input type="hidden" name="efacility_id" class="form-control" id="efacility_id">

            <label>Facility Image</label>

            <input type="file" name="cover[]" class="form-control">
            <small>Click this only if you want to change the image</small>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- EDIT MODAL END -->

<!-- ADD Modal -->
<div id="addFacilityModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Facility</h4>
      </div>
      <div class="modal-body">
        <form id="addFacilityForm" action="<?=base_url()?>index.php/AdminDashboard/addFacilities" enctype="multipart/form-data" method="POST">
            <label>Facility Name</label>
            <input type="text" name="facility_name" class="form-control" required>

            <label>Facility Image</label>
            <input type="file" name="cover[]" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- ADD MODAL END -->




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
        var id = $(this).attr('data-id');
        $('#editFacilityForm').trigger('reset');
        $.ajax({
                        url: base_url+'facilitiesList',
                        method: 'post',
                        data: {id:id},
                        success:function(msg)
                        {
                            msg = $.parseJSON(msg);
                            console.log(msg);
                            if(msg!=null)
                            {
                                $('#efacility_name').val(msg[0].name);
                                $('#efacility_id').val(msg[0].facilities_id);
                            }
                            
                        }
                });
          
      });

    // $('#addNewLocationBtn').click(function(e){
    //   e.preventDefault();
    //   //console.log($('#newLocationForm').serialize());
    //   $.ajax({
    //             url:base_url+'adminAddLocationForm',
    //             method:'POST',
    //             data: $('#newLocationForm').serialize(),
    //             success:function(msg)
    //             {
    //               msg = $.parseJSON(msg);
    //               console.log(msg);

    //               if(msg.status==true)
    //               {
    //                   alert(msg.msg);
    //                   location.reload();                
    //               }
    //               else
    //               {
    //                   alert(msg.msg);
    //               }

    //             }
    //           });
    // });


    // $('.editLocationBtn').click(function(){
    //   var eId = $(this).attr('data-id');
    //   var details = $(this).attr("data-details");
    //   var obj = $.parseJSON( details );
    //   $('#eId').val(eId);
    //   $('#eName').val(obj.locationName);
    //   $('#eZone').val(obj.zone).change();
    //   $('#eCity').val(obj.locCityId);
    //   $('#eStatus').val(obj.status).change();
    //   $('#editLocationModal').modal('show');
    // });

    // $('#editLocationSubmitBtn').click(function(e){
    //   e.preventDefault();
    //   $.ajax({
    //             url:base_url+'adminAddLocationForm',
    //             method:'POST',
    //             data: $('#editLocationForm').serialize(),
    //             success:function(msg)
    //             {
    //               msg = $.parseJSON(msg);
    //               console.log(msg);

    //               if(msg.status==true)
    //               {
    //                   alert(msg.msg);
    //                   location.reload();                
    //               }
    //               else
    //               {
    //                   alert(msg.msg);
    //               }

    //             }
    //         });
    // });







  });





</script>
</body>
</html>
