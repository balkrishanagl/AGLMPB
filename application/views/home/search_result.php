<?php $this->load->view('home/header'); ?>
    <section class="inner_section" style="float:left;">
    	<form id="search_form" action="<?php echo base_url(); ?>index.php/home/search" method="post"> 
    	<div class="white_nav" style="position: fixed;z-index: 999;width:100%;">
			<!-- <div class="navbar navbar-default">
				<div class="container-fluid paddingnone">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
							<span class="icon-bar top-bar"></span>
							<span class="icon-bar middle-bar"></span>
							<span class="icon-bar bottom-bar"></span>
						</button>
					</div>
					<div id="navbar" class="navbar-collapse collapse" aria-expanded="true">
						<ul class="nav navbar-nav">                             
							<li>Quick links<i class="fa fa-angle-right"></i></li>
							<li class="active"><a href="#">Gallery<i class="fa fa-angle-down"></i></a></li>
							<li><a href="#">location<i class="fa fa-angle-down"></i></a></li>
							<li><a href="#">amenities<i class="fa fa-angle-down"></i></a></li>
							<li><a href="#">HomeLoan Offers<i class="fa fa-angle-down"></i></a></li>
							<li><a href="#">Payment Plan<i class="fa fa-angle-down"></i></a></li>
							<li><a href="#">Recommendations<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</div>
				</div>
			</div> -->
			
			<div class="container">
				<div class="input-group">

					
					<div class="input-group-btn search-panel-two">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							<span id="search_concept_two">Chennai</span>
						</button>
					</div>
					<input type="hidden" name="search_param_two" value="all" id="search_param_two">         
					<input type="text" id="mysearchinput" class="form-control" name="search_box" placeholder="Search..." value="<?php echo $this->session->userdata('search_box'); ?>" autocomplete="off">
					<span class="input-group-btn search-panel-three bhktogglec">
						<button type="button" class="btn dropdown-toggle bhktoggle">
							<span id="search_concept_three">Choose BHK</span> 
							<span class="fa fa-angle-down"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						  <li>
						  	<input type="checkbox" id="bhk1" class="s-bhk" name="bhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("1", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="1">
						    <label for="bhk1">1 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="bhk2" class="s-bhk" name="bhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("2", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="2">
						    <label for="bhk2">2 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="bhk3" class="s-bhk" name="bhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("3", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="3">
						    <label for="bhk3">3 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="bhk4" class="s-bhk" name="bhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("4", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="4">
						    <label for="bhk4">4 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="bhk5" class="s-bhk" name="bhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("5", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="5">
						    <label for="bhk5">5 BHK</label>
						  </li>
						</ul>
					</span>
					<span class="input-group-btn search-panel-four">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							<span id="search_concept_four">Price Range</span> 
							<span class="fa fa-angle-down"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						  <!-- <li><label><input type="radio" name="price_range" <?php if( isset($_SESSION['price_range']) && $_SESSION['price_range'] == '1000000' ){echo 'checked';} ?> value="1000000">Below 10 L</label></li>
						   --><li><label><input type="radio" name="price_range" <?php if($this->session->userdata('price_range') == '2000000' ){echo 'checked';} ?> value="2000000">
                                        10L to 20L</label></li>
						  <li><label><input type="radio" name="price_range" <?php if($this->session->userdata('price_range') == '3000000' ){echo 'checked';} ?>  value="3000000">
                                        20L to 30L</label></li>
						  <li> <label><input type="radio" name="price_range" <?php if( $this->session->userdata('price_range') == '4000000' ){echo 'checked';} ?> value="4000000">
                                        30L to 40L</label></li>
                          <li><label><input type="radio" id="pro" name="price_range" <?php if($this->session->userdata('price_range') == '5000000' ){echo 'checked';} ?> value="5000000">
                                        40L to 50L</label></li>
						</ul>
					</span>

					

					<!-- <input type="hidden" name="search_param_three" value="all" id="search_param_three"> 
					<input type="hidden" name="search_param_four" value="all" id="search_param_four">  -->

					<span class="input-group-btn">
							<button class="btn btn_search" type="submit" id="searchsubmit">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
            </div>
		</div>
		<div class="search_section" style="float: left; margin-top: 5%;">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class=" search_left">
							<h2>filter by</h2>
							
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel1">
													<span class="fa fa-map-marker"></span>
													Location
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel1" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_one">
													<div class="form-group">
														 <select name="strlocation" id="strlocation" class="form-control filterclass">
															<option value="">Select your location here</option>
															<?php if($location !='') {
																for ($i=0; $i <count($location); $i++) { ?>

																<option value="<?php echo $location[$i]['location_name']; ?>"><?php echo $location[$i]['location_name']; ?></option>
																	
																<?php }
															} ?>
														</select> 
														
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel2">
													<span class="fa fa-building-o"></span>
													Property Type
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel2" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_two">
													<ul class="row">

														<?php if(count($propertytype)>0){
															for ($p=0; $p < count($propertytype); $p++) { ?>
																<li class="col-xs-6">
															<input name="property_type[]" type="checkbox" value="<?php echo $propertytype[$p]['property_type_id'] ?>" class="filterclass" id="pt<?php echo $propertytype[$p]['property_type_id'] ?>" />
															<label for="pt<?php echo $propertytype[$p]['property_type_id'] ?>"><?php echo $propertytype[$p]['name'] ?> </label>
														</li>
															<?php }

														}?> 
														
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel3">
													<span><img src="<?= base_url() ?>images/filter-icon4.png" alt=""></span>
													Bedrooms
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel3" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_three">

													<span class="input-group-btn search-panel-three ">
						<button data-toggle="dropdown" type="button" style="background-color: #FFF;width: 100%;border-radius: 0; text-align:left; color:#555; padding: 0 10px;line-height: 42px; font-size: 11px; font-family: 'AvenirBlack'; text-transform: uppercase; margin-top: 40px;border: 1px solid #ccc;" class="dropdown-toggle ">
							<span id="search_concept_three">Choose BHK</span> 
							<span class="fa fa-angle-down"></span>
						</button>
						<ul class="dropdown-menu" role="menu" style="padding: 10px;width: 100%;">
						  <li>
						  	<input type="checkbox" id="strbhk1" class="s-bhk filterclass" name="strbhk[]"  value="1">
						    <label for="strbhk1">1 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="strbhk2" class="s-bhk filterclass" name="strbhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("2", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="2">
						    <label for="strbhk2">2 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="strbhk3" class="s-bhk filterclass" name="strbhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("3", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="3">
						    <label for="strbhk3">3 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="strbhk4" class="s-bhk filterclass" name="strbhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("4", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="4">
						    <label for="strbhk4">4 BHK</label>
						  </li>
						  <li>
						  	<input type="checkbox" id="strbhk5" class="s-bhk filterclass" name="strbhk[]" <?php if($this->session->userdata('bhk')) { echo in_array("5", $this->session->userdata('bhk')) ? 'checked' : '' ;} ?> value="5">
						    <label for="strbhk5">5 BHK</label>
						  </li>
						</ul>
					</span>

													
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel4">
													<span><img src="<?= base_url() ?>images/filter-icon5.png" alt=""></span>
													Price range
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel4" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_four">
													<input class="filterclass" id="rang-price" type="text" ticks-snap-bounds="30">

													<ul>
														<li>
															<div class="styled_select">
																<input type ="text" name="strpricemin" id="price-min" class="form-control">
																	
															</div>
														</li>
														<li>
															to
														</li>
														<li>
															<div class="styled_select">
																<input type ="text" name="strpricemax" id="price-max" class="form-control">
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel5">
													<span><img src="<?= base_url() ?>images/filter-icon6.png" alt=""></span>
													Size ranging
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel5" class="panel-collapse collapse in">
											<div class="panel-body">
												<div class="filter_five">
													<ul>
														<li>
															<div class="styled_select">
																<select class="form-control">
																	<option selected>Min</option>
																</select>
															</div>
														</li>
														<li>
															to
														</li>
														<li>
															<div class="styled_select">
																<select class="form-control">
																	<option selected>Max</option>
																</select>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div> -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel6">
													<span><img src="<?= base_url() ?>images/filter-icon7.png" alt=""></span>
													Posted by
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel6" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_six">
													<ul class="row">
														<li class="col-xs-6">
															<input type="checkbox" name="strpostedby[]" id="pb1" value="1" class="filterclass"/>
															<label for="pb1">Owner</label>
														</li>
														<li class="col-xs-6">
															<input type="checkbox" name="strpostedby[]" id="pb2" value="2" class="filterclass" />
															<label for="pb2">Builder</label>
														</li>
														<li class="col-xs-6">
															<input type="checkbox" name="strpostedby[]" id="pb3" value="3" class="filterclass"/>
															<label for="pb3">Broker</label>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel7">
													<span class="fa fa-building-o"></span>
													STATUS
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel7" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_six">
													<ul class="row">
														<li class="col-xs-6">
															<input type="checkbox" name="property_status[]" value="1" id="st1" class="filterclass" />
															<label for="st1">Ready to Move</label>
														</li>
														<li class="col-xs-6">
															<input type="checkbox" name="property_status[]" value="2" id="st2" class="filterclass" />
															<label for="st2">Under Construction</label>
														</li>
													</ul>

												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<a role="button" Data-toggle="collapse" href="#panel8">
													<span><img src="<?= base_url() ?>images/filter-icon4.png" alt=""></span>
													Sale Type
													<i class="more-less fa fa-angle-up"></i>
												</a>
											</div>
										</div>
										<div id="panel8" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="filter_six">
													<ul class="row">
														<li class="col-xs-6">
															<input type="checkbox" name="saletype[]" value="1" class="filterclass" id="sale1" />
															<label for="sale1">New Project</label>
														</li>
														<li class="col-xs-6">
															<input type="checkbox" name="saletype[]" value="2" class="filterclass"  id="sale2" />
															<label for="sale2">Re-Sale</label>
														</li>  
													</ul>
												</div>
											</div>
										</div>
									</div>
									<a href="#" class="btn clearall"><i class="fa fa-close"></i>Clear Filters</a>	
								</div>
							
							<ul class="ad_list"> 
								<li>
									<img src="<?= base_url() ?>images/ad1.jpg" alt="">
								</li>
								<li>
									<img src="<?= base_url() ?>images/ad2.jpg" alt="">
								</li>
								<li>
									<img src="<?= base_url() ?>images/ad3.jpg" alt="">
								</li>
							</ul>
						</div>
					</div>


					<div class="col-md-9 col-sm-12 col-xs-12">
						<?php  //  echo '<pre>';print_r($records); echo'</pre>'; ?>
					    <?php if(!empty($records['listings'])){ ?>

						<div class="search_right">
							<?php foreach($records['listings'] as $r) { ?>

							<div class="search_block">
								<div class="img_block">
									<?php if($r['img_path']!=''){ ?>
										<img width="300px" height="215px" src="<?php echo base_url().'assets/uploads/images/'.$r['img_path']?>" alt="<?php echo $r['img_path'];?>">
									<?php } else { ?>
										<img style="width: 250px;margin-top: -10px;" src="<?php echo base_url().'images/no-image.png' ?>" alt="no-image">
								    <?php }?>
									
								</div>
								<div class="inner">
									<div class="tag">
										<span>Recommended</span>
										<img src="<?= base_url() ?>images/tag-icon2.png" alt="">
									</div>
									<div class="block_one">
										<h3><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r['project_id'] ?>" ><?=$r['projectName']?></a></h3>
										<p>By <?php echo $r['developerName'];?></p>
										<ul>
											<li><i class="fa fa-map-marker"></i><?php echo ucfirst($r['locName']).', '.ucfirst($r['locCity']);?></li>
											<li><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r['project_id'] ?>" class="btnLink_2">View Map</a></li>
										</ul>
									</div>
									<ul class="block_two">
										<li>Size <span><?php echo $r['size_min'].' - '. $r['size_max']; ?> Sqft</span></li>
										<li>Configs <span><?php echo $r['bhk'];?> BHK</span></li>
										<li>Status <span><?php if($r['property_status'] ==1){ echo "Ready To Move ";} else { echo "Under Construction"; } ?> </span></li>
										<!-- <li>Sale Type <span>New booking</span></li> -->
										<li>Posted By <span><?php if($r['posted_by'] ==1){ echo "Owner";} elseif($r['posted_by'] ==2) { echo "Builder"; }else {echo "Broker";} ?></span></li>
										<li><i class="fa fa-rupee"></i><?php echo digitschange($r['price_min']);?> - <?php echo digitschange($r['price_max']);?> <span><i class="fa fa-rupee"></i> <?php echo $r['sqft_price'];?> / Sq.ft</span></li>
									</ul>
									<div class="block_three">
										<p><?php $position=200;  
										         $message=$r['devDescription'];
										         $post = substr($message, 0, $position); 
										         echo $post;
										         echo "..."; 
										         ?>
										         <a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r['project_id'] ?>"> Read More</a>

											 </p>
										<ul>
											<li><a href="#"><i class="fa fa-heart-o" style="padding: 9px 0px;"></i></a></li>
											<li><a href="#">Contact Builder</a></li>
										</ul>
									</div>
								</div>
							</div>


                           <?php } ?>
							<div class="search_slide">
								<div class="row">
									<div class="col-md-5 col-sm-12 col-xs-12">
										<h3>Add Nearby <br>Localities to <br>your Search</h3>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12">
										<div class="search_slide_wrap">
											<div class="owl-carousel search_slider">
												<div class="item">
													<a href="#" class="btn">+</a>
													<ul>
														<li>
															<div class="left">
																Palam
																<span><i class="fa fa-rupee"></i> 4502/sqft</span>
															</div>
															<div class="right">
																-12.79%
																<span>in last 1 year</span>
															</div>
														</li>
														<li>
															<div class="left">
																9
																<span>New Project</span>
															</div>
															<div class="right">
																379
																<span>Resale Units</span>
															</div>
														</li>
													</ul>
												</div>
												<div class="item">
													<a href="#" class="btn">+</a>
													<ul>
														<li>
															<div class="left">
																Palam
																<span><i class="fa fa-rupee"></i> 4502/sqft</span>
															</div>
															<div class="right">
																-12.79%
																<span>in last 1 year</span>
															</div>
														</li>
														<li>
															<div class="left">
																9
																<span>New Project</span>
															</div>
															<div class="right">
																379
																<span>Resale Units</span>
															</div>
														</li>
													</ul>
												</div>
												<div class="item">
													<a href="#" class="btn">+</a>
													<ul>
														<li>
															<div class="left">
																Palam
																<span><i class="fa fa-rupee"></i> 4502/sqft</span>
															</div>
															<div class="right">
																-12.79%
																<span>in last 1 year</span>
															</div>
														</li>
														<li>
															<div class="left">
																9
																<span>New Project</span>
															</div>
															<div class="right">
																379
																<span>Resale Units</span>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="ad_block">
								<img src="<?= base_url() ?>images/ad-4.jpg" alt="">
							</div>
							<!-- <div class="loader_div">
								<a href="#">
									<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
								</a>
							</div> -->
						</div>

						<?php }  else { ?>

						<div style="width:100%;float:left;text-align: center;font-size: 16px;color: red;font-weight: bold;"> NO RECORDS FOUND!</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		
		</form>
	</section>
   <?php $this->load->view('home/innerfooter');?>




				</div>
				<!-- Developer Modal End -->

<?php // $this->load->view('home/innerfooter');?>

				<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA" async defer></script> 
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

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
	/*$(function () {
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
	});*/

</script>

<script>
	$(document).ready(function(){
		var base_url = "<?php echo base_url();?>index.php/home/";
		var base_url1 = "<?php echo base_url();?>";

          /* $.ajax({
                       url: base_url+'locationList',
                       method: 'GET',
                       success:function(msg)
                       {
                           msg = $.parseJSON(msg);
                           console.log(msg);
                           if(msg != null)
                           {
                            $.each(msg['location'],function(index , value){
                                $('#strlocation').append('<option value="'+value['location_id']+'">'+value['location_name']+'</option>')
                            });
                           }

                       }
            }); 
*/
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

        $('.filterclass').change(function(e){
          var loc= $(this).val();
          if(loc!=''){
          	
        	e.preventDefault();
            console.log($('#search_form').serialize());
            //return false;
            
            $.ajax({
            	url: base_url+'ajax_search',
            	method: 'post',
            	data: $('#search_form').serialize(),
            	success:function(msg)
            	{
            		$('.search_right').html(msg);
            		
            	}
            });
	    
            
          }
        });

        $('.filterclass').click(function(e){
        		//debugger;
        		var loc= $(this).val();

        		$('.filterclass').trigger("change");
        });



        $('#searchsubmit').click(function(e){
        	e.preventDefault();
                var search = $("input[name = 'search_box']").val();
			    if(search == ''){
			        alert('Please Enter a location to search');
			    } else {
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
        	alert("Are you sure!");
        	 //$(this).closest('form').find("input[type=text], textarea").val("");
        	 $('input:checkbox').removeAttr('checked');
        	 $('input[name="price_range"]').prop('checked', false);
        	 $("#search_concept_three").text("Choose BHK");
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
            		} else {
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

  // toggle operations      
        
 $('.bhktoggle').on('click', function (event) { 
 	$(this).parent().toggleClass('open'); 
 });

 $('body').on('click', function (e) {
   if (!$('.bhktogglec').is(e.target)
       && $('bhktogglec').has(e.target).length === 0
       && $('.open').has(e.target).length === 0
   ) {
       $('.bhktogglec').removeClass('open');

   }
});





        
    });
</script>

<?php
function count_digit($number) {
  return strlen($number);
}

function divider($number_of_digits) {
    $tens="1";

  if($number_of_digits>8)
    return 10000000;

  while(($number_of_digits-1)>0)
  {
    $tens.="0";
    $number_of_digits--;
  }
  return $tens;
}

function digitschange($num){
//function call
$ext="";//thousand,lac, crore
$number_of_digits = count_digit($num); //this is call :)
    if($number_of_digits>3)
{
    if($number_of_digits%2!=0)
        $divider=divider($number_of_digits-1);
    else
        $divider=divider($number_of_digits);
}
else
    $divider=1;

$fraction=$num/$divider;
$fraction=number_format($fraction,2);
if($number_of_digits==4 ||$number_of_digits==5)
    $ext="k";
if($number_of_digits==6 ||$number_of_digits==7)
    $ext="L";
if($number_of_digits==8 ||$number_of_digits==9)
    $ext="Cr";
return $fraction." ".$ext;
}
?>