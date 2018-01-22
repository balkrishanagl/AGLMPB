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
      Casa Grande

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
          <h3 class="box-title">Listing Details</h3>
          <button class="btn btn-sm btn-success pull-right">Edit Listing Details</button>
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form id="editListingForm" action="<?php echo base_url() ?>index.php/AdminDashboard/editListingForm" method="POST" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" -->
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
                <?php /*
                <div class="form-group">
                  <label for="location_id">Developer Name:</label>
                  <input type="text" disabled value="<?=$records[0]['developer_name']?>" class="form-control">                  
                  <input type="hidden" name="developer_id" value="<?=$records[0]['developer_id']?>" class="form-control">                  
                  <input type="hidden" name="project_id" value="<?=$records[0]['project_id']?>" class="form-control">                  
                </div>

                <div class="form-group">
                  <label for="eProjectName">Project Name:</label>
                  <input type="text" disabled value="<?=$records[0]['project_name']?>" class="form-control">
                </div>
                */ ?>

                <div class="form-group">
                  <label for="bhk">BHK:</label>
                  <select id="bhk" name="bhk" class="form-control select2">
                    <option value="">Select One</option>
                    <option value="1" <?php echo $records[0]['bhk'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?php echo $records[0]['bhk'] == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?php echo $records[0]['bhk'] == 3 ? 'selected' : '' ?>>3</option>
                    <option value="4" <?php echo $records[0]['bhk'] == 4 ? 'selected' : '' ?>>4</option>
                    <option value="5" <?php echo $records[0]['bhk'] == 5 ? 'selected' : '' ?>>5</option>
                    <option value="6" <?php echo $records[0]['bhk'] == 6 ? 'selected' : '' ?>>6</option>
                    <option value="7" <?php echo $records[0]['bhk'] == 7 ? 'selected' : '' ?>>7</option>
                    <option value="8" <?php echo $records[0]['bhk'] == 8 ? 'selected' : '' ?>>9</option>
                    <option value="9" <?php echo $records[0]['bhk'] == 9 ? 'selected' : '' ?>>9</option>
                    <option value="10" <?php echo $records[0]['bhk'] == 10 ? 'selected' : '' ?>>10</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">No of Bathrooms</label>
                    <input type="number" min="0" class="form-control" name="bathrooms" id="bathrooms" value="<?php echo isset($records[0]['bathrooms']) ? $records[0]['bathrooms'] : ''  ?>">
                </div>

                <div class="form-group">
                  <label for="">Size (sqft)</label>
                    <input type="number" min="0" class="form-control" name="size" id="size" value="<?php echo isset($records[0]['size']) ? $records[0]['size'] : ''  ?>">
                </div>

                <div class="form-group">
                  <label for="">Super Built Up Area (sqft)</label>
                    <input type="number" min="0" class="form-control" name="super_build_area" id="super_build_area" value="<?php echo isset($records[0]['super_build_area']) ? $records[0]['super_build_area'] : ''  ?>">
                </div>

                <div class="form-group">
                  <label for="">Carpet Area (sqft)</label>
                    <input type="number" min="0" class="form-control" name="carpet_area" id="carpet_area" value="<?php echo isset($records[0]['carpet_area']) ? $records[0]['carpet_area'] : ''  ?>">
                </div>


                <div class="form-group">
                  <label for="">Description</label>
                    <textarea class="form-control" name="description" id="description"><?php echo isset($records[0]['description']) ? $records[0]['description'] : ''  ?></textarea>
                </div>

                <div class="form-group">
                  <label for="">Available Listings</label>
                    <input type="number" min="0" class="form-control" name="available_listings" id="available_listings" value="<?php echo isset($records[0]['available_listings']) ? $records[0]['available_listings'] : ''  ?>">
                </div>

                <div class="form-group">
                  <label for="property_type">Property Type:</label>
                  <select id="property_type_id" name="property_type_id" class="form-control select2">
                    <?php foreach($records['propertyType'] as $pt) { ?>
                    <option value="<?=$pt['property_type_id']?>" <?php echo $records[0]['property_type_id'] == $pt['property_type_id'] ? 'selected' : '' ?> ><?=$pt['name']?></option>
                    <?php } ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="pName">Property Status:</label>
                  <select id="property_status" name="property_status" class="form-control select2">
                    <option value="">Select One</option>
                    <option value="1" <?php echo $records[0]['property_status'] == 1 ? 'selected' : ''  ?>>Ready To Move</option>
                    <option value="2" <?php echo $records[0]['property_status'] == 2 ? 'selected' : ''  ?>>Under Construction</option>
                  </select>
                </div>

                <!-- MAYBE NO.OF.PROPERTIES AVAILABLE EACH PROPERTY SIZE,BHK ETC -->

                <div class="form-group">
                  <label for="">Price</label>
                    <input type="number" min="0" class="form-control" name="price" id="price" value="<?php echo isset($records[0]['price']) ? $records[0]['price'] : ''  ?>">
                </div>

                <div class="form-group">
                  <label for="">Price per sqft</label>
                    <input type="number" min="0" class="form-control" name="sqft_price" id="sqft_price" value="<?php echo isset($records[0]['sqft_price']) ? $records[0]['sqft_price'] : ''  ?>">
                    <input type="hidden" name="listing_id" id="listing_id" value="<?php echo $records[0]['listing_id'] ?>">
                </div>

                
                <div class="form-group">
                  <label for="">Image Upload:</label>
                  <input type="file" name="userfile[]">
                  <span>Note: Click on Choose File Button only if you want to change the image.</span>
                </div>

                <div class="form-group">
                  <label for="pName">Status:</label>
                  <select id="status" name="status" class="form-control select2">
                    <option value="">Select One</option>
                    <option value="enabled" <?php echo $records[0]['status'] == 'enabled' ? 'selected' : ''  ?>>Enabled</option>
                    <option value="disabled" <?php echo $records[0]['status'] == 'disabled' ? 'selected' : ''  ?>>Disabled</option>
                  </select>
                </div>

                 
              </div>
              <button type="submit" id="editSbmtBtn"  class="btn btn-success">Submit</button>

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

<script>
  $(document).ready(function(){

    ///////////////////////////////////////////
    ////////////////GENERAL////////////////////
    ///////////////////////////////////////////



    ///////////////////////////////////////////
    ////////////////AJAX CALLS/////////////////
    ///////////////////////////////////////////
    

    // $.ajax({
    //           url: base_url+'devPropertyType',
    //           method: 'GET',
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             $.each(msg, function( index, value ) {
    //                     $('#property_type_id').append('<option value='+value.property_type_id+'>'+value.name+'</option>' );
    //                   });
                
    //           }
    //       });




    // $('#addListingFormBtn').click(function(e){
    //   e.preventDefault();
    //   console.log($('#addListingForm').serialize());

    //   $.ajax({
    //           url: base_url+'addListingForm',
    //           method: 'post',
    //           data: $('#addListingForm').serialize(),
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             console.log(msg);
    //             if(msg.status==true)
    //             {
    //               alert(msg.msg);
    //               //location.href= msg.redirectURL;
    //               location.reload();
    //             }
    //             else
    //             {
    //               alert('Something wrong!');
    //             }
    //           }
    //       });
      
    // });

    




            
      




      


    
    
  });    $('#editSbmtBtn').click(function(){	var bhk = $('#bhk').val();	if(bhk==''){		alert('please select a bhk');		$('#bhk').focus();		return false;	}	var bathrooms = $('#bathrooms').val();	if(bathrooms==''){		alert('please enter number of bathrooms');		$('#bathrooms').focus();		return false;	}	var size = $('#size').val();	if(size==''){		alert('please enter size in sqft.');		$('#size').focus();		return false;	}	var super_build_area = $('#super_build_area').val();	if(super_build_area==''){		alert('please enter build area in sqft.');		$('#super_build_area').focus();		return false;	}	var carpet_area = $('#carpet_area').val();	if(carpet_area==''){		alert('please enter carpet area in sqft.');		$('#carpet_area').focus();		return false;	}	var description = $('#description').val();	if(description==''){		alert('please enter description.');		$('#description').focus();		return false;	}	var available_listings = $('#available_listings').val();	if(available_listings==''){		alert('please enter available listings.');		$('#available_listings').focus();		return false;	}	var property_type_id = $('#property_type_id').val();	if(property_type_id==''){		alert('please select a property type.');		$('#property_type_id').focus();		return false;	}	var property_status = $('#property_status').val();	if(property_status==''){		alert('please select a property status.');		$('#property_status').focus();		return false;	}	var price = $('#price').val();	if(price==''){		alert('please enter property price.');		$('#price').focus();		return false;	}	var sqft_price = $('#sqft_price').val();	if(sqft_price==''){		alert('please enter sqft price.');		$('#sqft_price').focus();		return false;	}	return true;});
</script>



</body>
</html>
