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
              <h3 class="box-title">Locations</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Developer</th>
                  <th>Project</th>
                  <th>Date / Time</th>
                </tr>
                </thead>
                <tbody>
                <?php if($records != null) { ?>
                <?php foreach($records as $r) { ?>
                <tr>
                  <td><?=$r['customer_name']?></td>
                  <td><?=$r['customer_email']?></td>
                  <td><?=$r['customer_phone']?></td>
                  <td><?=$r['devName']?></td>
                  <td><?=$r['projectName']?></td>
                  <td><?= date("d-m-Y H:i", strtotime($r['inserted_on'])); ?>  </td>
                </tr>
                <?php } ?>
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
