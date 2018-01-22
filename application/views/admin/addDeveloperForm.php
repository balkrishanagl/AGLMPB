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
      Add Developer

        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>

      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Developer Details</h3>
          <!-- <button class="btn btn-sm btn-success pull-right">Edit Project Details</button> -->
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
              <!--  action="<?php // echo base_url() ?>index.php/AdminDashboard/addNewDevForm" method="POST" enctype="multipart/form-data" -->
              <form name="newDeveloperForm" action="<?php echo base_url() ?>index.php/AdminDashboard/addNewDevForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="dName">Developer Name:</label>
                  <input type="text" class="form-control" name="name" id="name" >
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Name:</label>
                  <input type="text" class="form-control" name="contact_name" id="contact_name" >
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Email:</label>
                  <input type="email" class="form-control" name="contact_email" id="contact_email" >
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Phone:</label>
                  <input type="number" class="form-control" name="contact_phone" id="contact_phone" >
                </div>

                <div class="form-group">
                  <label for="dName">Contact Person Address:</label>
                  <textarea class="form-control" name="contact_address" id="contact_address" ></textarea>
                </div>
                
                <div class="form-group">
                  <label for="dName">About Developer:</label>
                  <textarea class="form-control" name="description" id="dev_description" ></textarea>
                </div>

                <div class="form-group">
                  <label for="dName">Allowed Listings:</label>
                  <input type="number" class="form-control" name="allowed_listings" id="allowed_listings" >
                </div>

                <div class="form-group">
                  <label for="dName">Status:</label><br>
                  <select id="status" name="status" style="width:50%" class="select2" >
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                  </select>
                </div>

              <div class="form-group">
                <label for="">Developer Logo:</label>
                <input type="file" id="userfile" name="userfile[]">
              </div>

              </div>
              <button type="submit" class="btn btn-primary" id="addNewDevBtn">Add Developer</button>
            </form>

          </div>

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

<script>

            $(document).ready(function (e) {
              
              
                // $('#addNewDevBtn').on('click', function (e) {
                //   e.preventDefault();
                //     //   if($('#newDeveloperForm').validate())
                //     //   {
                //     //     alert('hello');
                //     //   }
                //     //   else
                //     //   {
                //     //     alert();
                //     //   }
                //     // return false;
                //     var file_data = $('#userfile').prop('files')[0];
                //     var form_data = new FormData($('#newDeveloperForm')[0]);
                    
                //     form_data.append('file', file_data);
                //     console.log('file:',file_data);
                //     console.log('form_data:',form_data);
                //     $.ajax({
                //         url: base_url+'addNewDevForm', 
                //         dataType: 'text', 
                //         cache: false,
                //         contentType: false,
                //         processData: false,
                //         data: form_data,
                //         type: 'post',
                //         success:function(msg)
                //         {
                //           msg = $.parseJSON(msg);
                //             if(msg.status==true)
                //             {
                //               alert('Added Developer Successfully!');
                //               location.href= msg.redirectURL;
                //             }
                //             else
                //             {
                //               alert(msg.msg);
                //             }
                //         }
                //     });
                // });

            });



</script>

</body>
</html>
