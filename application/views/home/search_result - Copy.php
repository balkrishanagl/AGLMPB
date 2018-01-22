<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?= base_url() ?>assets/home/assets/css/style.css" rel="stylesheet">
	<!-- Take the line below out -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/home/assets2/css/style.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/home/assets2/css/bootstrap.min.css" >
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script src="<?= base_url() ?>assets/home/assets/js/jquery-3.2.1.min.js"></script>
 <script src="<?= base_url() ?>assets/home/assets/js/moment.js"></script>
 <style type="text/css">
 	select.new-drop {
    width: 116% !important;
	}
	#searchsubmit {
    border-radius: 0px !important;
    margin-left: -28px !important;
	}
	.navbar-brand>img {
	    /* display: block; */
	    margin-top: -7% !important;
	}
 </style>
</head>
<body>

<?php $this->load->view('home/top-bar'); ?>

	<div class="container-fluid">
			<div id="searchForm">
				<div class="wow fadeInDown" data-wow-duration="0.1s" data-wow-delay="0.8s">
					<form id="search_form" action="<?php echo base_url(); ?>index.php/home/search" method="post">
					  <div class="form-group ">
					    <span class="banner-drop col-lg-2 col-md-2 col-sm-3 col-xs-12">
					      <div class="dropdown">
					        <select id="city_id" name="city_id" class="new-drop">

					        </select>
					      </div>
					    </span>
					    <span class="banner-type-search col-lg-8 col-md-8 col-sm-6 col-xs-12">
					      <input type="text" id="mysearchinput" name="search_box" class="form-control" placeholder="Search" value="<?php echo isset($_SESSION['search_query']) && $_SESSION['search_query'] != null ? $_SESSION['search_query'] : '' ?>" autocomplete="off"></span> 
					      <span class="banner-search-btn col-lg-2 col-md-2 col-sm-3 col-xs-12">
					      <button type="submit" id="searchsubmit">Search</button>
					    </span>
					  </div>
