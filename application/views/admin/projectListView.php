<?php include 'headers.php'; 
$msgs = $this->uri->segment(3);
if($msgs=='failed'){
?>
<script>
alert('Something went wrong while saving your data');
</script>
<?php } else if($msgs=='pass'){ ?>
<script>
alert('Successfully added new records.');
</script>
<?php }else if($msgs=='duplicate'){ ?>
<script>
alert('remove duplicate entries from csv');
</script>
<?php }else{ } ?>
<style>
      .button-spacing{
        padding-top: 10px;
        padding-right: 20px;
        float: right;
      }
      .exp_imp_list {
    float: right;
}
.exp_imp_list ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.exp_imp_list ul li {
    float: left;
    padding-left: 10px;
    font-size: 14px;
    text-transform: uppercase;
    line-height: 30px;
}
.exp_imp_list ul li:first-child{
padding-left:0;
}
.exp_imp_list ul li a {
    float: left;
}
.exp_imp_list ul li a >img {
    height: 30px;
}        
.exp_imp_list ul li .form-control, .exp_imp_list ul li .career_browse{ display: none;}
.exp_imp_list ul li .btn{ line-height: 30px; font-size: 12px; text-align: left; padding: 0 15px; text-transform: none; border-radius: 0; border: none;}
.exp_imp_list ul li .input-group-btn {
    display: inline-block;
}  
.exp_imp_list ul li .input-group {
    float: left;
    padding-right: 5px;
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
              <!--<h3 class="box-title">Projects</h3>-->
			  <div class="pull-left">
                <a class="btn btn-success" href="<?php echo base_url() ?>index.php/adminDashboard/devAddProject">Add Project</a>
                             
              </div>
              <div class="exp_imp_list">
              <ul>
              <li>
		<a id="expProLink" href="<?=base_url()?>index.php/AdminDashboard/export_projects_list/"><img src="<?=base_url()?>assets/admin/img/export.png" title="Export" alt="export" class="expImg" /></a>
		</li>
		<li>
		or
		</li>
		<li>
		<form name="importProp" id="importProp" class="importProp" action="<?=base_url()?>index.php/AdminDashboard/import_projects_list" method="post" enctype="multipart/form-data">
		  <div class="input-group"> 
		  	<input type="file" class="career_browse" id="browse" name="fileupload" accept=".csv" onChange="Handlechange();" /> 
			<span class="input-group-btn"> 			
                  		<input type="button" class="btn btn-success" value="Import" id="fakeBrowse" onclick="HandleBrowseClick();"/> 
                  	</span> 
                  	<input type="text" class="form-control" id="filename" placeholder="No file selected." readonly/> 
                  </div>
            <input type="submit" class="btn btn-primary" name="impSbmt" id="impSbmt" />
		</form>
		</li>
		</ul>
	      </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Project Name</th>
                  <th>Developer Name</th>
                  <th>View / Edit</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				foreach($records as $r) { ?>
                <tr>
                  <td><?=$r['project_id']?></td>
                  <td><?=$r['projectName']?></td>
                  <td><?=$r['devName']?></td>
                  <td><a href="<?=base_url()?>index.php/AdminDashboard/editProject?id=<?=encrypt($r['project_id'])?>" class="btn btn-success">Edit</a></td>
				  <td>
				  <?php if($r['status']=='enabled'){?>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_project('<?php echo $r['project_id']; ?>', '0')">Active</a>
					<?php }else{ ?>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="delete_project('<?php echo $r['project_id']; ?>', '1')">Inactive</a>
					<?php } ?>
				  </td>
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

function delete_project(id,status){
	if(status=='0')
		var r = confirm('Are you sure you want to delete this project?');
	else
		var r = confirm('Are you sure to you want to Activate this status?');
	
	if(r==true){
		window.location.href = '<?=base_url()?>index.php/AdminDashboard/delete_project/'+id+'/'+status;
	}
}
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


// Function for input type browse 
function HandleBrowseClick() { "use strict"; var fileinput = document.getElementById("browse"); fileinput.click(); } 
function Handlechange() { "use strict"; var fileinput = document.getElementById("browse"); var textinput = document.getElementById("filename"); textinput.value = fileinput.value; }  

$(document).ready(function(){
  $( "body" ).on('keyup','#example1_filter > label > input',function() {
  var hhrreeff="<?=base_url()?>index.php/AdminDashboard/export_projects_list/";
  var sr = $( "#example1_filter > label > input" ).val();
  var ehref = $("#expProLink").attr("href");
  if(hhrreeff==ehref ){
    $("#expProLink").attr('href', ehref + sr)
  }else{
    $("#expProLink").attr('href', hhrreeff+ sr)
  }
  });
});

</script>
</body>
</html>
