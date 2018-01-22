

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
              <h3 class="box-title">Quick Links (Popular Locations)<?php // echo '<pre>'; print_r($records) ?></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-group">
                <div class="form-group">
                    <label for="">Slot 1</label><br>
                    <select name="slot-1" id="slot-1" class="select2 quickLinks" style="width: 25%">
                        <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?=$p['location_id']?>" <?php echo $records['popular_locations'][0]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slot 2</label><br>
                    <select name="slot-2" id="slot-2" class="select2 quickLinks" style="width: 25%">
                        <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?= $p['location_id']?>" <?php echo $records['popular_locations'][1]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slot 3</label><br>
                    <select name="slot-3" id="slot-3" class="select2 quickLinks" style="width: 25%">
                        <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?= $p['location_id']?>" <?php echo $records['popular_locations'][2]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slot 4</label><br>
                    <select name="slot-4" id="slot-4" class="select2 quickLinks" style="width: 25%">
                     <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?= $p['location_id']?>" <?php echo $records['popular_locations'][3]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slot 5</label><br>
                    <select name="slot-5" id="slot-5" class="select2 quickLinks" style="width: 25%">
                        <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?= $p['location_id']?>" <?php echo $records['popular_locations'][4]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slot 6</label><br>
                    <select name="slot-6" id="slot-6" class="select2 quickLinks" style="width: 25%">
                        <option value="0">None</option>
                    <?php foreach($records['locations'] as $p) { ?>
                        <option value="<?= $p['location_id']?>" <?php echo $records['popular_locations'][5]['quick_link_location_id'] == $p['location_id'] ? 'selected' : '' ?> ><?=$p['location_name']?></option>
                    <?php } ?>
                    </select>
                </div>
              </form>
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

    $('.quickLinks').change(function(){
        var value = $(this).val();
        var slot = $(this).attr('id');
        var slot = slot.replace(/[^0-9]/g, '');

        $.ajax({
                        url: base_url+'adminEditQuickLinks',
                        method: 'post',
                        data: {location_id:value, id:slot},
                        success:function(msg)
                        {
                            msg = $.parseJSON(msg);
                            console.log(msg);
                            if(msg.status==true)
                            {
                                alert('Value Changed!');
                            }
                            else
                            {
                                alert('Something wrong!');
                            }
                        }
                });
    });

    // $('#addNewDevBtn').click(function(){
    //   $.ajax({
    //             url:base_url+'addNewDevForm',
    //             method:'POST',
    //             data: $('#newDeveloperForm').serialize(),
    //             success:function(msg)
    //             {
    //               msg = $.parseJSON(msg);
    //               console.log(msg);

    //               if(msg.status==true)
    //               {
    //                   alert("New Project Added!");
    //                   location.reload();                
    //               }
    //               else
    //               {
    //                   alert("Something wrong");
    //               }

    //             }
    //           });
    // });


  });


</script>
</body>
</html>