<!-- 					</form> -->
                 </div>
			</div>
			<div class="container">
				<div class="col-md-12">



					<?php //21 echo '<pre>';print_r($records); echo'</pre>'; ?>
					<?php
					if($records != null)
					{
						?>
						
						<hr>
						<div class="col-md-3 sidebar">
							<!-- <div class="checkbox">
								<label><input type="checkbox" value="">Verified Listing</label>
							</div> -->

							
							<div class="budget_class">
								<!-- <h5>Budget</h5>
								<div class="col-md-4 nopadding">
									<input type="text" class="form-control" name="" placeholder="Min">
								</div>
								<div class="col-md-offset-1 col-md-4 col-md-offset-1 nopadding">
									<input type="text" class="form-control" name="" placeholder="Max">
								</div> -->
								<h5>Budget</h5>
								<div class="radio-group">
								<label>
									<input type="radio" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '1000000' ){echo 'checked';} ?> value="1000000">
									Below 10 Lakhs
								</label>
								</div>
								<div class="radio-group">
                                    <label>
                                        <input type="radio" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '2000000' ){echo 'checked';} ?> value="2000000">
                                        Below 20 Lakhs
                                    </label>
                                </div>
								<div class="radio-group">
                                    <label>
                                        <input type="radio" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '3000000' ){echo 'checked';} ?>  value="3000000">
                                        Below 30 Lakhs
                                    </label>
                                </div>
								<div class="radio-group">
                                    <label>
                                        <input type="radio" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '4000000' ){echo 'checked';} ?> value="4000000">
                                        Below 40 Lakhs
                                    </label>
                                </div>
								<div class="radio-group">
                                    <label>
                                        <input type="radio" id="pro" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '5000000' ){echo 'checked';} ?> value="5000000">
                                        Below 50 Lakhs
                                    </label>
                                </div>
							</div>
							<hr>
							<div class="b_class">
								<h5>Bedrooms</h5>
								<div class="checkbox">
									<label><input type="checkbox" name="bhk[]" <?php if(isset($_SESSION['bhk'])) { echo in_array("1", $_SESSION['bhk']) ? 'checked' : '' ;} ?> value="1">1 Bedroom</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="bhk[]" <?php if(isset($_SESSION['bhk'])) { echo in_array("2", $_SESSION['bhk']) ? 'checked' : '' ;} ?> value="2">2 Bedroom</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="bhk[]" <?php if(isset($_SESSION['bhk'])) { echo in_array("3", $_SESSION['bhk']) ? 'checked' : '' ;} ?> value="3">3 Bedroom</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="bhk[]" <?php if(isset($_SESSION['bhk'])) { echo in_array("4", $_SESSION['bhk']) ? 'checked' : '' ;} ?> value="4">4 Bedroom</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="bhk[]" <?php if(isset($_SESSION['bhk'])) { echo in_array("5", $_SESSION['bhk']) ? 'checked' : '' ;} ?> value="5">5 Bedroom</label>
								</div>

							</div>
							<!-- <hr>
							<h5>Locality</h5>
							<div class="dropdown">
								<button class="btn dropdown-toggle" id="drop_down_1" data-toggle="dropdown">Anna Nagar &nbsp;&nbsp;
									<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="#">Option 1</a></li>
										<li><a href="#">Option 2</a></li>
										<li><a href="#">Option 3</a></li>
									</ul>
								</div> -->
								<hr>
								<h5>Availability</h5>
								<div class="checkbox">
									<label><input type="checkbox" <?php if(isset($_SESSION['property_status'])) { echo in_array("1", $_SESSION['property_status']) ? 'checked' : '' ;} ?> value="1">Ready to Move-In</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" <?php if(isset($_SESSION['property_status'])) { echo in_array("2", $_SESSION['property_status']) ? 'checked' : '' ;} ?> value="2">Under Construction</label>
								</div>
								
								<!-- <hr>
								<h5>Facilities</h5>
								<div class="checkbox">
									<label><input type="checkbox" value="">Lift</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Swimming Pool</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Garden</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Play Area</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Mini-Theater</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Gym</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Walking Track</label>
								</div> -->
								<!-- <hr> -->
								<!-- <div class="budget_class">
									<h5>Area</h5>
									<div class="col-md-4 nopadding">
										<input type="text" class="form-control" name="" placeholder="Min">
									</div>
									<div class="col-md-offset-1 col-md-4 col-md-offset-1 nopadding">
										<input type="text" class="form-control" name="" placeholder="Max">
									</div>
								</div> -->
								<!-- <hr>
								<h5>Sort By</h5>
								<div class="checkbox">
									<label><input type="checkbox" value="">Relevance</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Newest</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Low to High</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">High to Low</label>
								</div> -->
								<hr>
								<h5>Property Type</h5>
								<div class="checkbox">
									<label><input type="checkbox" <?php if(isset($_SESSION['property_type'])) { echo in_array("3", $_SESSION['property_type']) ? 'checked' : '' ;} ?> value="3">Apartment</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" <?php if(isset($_SESSION['property_type'])) { echo in_array("2", $_SESSION['property_type']) ? 'checked' : '' ;} ?> value="2">Villa</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" <?php if(isset($_SESSION['property_type'])) { echo in_array("1", $_SESSION['property_type']) ? 'checked' : '' ;} ?> value="1">Plot</label>
								</div>
								<hr>
								<!-- <h5>Sale Type</h5>
								<div class="checkbox">
									<label><input type="checkbox" value="">Resale</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">New Property</label>
								</div>
								<hr> -->
								<h5>Looking at</h5>
								<div class="checkbox">
									<label><input type="checkbox" value="0">Standalone Building</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="1">Gated Community</label>
								</div>
								<!-- <hr>
								<h5>Posted By</h5>
								<div class="checkbox">
									<label><input type="checkbox" value="">Builder</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Owner</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Broker</label>
								</div> -->
								<!-- <hr> -->
<!-- 								<button type="submit" id="searchsubmit">Search</button>
 -->							</form>
							</div>
<!-- project details -->
<div class=" col-md-9 contentBox" id="content_box">
		<!-- <div class="col-md-12 btns">
			<div class="col-md-3 text-center">
				<a href="#" class="btnLink_2">
					All Properties
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="#" class="btnLink">
					Hot Projects
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="#" class="btnLink">
					Dealers
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a href="#" class="btnLink">
					View In Maps
				</a>
			</div>
		</div> -->
		
