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
      <?php echo $records[0]['developerName'] ?>

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
          <h3 class="box-title">Project Details</h3>
          <button class="btn btn-sm btn-success pull-right">Edit Project Details</button>
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form id="updateProjectForm" action="<?php echo base_url() ?>index.php/AdminDashboard/updateProjectForm" method="POST" enctype="multipart/form-data">
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">

                <div class="form-group">
                  <label for="developer_id">Developer:</label>
                  <span><?php echo $records[0]['developerName'] ?></span>
                  <input type="hidden" name="project_id" value="<?=$records[0]['project_id']?>">
                </div>

                <div class="form-group">
                  <label for="eProjectName">Project Name:</label>
                  <input type="text" class="form-control" value="<?php echo isset($records[0]['name']) ? $records[0]['name'] : '' ?>" name="name" id="name">
                </div>

                <div class="form-group">
                  <label for="location_id">Location:</label>
                  <select id="location_id" name="location_id" class="form-control select2">
                    <?php foreach($records['locations'] as $loc) {  ?>
                    <option value="<?=$loc['locationId']?>" <?php echo $loc['locationId'] == $records[0]['location_id'] ? 'selected' : '' ?>><?=$loc['locationName']?>(<?=$loc['cityName']?>)</option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>
                    <input type="checkbox" id="gated_community" name="gated_community" class="minimal" <?php echo $records[0]['gated_community'] == 1 ? 'checked' : '' ?> >Gated Community
                  </label>
                </div>

                <div class="form-group">
                  <label for="property_type">Property Type:</label>
                  <select id="property_type_id" name="property_type_id" class="form-control select2">
                    <?php foreach($records['propertyType'] as $pt) { ?>
                    <option value="<?=$pt['property_type_id']?>" <?php echo $pt['property_type_id'] == $records[0]['property_type_id'] ? 'selected' : '' ?> ><?=$pt['name']?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Address</label>
                    <textarea class="form-control" name="address" id="address"><?php echo $records[0]['address'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="">Description</label>
                    <textarea class="form-control" name="description" id="description"><?php echo $records[0]['description'] ?></textarea>
                </div>

                <div class="form-group">
                <label>Facilities:</label>
                <select class="form-control select2 facilities_id" id="facilities_id" name="facilities_id[]" multiple="multiple" data-placeholder="Select or Add New Faclilties"
                        style="width: 100%;">
                    <?php foreach($records['facilities'] as $f) { ?>
                        <option value="<?=$f['facilities_id']?>" <?php echo in_array($f['facilities_id'], $records['project_facilities']) ? 'selected' : '' ?> ><?=$f['name']?></option>
                    <?php } ?>
                </select>
                </div>


                <div class="form-group new">
                  <label for="mgrName">Project Manager Name:</label>
                  <input type="text" class="form-control" name="newMgrName" id="newMgrName" value="<?php echo $records[0]['project_mgr_name'] ?>">
                </div>

                <div class="form-group new">
                  <label for="newMgrEmail">Project Manager Email:</label>
                  <input type="email" class="form-control" name="newMgrEmail" id="newMgrEmail" value="<?php echo $records[0]['project_mgr_email'] ?>">
                </div>

                <div class="form-group new">
                  <label for="newMgrEmail">Project Manager Phone:</label>
                  <input type="number" class="form-control" name="newProjectMgrPhone" id="newProjectMgrPhone" value="<?php echo $records[0]['project_mgr_phone'] ?>" >
                </div>

                <!-- MAYBE NO.OF.PROPERTIES AVAILABLE EACH PROPERTY SIZE,BHK ETC -->
                <div class="form-group">
                  <label for="">Total Units</label>
                    <input type="number" min="0" class="form-control" name="total_units" id="total_units" value="<?=$records[0]['total_units']?>">
                </div>


                <div class="form-group">
                  <label for="">Size Min (sqft)</label>
                    <input type="number" min="0" class="form-control" name="size_min" id="size_min" value="<?=$records[0]['size_min']?>">
                </div>

                <div class="form-group">
                  <label for="">Size Max (sqft)</label>
                    <input type="number" min="0" class="form-control" name="size_max" id="size_max" value="<?=$records[0]['size_max']?>">
                </div>

                <div class="form-group">
                  <label for="">Price Min</label>
                    <input type="number" min="0" class="form-control" name="price_min" id="price_min" value="<?=$records[0]['price_min']?>">
                </div>

                <div class="form-group">
                  <label for="">Price Max</label>
                    <input type="number" min="0" class="form-control" name="price_max" id="price_max" value="<?=$records[0]['price_max']?>">
                </div>

                <div class="form-group">
                  <label for="">Category:</label>
                  <select id="category" name="category" class="form-control select2">
                    <option value="residential" <?php echo $records[0]['category'] == 'residential' ? 'selected' : '' ?> >Residential</option>
                    <option value="commercial" <?php echo $records[0]['category'] == 'commercial' ? 'selected' : '' ?> >Commercial</option>
                  </select>
                </div>								<div class="form-group">                  <label for="">Property Status:</label>                  <select id="pStatus" name="pStatus" class="form-control select2">                    <option value="Ready to Move" <?php echo $records[0]['property_status'] == 'Ready to Move' ? 'selected' : '' ?> >Ready to Move</option>                    <option value="Under Construction" <?php echo $records[0]['property_status'] == 'Under Construction' ? 'selected' : '' ?> >Under Construction</option>                  </select>                </div>								<div class="form-group">                  <label for="">Sale Type:</label>                  <select id="saleType" name="saleType" class="form-control select2">                    <option value="New Project" <?php echo $records[0]['sale_type'] == 'New Project' ? 'selected' : '' ?> >New Project</option>                    <option value="Re-Sale" <?php echo $records[0]['sale_type'] == 'Re-Sale' ? 'selected' : '' ?> >Re-Sale</option>                  </select>                </div>								<div class="form-group">                  <label for="">Posted By:</label>                  <select id="postedBy" name="postedBy" class="form-control select2">                    <option value="Owner" <?php echo $records[0]['posted_by'] == 'Owner' ? 'selected' : '' ?> >Owner</option>                    <option value="Builder" <?php echo $records[0]['posted_by'] == 'Builder' ? 'selected' : '' ?> >Builder</option>					<option value="Broker" <?php echo $records[0]['posted_by'] == 'Broker' ? 'selected' : '' ?> >Broker</option>                  </select>                </div>
            
                <div class="row">

                  <div class="form-group col-md-6">
                    <label>Lat:</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" value="<?php echo $records[0]['latitude'] ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Long:</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" value="<?php echo $records[0]['longitude'] ?>" required>
                  </div>
                </div>
                <div class="form-group">
                <button type="button" id="choose-location-btn" data-toggle="modal" data-target="#mapModal" class="btn btn-success">View Maps</button>
                </div>

                <div class="form-group">
                  <label for="">Project Logo:</label>
                  <input type="file" name="projectlogo[]">
                </div>

                <div class="form-group">
                  <label for="">Project Cover Picture:</label>
                  <input type="file" name="cover[]">
                </div>
                
                <div class="form-group">
                  <label for="">Project Images:</label>
                  <input type="file" name="userfile[]" multiple="multiple">
                </div>

                <div class="form-group">
                  <label for="">Project Brochure:</label>
                  <input type="file" name="userBrochure[]" multiple="multiple">
                </div>

                <div class="for">
				<?php if(!empty($records[0]['img_path'])){ ?>
					<p><button type="button" data-id="<?php echo $records[0]['img_path'].' '.$records[0]['project_id']; ?>" class="removeCover">remove cover image</button><img src="<?php echo base_url()?>assets/uploads/images/<?php echo $records[0]['img_path']; ?>" width="50px" title="<?php echo $records[0]['img_path']; ?> Cover Image" height="50px" /></p>
				<?php } ?>
                  <?php foreach($records['uploads'] as $u) { 						if($u['brochure']=='yes'){						?>						<p><button type="button" data-id="<?php echo $u['path']; ?>" class="removeBtn">remove project brochure</button><img src="<?php echo base_url()?>assets/admin/img/pdf.png" width="50px" title="<?php echo $u['path']; ?>" height="50px" /></p>						<?php } else { ?>
                        <p><button type="button" data-id="<?php echo $u['path']; ?>" class="removeBtn">remove project image</button><img src="<?php echo base_url()?>assets/uploads/images/<?php echo $u['path']; ?>" title="<?php echo $u['path']; ?> Project image" width="50px" height="50px" /></p>						<?php } ?>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label for="">Status:</label>
                  <select id="status" name="status" class="form-control select2">
                    <option value="enabled" <?php echo $records[0]['status'] == 'enabled' ? 'selected' : '' ?> >Enabled</option>
                    <option value="disabled" <?php echo $records[0]['status'] == 'disabled' ? 'selected' : '' ?> >Disabled</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Offers (if any):</label>
                  <input type="text" class="form-control" name="" id="" value="" disabled>
                </div>

              </div>
              <button type="submit" id="addProjectFormBtn" class="btn btn-success">Submit</button>

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

<!-- MAP MODAL STARTS -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA"
            async defer></script> -->
            

<div id="mapModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose Location</h4>
      </div>

      <div class="modal-body">
      <input id="pac-input" class="controls" type="text" style="width:60%" placeholder="Search Box" />

      <div id="map" style="width:500px;height:400px;">

            
      </div>


      </div>
      <div class="modal-footer">
        <div class="pull-left"><h5>Note: Search the location and place a marker by clicking</h5></div>
        <button type="button" class="btn btn-success" data-dismiss="modal">Confirm Location</button>
      </div>
    </div>

  </div>
</div>


<!-- MAP MODAL ENDS -->


<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA&callback=myMap" async defer></script>  -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA&libraries=places&callback=initAutocomplete" async defer></script> 

<script>
  
  
  //var latLong;

  // function myMap() 
  // {
  //     var mapCanvas = document.getElementById("map");

  //     //projectLatLong

  //     var mapOptions = {
  //       center: new google.maps.LatLng(13, 80), zoom: 10
  //     };

  //     var map = new google.maps.Map(mapCanvas, mapOptions);



  //     google.maps.event.addListener(map, 'click', function( event ){
        
  //       placeMarker(event.latLng);
  //       document.getElementById("latitude").value = event.latLng.lat();
  //       document.getElementById("longitude").value = event.latLng.lng();
  //     });


  //     var marker;
  //     function placeMarker(location) 
  //     {
  //         if ( marker ) 
  //         {
  //           marker.setPosition(location);
  //         } 
  //         else 
  //         {
  //             marker = new google.maps.Marker({
  //               position: location,
  //               map: map
  //             });
  //         }
  //     }


  //   }


      var latLong;
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 13.082680, lng: 80.270718},
          zoom: 14,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
        //////////////
        // ADD MARKER ON CLICK AND SET VALUE TO TEXTBOX
                google.maps.event.addListener(map, 'click', function( event ){
        
                  placeMarker(event.latLng);
                  document.getElementById("latitude").value = event.latLng.lat();
                  document.getElementById("longitude").value = event.latLng.lng();
                });


                var marker;
                function placeMarker(location) 
                {
                    if ( marker ) 
                    {
                      marker.setPosition(location);
                    } 
                    else 
                    {
                        marker = new google.maps.Marker({
                          position: location,
                          map: map
                        });
                    }
                }

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    


  $(document).ready(function(){

    

    ///////////////////////////////////////////
    ////////////////GENERAL////////////////////
    ///////////////////////////////////////////

    $('.facilities_id').select2({
        tags: true
    });



    ///////////////////////////////////////////
    ////////////////AJAX CALLS/////////////////
    ///////////////////////////////////////////
    
    $.ajax({
              url: base_url+'devOfAdminList',
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                        $('#developer_id').append('<option value='+value.developer_id+'>'+value.name+'</option>' );
                      });

              }
          });

    // $.ajax({
    //           url: base_url+'devProjectLocation',
    //           method: 'GET',
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             $.each(msg, function( index, value ) {
    //                     $('#location_id').append('<option value='+value.locationId+'>'+value.locationName+'( '+value.cityName+' )</option>' );
    //                   });

    //           }
    //       });

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

          
    // $.ajax({
    //           url: base_url+'devFacilities',
    //           method: 'GET',
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             $.each(msg, function( index, value ) {
    //                     $('#facilities_id').append("<option value="+value.facilities_id+">"+value.name+"</option>" );
    //                   });
                
    //           }
    //       });

    // $.ajax({
    //           url: base_url+'devKeywords',
    //           method: 'GET',
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             $.each(msg, function( index, value ) {
    //                     $('#keyword_id').append("<option value="+value.keyword_id+">"+value.name+"</option>" );
    //                   });
                
    //           }
    //       });

    // $.ajax({
    //           url: base_url+'projectManagerOfDev',
    //           method: 'GET',
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             console.log(msg);
    //             $.each(msg, function( index, value ) {
    //                     $('#project_mgr_id').append('<option value='+value.pm_id+'>'+value.name+' ( '+value.email+' )</option>' );
    //                   });
    //           }
    //       });

    // $('#addProjectFormBtn').click(function(e){
    //   e.preventDefault();
    //   console.log($('#addProjectForm').serialize());


    //   $.ajax({
    //           url: base_url+'addProjectForm',
    //           method: 'post',
    //           data: $('#addProjectForm').serialize(),
    //           success:function(msg)
    //           {
    //             msg = $.parseJSON(msg);
    //             console.log(msg);
    //             if(msg.status==true)
    //             {
    //               alert(msg.msg);
    //               //location.href= msg.redirectURL;
    //               location.href = base_url+'home';
    //             }
    //             else
    //             {
    //               alert('Something wrong!');
    //             }
    //           }
    //       });
      
    // });

    // $('#choose-location-btn').click(function(e){
    //   e.preventDefault();
    //   //mapModal
    // });

    

    $("#mapModal").on("shown.bs.modal", function () {
        google.maps.event.trigger(map, "resize");
    });

    


    $(document).on('click', '.removeBtn', function(e) {
        
      var name = $(this).data("id");
      $.ajax({
              type: "POST",
              url: base_url+'removeDevUpload',
              data: {"path":name},
              success:function(response)
              {
                console.log(response)
                response = $.parseJSON(response);
                if(response.status == 'true')
                {
                  //alert("success");
                  location.reload(true);
                }
                else
                {
                  alert("failed");
                }

              }
              
        });
    });

    $(document).on('click', '.removeCover', function(e) {  
		var name = $(this).data("id").split(" ")[0];
		var pId = $(this).data("id").split(" ")[1];
		$.ajax({
              type: "POST",
              url: base_url+'removeProjctCover',
              data: "path="+name+"&pId="+pId,
              success:function(response)
              {
                console.log(response)
                response = $.parseJSON(response);
                if(response.status == 'true')
                {
                  //alert("success");
                  location.reload(true);
                }
                else
                {
                  alert("failed");
                }

              }
              
        });
	});
      




      


    
    
  });
</script>



</body>
</html>
