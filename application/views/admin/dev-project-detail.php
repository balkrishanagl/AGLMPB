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
        <?=$records[0]['name']?>
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
          <h3 class="box-title">Project Details</h3>
          
          <!-- <div class="button-spacing"> -->
          <?php if($records['totalListings'] < $records['allowedListings']) { ?>
          <a href="<?php base_url() ?>addListing?id=<?=$records[0]['project_id'] ?>" class="btn btn-sm btn-success pull-right">Add New Listing</a>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#noListingModal">Add New Listing</button>
          <?php } ?>
          <!-- </div> -->

        </div>
        <div class="box-body">
          <?php // echo '<pre>'; print_r($records); echo'</pre>' ?>
          <form>
          <div class="form-group col-md-6">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                      <tr>
                        <td><b>Project Name</b></td>
                        <td><?=$records[0]['name']?></td>
                      </tr>
                      <tr>
                        <td><b>Manager Name</b></td>
                        <td><?=$records[0]['project_mgr_name']?></td>
                      </tr>
                      <tr>
                        <td><b>City</b></td>
                        <td><?=ucfirst($records[0]['city_name'])?></td>
                      </tr>
                      <tr>
                        <td><b>Location</b></td>
                        <td><?=ucfirst($records[0]['location_name'])?></td>
                      </tr>
                      <tr>
                        <td><b>Property Type</b></td>
                        <td><?=$records[0]['property_type_name']?></td>
                      </tr>
                      <tr>
                        <td><b>Gated Community</b></td>
                        <td><?= ($records[0]['gated_community'] == '1') ? "Yes" : "No" ?></td>
                      </tr>
                      <tr>
                        <td><b>Description</b></td>
                        <td><?=$records[0]['description']?></td>
                      </tr>
                      <tr>
                        <td><b>No.of.units</b></td>
                        <td><?=$records[0]['total_units']?></td>
                      </tr>
                      <tr>
                        <td><b>Facilities</b></td>
                        <td>
                          <ul>
                            <?php foreach($records['facilities'] as $f) { ?>
                            <li><?=$f['facility_name']?></li>
                            <?php } ?>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Project Manager</b></td>
                        <td><?=$records[0]['project_mgr_name']?></td>
                      </tr>
                      <tr>
                        <td><b>Project Manager Email</b></td>
                        <td><?=$records[0]['project_mgr_email']?></td>
                      </tr>
                      <tr>
                      <tr>
                        <td><b>Search Keywords</b></td>
                        <td>
                          <ul>
                            <?php foreach($records['keywords'] as $k) { ?>
                            <li><?=$k['keyword_name']?></li>
                            <?php } ?>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Address</b></td>
                        <td><?=$records[0]['address']?></td>
                      </tr>

                      <tr>
                        <td><b>Minimum Price</b></td>
                        <td><?=$records[0]['price_min']?></td>
                      </tr>
                      <tr>
                        <td><b>Maximum Price</b></td>
                        <td><?=$records[0]['price_max']?></td>
                      </tr>
                      <tr>
                        <td><b>Category</b></td>
                        <td><?=$records[0]['category']?></td>
                      </tr>
                      <!-- <tr>
                        <td><b>Map Location</b></td>
                        <td>13.067439,‎80.237617</td>
                      </tr> -->
                  </tbody>
                </table>
              </div>
          </div>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>
        <h3 class="box-title">Listings </h3>
        <!-- ACCORDIAN START /.box-header -->
        <div class="box-body">
              <div class="box-group" id="accordion">
                <?php $i = 1; foreach ($records['listings'] as $list) { ?>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title" style="width:100%">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-<?=$i?>">
                        <?=$list['bhk']?> BHK | Rs.<?=$list['price']?> | <?=($list['property_status'] == 1) ? "Ready to Move":"Under Construction" ?> | <?=$list['property_list_name_listings']?>
                      </a>
                      <a class="btn btn-sm btn-primary pull-right" href="<?=base_url()?>index.php/adminDashboard/editListing?id=<?=encrypt($list['listing_id'])?>" type="submit">Edit</a>

                      <!-- <div class="pull-right"><a class="btn btn-primary">Edit</a></div> -->
                      
                    </h4>
                  </div>
                  <div id="collapseOne-<?=$i?>" class="panel-collapse collapse in">
                    <div class="box-body">
                    <div class="col-md-6">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td><b>Description</b></td>
                          <td><?=$list['description']?></td>
                        </tr>
                        <tr>
                          <td><b>Size</b></td>
                          <td><?=$list['size']?></td>
                        </tr>
                        <tr>
                          <td><b>Price</b></td>
                          <td><?=$list['price']?></td>
                        </tr>
                        <tr>
                          <td><b>BHK</b></td>
                          <td><?=$list['bhk']?></td>
                        </tr>
                        <tr>
                          <td><b>No of Bathrooms</b></td>
                          <td><?=$list['bathrooms']?></td>
                        </tr>
                        <tr>
                          <td><b>Price per Sqft</b></td>
                          <td><?=$list['sqft_price']?></td>
                        </tr>
                        <tr>
                          <td><b>Super Built up Area</b></td>
                          <td><?=$list['super_build_area']?></td>
                        </tr>
                        <tr>
                          <td><b>Carpet Area</b></td>
                          <td><?=$list['carpet_area']?></td>
                        </tr>
                        <tr>
                          <td><b>Available Listings</b></td>
                          <td><?=$list['available_listings']?></td>
                        </tr>
                        <tr>
                          <td><b>Property Type</b></td>
                          <td><?=$list['property_list_name_listings']?></td>
                        </tr>
                        <tr>
                          <td><b>Property Status</b></td>
                          <td><?=($list['property_status'] == 1) ? "Ready to Move":"Under Construction"?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </div>
                  </div>
                </div>
                <?php $i++; } ?>
              </div>
        </div>
        <!-- ACCORDIAN END /.box-body -->




        <!-- /.box-footer MAIN FOOTER-->
      </div>
      <!-- /.box -->

      <!-- NO LISTING MODAL START -->
      <div id="noListingModal" class="modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">No listing available</h4>
            </div>
            <div class="modal-body">
              <p>You have reached the maximum limit for adding listings. Please contact MyPropertyBotique Customer Service to add more listings.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- NO LISTING MODAL END -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOOTER LINKS -->
<?php include 'footers.php'; ?>
</div>
<!-- ./wrapper -->



</body>
</html>