<?php foreach($records['listings'] as $r) { ?>
<div class="wrapped_box">
	<div class="detilsBox" style="width: 100%; float: left;">
		<div class="imgBox" style="width: 30%">
			<a href="#">
				<img src="<?= base_url() ?>assets/home/images2/cardImg.png" class="img-responsive" alt="house_view">
			</a>
		</div>
		<div class="wrappedBox_Right" style="width: 70%; float: left;">
			<div class="contentBox" style="width: 100%; padding-right: 20px;">
				<div class="headlogo pull-right">
					<img src="<?= base_url() ?>assets/home/images2/casa_logo.png" class="img-responsive" alt="builder_logo">
				</div>
				<div class="boxHead">
					<h3><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r['project_id'] ?>" ><?=$r['projectName']?></a></h3>
				</div>
				<hr>
				<p><b>Highlights - </b> <?=$r['bhk']?> BHK | <?=ucfirst($r['category'])?> | <?=ucfirst($r['locName'])?> - <?=ucfirst($r['locCity'])?></p>
				<hr>
				<p><b>Description - </b> <?=$r['listingDescription']?></p>
				<hr>
				<p><b>Location - </b><?=$r['locName']?><?php echo $r['nearby'] == 'yes' ? '(Nearby Location)' : '' ?> </p>
				<br>
				<!-- <div class="listBox">
					<div class="stars pull-right">
						<span class="rating">
							<span class="star" title=""></span>
							<span>Shortlist</span>
						</span>
					</div>
					
				</div> -->
				<hr>
			</div>
			<div class="postDetails" style="width: 100%; float: left;">
				<div class="builder">
					<span><b>Builder - </b><a href="#"><?=$r['developerName']?></a></span>
				</div>
				<div class="post">
					<span><b>Posted - </b><?=date("d M Y", strtotime($r['updated_on'])) ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapped_footer">
		<div class="row">
			<div class="col-md-12">
				<hr>
			</div>
		</div>
		<!-- <div class="link_1">
			<i class="fa fa-ban error" aria-hidden="true"></i>
			<a href="#">Report Error in Listing</a>
		</div> -->
		<div class="link_2 pull-right">
			<button data-toggle="modal" data-target="#contact-builder-modal" data-id="<?=$r['developer_id']?>" data-details="<?=$r['project_id']?>" class="btnLink_1 contact-builder">
				Contact Builder
			</button>
			<button type="button" data-toggle="modal" data-lat="<?=$r['latitude']?>" data-long="<?=$r['longitude']?>" data-target="#mapModal" class="viewMapButton btnLink_1">
				View in Maps
			</button>
			<a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r['project_id'] ?>" class="btnLink_2">
				View Details
			</a>
		</div>
	</div>
</div>
						<div class="row"><?php echo $this->pagination->create_links(); ?></div>
						<?php } ?>
						
						 

</div>
					<?php } else {  ?>
					
					<h3>No Properties found!</h3>
					
					<?php } ?>
				</div>
			</div>
		</div>

<!-- footer -->
<?php $this->load->view('home/footer');?>
<!-- footer end -->

				<!-- Map Modal Start -->
				<div id="mapModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Location</h4>
							</div>
							<div class="modal-body">
								
								<div id="map" style="width:550px;height:400px;">
									
								</div>


							</div>
							<div class="modal-footer">
								<button type="button" class="btn" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-- Map Modal End -->

				<!-- Developer Modal Start -->
				<div id="contact-builder-modal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Contact Builder</h4>
							</div>
							<div class="modal-body">
							<form id="contact_builder_form">
							
								<label>Name</label>
								<input type="text" class="form-control" id="customer_name" name="customer_name">
								<input type="hidden" id="dev_id" name="dev_id">
								<input type="hidden" id="project_id" name="project_id">

								<label>Email ID</label>
								<input type="text" class="form-control" id="customer_email" name="customer_email">

								<label>Phone No.</label>
								<input type="text" class="form-control" id="customer_number" name="customer_number">


							</form>								

							</div>
							<div class="modal-footer">
								<button type="button" id="contactBuilderBtn" class="btn btn-success">Submit</button>
								<button type="button" class="btn" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-- Developer Modal End -->



				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA" async defer></script> 


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	var lat;
	var long;
	var center;
	$(document).ready(function(){
		
		$('.viewMapButton').click(function(e){
			lat = $(this).attr('data-lat');
			long = $(this).attr('data-long');
			
			myMap();

		});

		
		var map = null; var marker = null;

		function myMap() {
			var mapCanvas = document.getElementById("map");

		//document.getElementByClass("viewMapButton").onclick = getLatLong;

		var myLatLng = new google.maps.LatLng(lat, long);

		var mapOptions = {
			center: myLatLng, zoom: 15
		};

		map = new google.maps.Map(mapCanvas, mapOptions);

		marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Hello World!'
		});
			// map.setCenter(marker.getPosition());
			// map.setZoom(15);


		}

		$("#mapModal").on("shown.bs.modal", function () {
			lastCenter=map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(lastCenter);
			//var center = new google.maps.LatLng(lat, long);
		});



	
});









