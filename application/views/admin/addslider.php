<?php include 'headers.php' ?>
<style>
  .lat-long
  {
    display: block;
    /* width: 200px; */
    float: left;
  }

  #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  .pac-container { z-index: 10000 !important; }

</style>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include 'adminNavbar.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Slider

        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Slider</li>
      </ol>

      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Images</h3>
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form id="addSliderForm" name="addSliderForm" action="<?php echo base_url() ?>index.php/AdminDashboard/addImgForm" method="POST" enctype="multipart/form-data">
         <div class="form-group col-md-6">
           <div class="form-group">
                  <label for="sldr_developer">Developer:</label>
                  <select id="sldr_developer" name="sldr_developer" class="form-control select2">
                    <option value="">Select One</option>
                  </select>
                </div>
            <div class="form-group">
              <label for="sldr_project">Project:</label>
              <select id="sldr_project" name="sldr_project" class="form-control select2">
                <option value="">Select One</option>
              </select>
            </div>

            <!-- <div class="form-group">
              <label for="slder_name">Project Name</label>
              <input name="slder_name" class="form-control" id="slder_name">
            </div>

            <div class="form-group">
              <label for="sldr_location">Project Location</label>
              <input name="sldr_location" class="form-control" id="sldr_location">
            </div>

            <div class="form-group">
              <label for="sldr_price">Project Price</label>
              <input name="sldr_price" class="form-control" id="sldr_price
              ">
            </div> -->


          <div class="form-group">
              <div class="box-body no-padding">
    
                <div class="form-group">
                  <label for="sldr_options">Options</label>
                  <ul class="row">
                            <span class="col-xs-6">
                              <input name="sldr_options" type="radio" value="1" id="opt1" />
                              <label for="opt1">Trending Projects</label>
                            </span>
                            <span class="col-xs-6">
                              <input name="sldr_options" type="radio" value="2" id="opt2" />
                              <label for="opt2">New Projects</label>
                            </span>
                            <span class="col-xs-6">
                              <input name="sldr_options" type="radio"  value="3" id="opt3" />
                              <label for="opt3">Luxury Living</label>
                            </span>
                            <span class="col-xs-6">
                              <input name="sldr_options" type="radio" value="4" id="opt3" />
                              <label for="opt4">Affordable Homes</label>
                            </span>
                          </ul>
                </div>

                <div class="box-body table-responsive no-padding">

                <div class="form-group">
                  <label for="">Banner Picture:</label>
                  <input type="hidden" name="imgType" value="banner">
                  <input type="file" name="cover[]">
                </div>

              </div>

              </div>
              <button type="submit" id="addProjectFormBtn" class="btn btn-success">Submit</button>

          </div>
          </div>

          </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>
        <!-- /.box-footer-->
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
<script type="text/javascript">
  
$(document).ready(function(){

  $.ajax({
              url: base_url+'devOfAdminList',
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                        $('#sldr_developer').append('<option value='+value.developer_id+'>'+value.name+'</option>' );
                      });

              }
    });
/*
  var e1 = $("#sldr_developer").select2();*/

  $("#sldr_developer").change(function(){
    var buldId = $(this).val();
    // alert(buldId);

    $.ajax({
              url: base_url+'projectsbyBuilder',
              data: {"id":buldId},
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                        $('#sldr_project').append('<option value='+value.project_id+'>'+value.name+'</option>' );
                      });

              }
    });

  });
  /*  var img_url="<?php echo base_url();?>assets/uploads/images"
    $.ajax({
            url: base_url+'getFooterImgList',
            method: 'GET',
            success:function(msg)
            {
              msg = $.parseJSON(msg);
              console.log(msg);
              $.each(msg, function( index, value ) {
                console.log(value.name);
                      $('#existing_images').append('<div id="'+value.name+'"><img src="'+img_url+'/'+value.name+'"  width="200" height="100"><br><button type="button" data-id="'+value.name+'" class="removeBtn">Remove</button></div>');
              });

            }
    });

    $(document).on('click', '.removeBtn', function(e) {
        
      var name = $(this).data("id");
      $.ajax({
              type: "POST",
              url: base_url+'removeFooterImg',
              data: {"name":name},
              success:function(response)
              {
                console.log(response)
                response = $.parseJSON(response);
                if(response.status == 'true')
                {
                  //alert("success");
                  location.reload(true);
                  //$('#'+name+ 'img button').html('');
                }
                else{
                  alert("failed");
                }

              }
              
        });
    });
*/

});

</script>

</body>
</html>
