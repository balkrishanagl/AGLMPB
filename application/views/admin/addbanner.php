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
      Add Project

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
          <!-- <button class="btn btn-sm btn-success pull-right">Edit Project Details</button> -->
        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form id="addProjectForm" action="<?php echo base_url() ?>index.php/AdminDashboard/addProjectForm" method="POST" enctype="multipart/form-data">
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">

                <div class="form-group">
                  <label for="developer_id">Developer:</label>
                  <select id="developer_id" name="developer_id" class="form-control select2">
                    <option value="">Select One</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="eProjectName">Project Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group">
                  <label for="location_id">Location:</label>
                  <select id="location_id" name="location_id" class="form-control select2">
                    <option value="">Select One</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nearby Locations:</label>
                  <select class="form-control select2 nearby_id" id="nearby_id" name="nearby_id[]" multiple="multiple" data-placeholder="Select Nearby Locations"
                          style="width: 100%;">
                    <option>Select One</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>
                    <input type="checkbox" id="gated_community" name="gated_community" class="minimal">Gated Community
                  </label>
                </div>

                <div class="form-group">
                  <label for="property_type">Property Type:</label>
                  <select id="property_type_id" name="property_type_id" class="form-control select2">
                    <option value="">Select One</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="">Address</label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>

                <div class="form-group">
                  <label for="">Description</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>

                <div class="form-group">
                <label>Facilities:</label>
                <select class="form-control select2 facilities_id" id="facilities_id" name="facilities_id[]" multiple="multiple" data-placeholder="Select or Add New Faclilties"
                        style="width: 100%;">
                </select>
                </div>


                <div class="form-group new">
                  <label for="mgrName">Project Manager Name:</label>
                  <input type="text" class="form-control" name="newMgrName" id="newMgrName">
                </div>

                <div class="form-group new">
                  <label for="newMgrEmail">Project Manager Email:</label>
                  <input type="email" class="form-control" name="newMgrEmail" id="newMgrEmail" required>
                </div>

                <div class="form-group new">
                  <label for="newMgrEmail">Project Manager Phone:</label>
                  <input type="number" class="form-control" name="newProjectMgrPhone" id="newProjectMgrPhone">
                </div>

                <!-- MAYBE NO.OF.PROPERTIES AVAILABLE EACH PROPERTY SIZE,BHK ETC -->
                <div class="form-group">
                  <label for="">Total Units</label>
                    <input type="number" min="0" class="form-control" name="total_units" id="total_units">
                </div>


                <div class="form-group">
                  <label for="">Size Min (sqft)</label>
                    <input type="number" min="0" class="form-control" name="size_min" id="size_min">
                </div>

                <div class="form-group">
                  <label for="">Size Max (sqft)</label>
                    <input type="number" min="0" class="form-control" name="size_max" id="size_max">
                </div>

                <div class="form-group">
                  <label for="">Price Min</label>
                    <input type="number" min="0" class="form-control" name="price_min" id="price_min">
                </div>

                <div class="form-group">
                  <label for="">Price Max</label>
                    <input type="number" min="0" class="form-control" name="price_max" id="price_max">
                </div>

                <div class="form-group">
                  <label for="">Category:</label>
                  <select id="category" name="category" class="form-control select2">
                    <option value="1">Residential</option>
                    <option value="2">Commercial</option>
                  </select>
                </div>								
                <div class="form-group">                 
                 <label for="">Property Status:</label>                  
                 <select id="pStatus" name="pStatus" class="form-control select2">                    
                  <option value="1">Ready to Move</option>                    
                  <option value="2">Under Construction</option>                  
                </select>                
              </div>								
              <div class="form-group">                  
                <label for="">Sale Type:</label>                  
                <select id="saleType" name="saleType" class="form-control select2">                    
                  <option value="1">New Project</option>                    
                  <option value="2">Re-Sale</option>                  
                </select>                
              </div>								
              <div class="form-group">                 
              <label for="">Posted By:</label>                  
              <select id="postedBy" name="postedBy" class="form-control select2">                    
                <option value="1">Owner</option>                    
                <option value="2">Builder</option>					
                <option value="3">Broker</option>                  
              </select>                
            </div>

                <!-- <div class="form-group">
                <label>Search Keywords:</label>
                <select class="form-control select2 keyword_id" id="keyword_id" name="keyword_id[]" multiple="multiple" data-placeholder="Select or Add New Keywords"
                        style="width: 100%;">
                  <option>Select One</option>
                </select>
                </div> -->

                
                <div class="row">

                  <div class="form-group col-md-6">
                    <label>Lat:</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Long:</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" required>
                  </div>
                </div>
                <div class="form-group">
                <button type="button" id="choose-location-btn" data-toggle="modal" data-target="#mapModal" class="btn btn-success">View Maps</button>
                </div>

                <div class="form-group">
                  <label for="">Project Cover Picture:</label>
                  <input type="file" name="cover[]" multiple="multiple">
                </div>
                
                <div class="form-group">
                  <label for="">Project Images:</label>
                  <input type="file" name="userfile[]" multiple="multiple">
                </div>

                <div class="form-group">
                  <label for="">Project Brochure:</label>
                  <input type="file" name="userBrochure[]" multiple="multiple">
                </div>

                <!-- <div class="form-group">
                  <label for="">Offers (if any):</label>
                  <input type="text" class="form-control" name="" id="" value="" disabled>
                </div> -->

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

    $('.nearby_id').select2();


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

    $.ajax({
              url: base_url+'devProjectLocation',
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                    $('#location_id').append('<option value='+value.locationId+'>'+value.locationName+'( '+value.cityName+' )</option>' );
                    $('#nearby_id').append('<option value='+value.locationId+'>'+value.locationName+'( '+value.cityName+' )</option>' );
                });

              }
          });

    $.ajax({
              url: base_url+'devPropertyType',
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                        $('#property_type_id').append('<option value='+value.property_type_id+'>'+value.name+'</option>' );
                      });
                
              }
          });

          
    $.ajax({
              url: base_url+'devFacilities',
              method: 'GET',
              success:function(msg)
              {
                msg = $.parseJSON(msg);
                $.each(msg, function( index, value ) {
                        $('#facilities_id').append("<option value="+value.facilities_id+">"+value.name+"</option>" );
                      });
                
              }
          });

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

    $('#njksd').click(function(){

    });
    




            
      




      


    
    
  });
</script>



</body>
</html>