</script>


<script>
	$(function() {

		var inputSlider = $(".slider-bar"),
		amount      = $("#amount");

		var unit = "cochinitos :3";

		inputSlider.slider({
			value : 5,
			min   : 2,
			max   : 20,
			step  : 1,
			slide : function(e, ui) {
				amount.val(ui.value + " " + unit);
			},
		});

		amount.val(inputSlider.slider("value") + " " + unit);

	});
</script>
<script>
//     function multiplyNode(node, count, deep) {
//     for (var i = 0, copy; i < count - 1; i++) {
//         copy = node.cloneNode(deep);
//         node.parentNode.insertBefore(copy, node);
//     }
// }

//multiplyNode(document.querySelector('.wrapped_box'), 30, true);
</script>
<script>
	function showValue(newValue)
	{
		document.getElementById("range").innerHTML=newValue;
	}
</script>
<script>
	$(function () {
		var sidebar = $('.sidebar');
		var top = sidebar.offset().top - parseFloat(sidebar.css('margin-top'));

		$(window).scroll(function (event) {
			var y = $(this).scrollTop();
			if (y >= top) {
				sidebar.addClass('fixed');
			} else {
				sidebar.removeClass('fixed');
			}
		});
	});

</script>

<script>
	$(document).ready(function(){
		
		var base_url  = 'http://localhost/codeigniter/mpb/index.php/';
		var base_url1 = 'http://localhost/codeigniter/mpb/';

           $.ajax({
                       url: base_url+'cityList',
                       method: 'GET',
                       success:function(msg)
                       {
                           msg = $.parseJSON(msg);
                           console.log(msg);
                           if(msg != null)
                           {
                            $.each(msg['cities'],function(index , value){
                                $('#city_id').append('<option value="'+value['cityId']+'">'+value['cityName']+'</option>')
                            });
                           }

                       }
            }); 

        $('#ask_expert_submit').click(function(e){
        	e.preventDefault();
        	$.ajax({
        		url: base_url+'askExpertForm',
        		method: 'post',
        		data: $('#ask_expert_form').serialize(),
        		success:function(msg)
        		{
        			msg = $.parseJSON(msg);
        			console.log(msg);
        			if(msg.status==true)
        			{
        				alert(msg.msg);
        			}
        			else
        			{
        				alert(msg.msg);
        			}
        		}
        	});
        	
        });

        $('#searchsubmit').click(function(e){
        	e.preventDefault();
                
                var search = $("input[name = 'search_box']").val();
			    if(search == '')
			    {
			        alert('Please Enter a location to search');
			    }
			    else
			    {
	                search_box = search.replace('BHK', 'bhk'); 
	                console.log($('#search_form').serialize());
	                //return false;
	                
	                $.ajax({
	                	url: base_url+'searchLocation',
	                	method: 'post',
	                	data: $('#search_form').serialize(),
	                	success:function(msg)
	                	{
	                		msg = $.parseJSON(msg);
	                		console.log(msg);
	                		if(msg.status==false)
	                		{
	                			alert(msg.msg);
	                		}
	                		else
	                		{
	                			$('#search_form').submit();
	                		}
	                		
	                	}
	                });
				}
            });


        $('.clearall').click(function(e){
        	e.preventDefault();
        	$('#search_form')[0].reset();
        });

		$('.contact-builder').click(function(e){
			$('#contact_builder_form').trigger("reset");
			var dev_id = $(this).attr('data-id');
			var project_id = $(this).attr('data-details');
			$('#dev_id').val(dev_id);
			$('#project_id').val(project_id);
		});

		$('#contactBuilderBtn').click(function(e){
			var customer_name = $('#customer_name').val();
			var customer_email = $('#customer_email').val();
			var customer_number = $('#customer_number').val();
			var dev_id = $('#dev_id').val();
			var project_id = $('#project_id').val();

			$.ajax({
							url: base_url+'contactBuilderForm',
							method: 'post',
							data: {dev_id:dev_id,project_id:project_id,customer_name:customer_name,customer_email:customer_email,customer_number:customer_number},
							success:function(msg)
							{
								msg = $.parseJSON(msg);
								console.log(msg);
								if(msg.status==true)
								{
									$('#contact-builder-modal').modal('hide');
									alert('Thank you for your request! The Builder will contact you shortly.');
								}
								else
								{
									alert('Something wrong!');
								}
							}
					});
			
		});
		$( ".budget_class, .b_class" ).change(function() {

			//alert('hai')
			var search = $("input[name = 'search_box']").val();
			search_box = search.replace('BHK', 'bhk'); 
            console.log($('#search_form').serialize());
            //return false;
            
            $.ajax({
            	url: base_url+'searchLocation',
            	method: 'post',
            	data: $('#search_form').serialize(),
            	success:function(msg)
            	{
            		msg = $.parseJSON(msg);
            		//console.log(msg);
            		if(msg.status==false)
            		{
            			alert(msg.msg);
            		}
            		else
            		{
            			$.ajax({
				        	url: base_url+'ajax_search',
				        	method: 'post',
				        	data: $('#search_form').serialize(),
				        	success:function(msg)
				        	{
				        		msg = $.parseJSON(msg);
				        		console.log(msg);
				        		//return false;
				        		if(msg.status==false)
				        		{
				        			alert(msg.msg);
				        		}
				        		else
				        		{
				        			$('#content_box').empty();
				        			$.each(msg.listings,function(i,item){
				        				console.log(item);
				        				var loc;
				        				var update_date = moment().format(item['updated_on']);
				        				if(item['nearby'] == 'yes')
				        				{
				        					loc = '(Nearby Location)';
				        				}
				        				else
				        				{
				        					loc ='';
				        				}
				        				$('#content_box').append('<div class="wrapped_box"><div class="detilsBox" style="width: 100%; float: left;"><div class="imgBox" style="width: 30%"><a href="#"><img src="'+base_url1+'assets/home/images2/cardImg.png" class="img-responsive" alt="house_view"></a></div><div class="wrappedBox_Right" style="width: 70%; float: left;"><div class="contentBox" style="width: 100%; padding-right: 20px;"><div class="headlogo pull-right"><img src="' +base_url1+'assets/home/images2/casa_logo.png" class="img-responsive" alt="builder_logo"></div><div class="boxHead"><h3><a href="' +base_url1+'index.php/home/projectDetails?id='+item['project_id']+'" >'+item['projectName']+'</a></h3></div><hr><p><b>Highlights - </b> '+item['bhk']+' BHK |'+item['category']+' | '+item['locName']+' - '+item['locCity']+'</p><hr><p><b>Description - </b>' +item['listingDescription']+'</p><hr><p><b>Location - </b>'+item['locName']+''+loc+'</p><br><hr></div><div class="postDetails" style="width: 100%; float: left;"><div class="builder"><span><b>Builder - </b><a href="#">'+item['developerName']+'</a></span></div><div class="post"><span><b>Posted - </b>'+update_date+'</span></div></div></div></div><div class="wrapped_footer"><div class="row"><div class="col-md-12"><hr></div></div><div class="link_2 pull-right"><button data-toggle="modal" data-target="#contact-builder-modal" data-id="'+item['developer_id']+'" data-details="'+item['project_id']+'" class="btnLink_1 contact-builder">Contact Builder</button><button type="button" data-toggle="modal" data-lat="'+item['latitude']+'" data-long="'+item['longitude']+'" data-target="#mapModal" class="viewMapButton btnLink_1">View in Maps</button><a href="'+base_url1+'index.php/home/projectDetails?id='+item['project_id']+'" class="btnLink_2">View Details</a></div></div></div>');
				        			});
				        		}
				        		
				        	}
				        });

            		}
            		
            	}
            });
		
		});

        
        

        
    });
</script>
</body>
</html>

