<?php include 'headers.php' ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include 'adminNavbar.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$records['featured_page'][0]['name']?>
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <style>
      .button-spacing{
        padding-top: 10px;
        padding-right: 20px;
        float: right;
      }
          
    </style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Page Details</h3>
          <div class="button-spacing">
                <button type="button" id="addFeaturePage" class="btn btn-block btn-success" data-toggle="modal" data-target="#add-project-modal">
                Add Project
                </button> 
          </div>
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form action="<?=base_url()?>index.php/AdminDashboard/updateFeaturedPages" id="updateFeaturedPages" enctype="multipart/form-data" method="POST">

            <label for="feature_image">Featured Name</label>
            <input type="text" class="form-control" required value="<?=$records['featured_page'][0]['name']?>" style="width:40%" name="feature_name" id="feature_name"><br>
            <input type="hidden" class="form-control" name="feature_id" value="<?=$records['featured_page'][0]['id']?>"><br>

            <label for="feature_image">Featured Description</label>
            <textarea class="form-control" required style="width:40%" name="feature_description" id="feature_description"><?=$records['featured_page'][0]['description']?></textarea><br>

            <label for="feature_image">Cover Picture</label>
            <input type="file" class="form-control" name="cover[]" style="width:40%">  <br>  

            <button type="submit" id="addProjectFormBtn" class="btn btn-success">Submit</button>
          </form>
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
              <?php // echo '<pre>'; print_r($records); echo '</pre>';?>
              <h3>Projects</h3>
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php if($records['featured_projects'] != null) { ?>
                <?php foreach($records['featured_projects'] as $r) { ?>
                <tr>
                  <td><?=$r['projectName']?></td>
                  <td><button data-id="<?php echo $r['fpId']; ?>"  class="btn btn-danger btn-sm deleteProjectBtn">Delete</button></td>
                </tr>
                <?php } ?>
                <?php } ?>
              </table>

              </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>

        <!-- /.box-footer MAIN FOOTER-->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOOTER LINKS -->
<?php include 'footers.php'; ?>
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div id="add-project-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Featured Project</h4>
      </div>
      <div class="modal-body">
        <form id="addFeatureProjectForm">
            <label>Project Name</label>
            <select name="featuredProject" id="featuredProject" class="select2">
            </select>
            <input type="hidden" name="feature_id" value="<?=$records['featured_page'][0]['id']?>">

            <br>
            
      </div>
      <div class="modal-footer">
      <button type="submit" id="addFeatureProjectBtn" class="btn btn-success">Submit</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){

  $('#featuredProject').select2();

  $.ajax({
            url: base_url+'adminAllProjects',
            method: 'GET',
            success:function(msg)
            {
              msg = $.parseJSON(msg);
              if(msg != null)
              {
                console.log(msg);
                $.each(msg, function( index, value ) {
                    $('#featuredProject').append('<option value="'+value.project_id+'">'+value.projectName+'('+value.devName+')</option>');

                });
              }

            }
        });
  
});

$('#addFeatureProjectBtn').click(function(e){
  e.preventDefault();
  $.ajax({
            url: base_url+'addFeaturedProject',
            method: 'post',
            data: $('#addFeatureProjectForm').serialize(),
            success:function(msg)
            {
              msg = $.parseJSON(msg);
              console.log(msg);
              if(msg.status==true)
              {
                alert('Successfully added Featured Project!');
                location.reload();
              }
              else
              {
                alert('Something wrong!');
              }
            }
        });
  
});

//deleteFeaturedProject
$('.deleteProjectBtn').click(function(e){
  if(confirm('Are you sure that you want to delete this record?'))
  {
    var id = $(this).data("id");
    $.ajax({
              url: base_url+'deleteFeaturedProject',
              method: 'post',
              data: {id:id},
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                console.log(msg);
                if(msg.status==true)
                {
                  alert('Removed Featured Project Successfully!');
                  location.reload();
                }
                else
                {
                  alert('Something wrong!');
                }
              }
          });
  }

  
});
</script>


</body>
</html>
