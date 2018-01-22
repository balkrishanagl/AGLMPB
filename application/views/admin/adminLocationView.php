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
              <div class="button-spacing"> 
                <button type="button" id="addDevModalBtn" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default">
                Add Location
                </button>              
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Location ID</th>
                  <th>Location Name</th>
                  <th>City</th>
                  <th>Zone</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($records['locations'] as $r) { ?>
                <tr>
                  <td><?=$r['location_id']?></td>
                  <td><?=$r['locationName']?></td>
                  <?php foreach($records['cities'] as $c) { ?>
                  <td><?php echo $r['locCityId'] == $c['cityId'] ?  $c['cityName'] : '' ?></td>
                  <?php } ?>
                  <td><?=$r['zone']?></td>
                  <td><?=$r['status']?></td>
                  <td><button data-id="<?=$r['location_id']?>" data-details='<?php echo json_encode($r) ?>' class="btn btn-info btn-sm editLocationBtn">Edit</td>
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
  <!-- ADD NEW LOCATION MODAL -->
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Location</h4>
              </div>
              <div class="modal-body">
              <form id="newLocationForm">
                <div class="form-group">
                  <label for="dName">Location Name:</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                  <label for="dName">City:</label>
                  <?php foreach($records['cities'] as $c) { ?>
                    <select id="city_id" name="city_id" class="select2">
                      <option value="<?=$c['cityId']?>"><?=ucfirst($c['cityName'])?></option>
                    </select>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="dName">Zone:</label>
                  <select id="zone" name="zone" class="select2">
                    <option value="north">North</option>
                    <option value="east">East</option>
                    <option value="west">West</option>
                    <option value="south">South</option>
                    <option value="central">Central</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="dName">Status:</label>
                  <select id="status" name="status" class="select2">
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                  </select>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addNewLocationBtn">Add Location</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- End Modal -->

    <!-- EDIT LOCATION MODAL -->
    <div class="modal fade" id="editLocationModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Location</h4>
              </div>
              <div class="modal-body">
              <form id="editLocationForm">
                <div class="form-group">
                  <label for="dName">Location Name:</label>
                  <input type="text" class="form-control" name="name" id="eName">
                  <input type="hidden" class="form-control" name="eId" id="eId">
                </div>

                <div class="form-group">
                  <label for="dName">City:</label>
                  <?php foreach($records['cities'] as $c) { ?>
                    <select id="city_id" name="city_id" class="select2">
                      <option value="<?=$c['cityId']?>"><?php echo ucfirst($c['cityName'])?></option>
                    </select>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="dName">Zone:</label>
                  <select id="eZone" name="zone" class="select2">
                    <option value="north">North</option>
                    <option value="east">East</option>
                    <option value="west">West</option>
                    <option value="south">South</option>
                    <option value="central">Central</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="dName">Status:</label>
                  <select id="eStatus" name="status" class="select2">
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                  </select>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editLocationSubmitBtn">Edit Location</button>
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
  })

  $(document).ready(function(){

    $('#addNewLocationBtn').click(function(e){
      e.preventDefault();
      //console.log($('#newLocationForm').serialize());
      $.ajax({
                url:base_url+'adminAddLocationForm',
                method:'POST',
                data: $('#newLocationForm').serialize(),
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


    //$('.editLocationBtn').click(function(){
    $('#example1').on('click','.editLocationBtn',function(){
      var eId = $(this).attr('data-id');
      var details = $(this).attr("data-details");
      var obj = $.parseJSON( details );
      $('#eId').val(eId);
      $('#eName').val(obj.locationName);
      $('#eZone').val(obj.zone).change();
      $('#eCity').val(obj.locCityId);
      $('#eStatus').val(obj.status).change();
      $('#editLocationModal').modal('show');
    });

    $('#editLocationSubmitBtn').click(function(e){
      e.preventDefault();
      $.ajax({
                url:base_url+'adminAddLocationForm',
                method:'POST',
                data: $('#editLocationForm').serialize(),
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







  });





</script>
</body>
</html>
