<!DOCTYPE html>
<html>
<head>
    <title>MyPropertyBotique</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>assets/home/assets1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?= base_url() ?>assets/home/assets1/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="nav_area" id="sticker">
	<div class="container">
		<nav class="navbar navbar-fixed-top nav_right" id="navbar">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="<?= base_url() ?>assets/home/images1/logo.png" class="img-responsive"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<button class="btn navbar-btn nav_btn_1">Post Free Ad</button><button class="btn navbar-btn nav_btn_2">Book an Appointment</button>
					<button class="btn navbar-btn nav_btn_3 ">Login</button>
				</ul>
			</div>
		</nav>
	</div>
</div>	
<div class="container-fluid">
    <div class="row">
        <img src="<?= base_url() ?>assets/home/images1/banner.png" class="img-responsive img_cover" alt="banner_img">
    </div>
    <div class="col-md-12" id="searchForm">
        <h3 class="text-center">We help you find your dream home at no additional cost</h3>
        <form id="search_form" action="<?php echo base_url() ?>index.php/home/search" method="post">
            <div class="form-group col-md-6 col-md-offset-3">
              <div class="input-group input-group-lg">
                <div class="input-group-btn">
                    <button type="button" id="drop_down" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons" id="location">my_location</i>Chennai &nbsp;&nbsp;
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Option1</a></li>
                      <li><a class="dropdown-item" href="#">Option2</a></li>
                      <li><a class="dropdown-item" href="#">Option3</a></li>
                      <li><a class="dropdown-item" href="#">Option4</a></li>
                    </ul>
                </div>
					<input type="text" id="s" name="search_box" class="form-control" placeholder="Search">
					<div class="input-group-btn">
						<button type="submit"  id="searchsubmit">Search</button>
					</div>
              </div>
            </div>
        </form>
    </div>
    <div class="buy" id="startchange">
		<div class="container">
		<div class="row">
			<div class="col-md-8">
			 <h3>Project Showcase <?php //  echo '<pre>'; print_r($quickLinks) ?></h3> 
				<p>Explore curated list of top selling apartments, villas and plots in and around chennai.</p>
				<?php foreach($showcase as $show) { ?>
				<?php foreach($show as $s) { ?>
					<div class="col-md-6 pro-sec">
						<div class="col-md-4">
							<img src="<?= base_url() ?>assets/home/images1/img_card.png" alt="image" class="img-responsive img_card">
						</div>
						<div class="col-md-8 text">	
							<h4><?=$s['projectName']?></h4>
							<p><?=$s['locName']?></p>
							<p><?=$s['totBHK']?> BHK Apartments</p>
							<p class="last_p"><span class="number"><?=$s['priceMin']?></span> Onwards</p>
						</div>
					</div>
				<?php } ?>
				<?php } ?>

				<button type="submit" class="btn lg_btn">All properties in Chennai</button>
			</div>
			<div class="col-md-4">
				<h3>Meet our real estate experts</h3>
				<p>Walkin into our Boutique at Spencer Plaza &amp; SP info City to get best deals &amp; free advice from our experts.</p>
				<div class="panel panel-default form_box">
				<div class="panel-body">
					<form id="inner_form">
					  <div class="form-group">
						<input type="text" class="form-control text_area" name="" placeholder="Name">
					  </div>
					  <div class="form-group">
						<input type="email" class="form-control text_area" name="" placeholder="Email ID">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control text_area" name="" placeholder="Mobile Number">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control text_area" name="" placeholder="Budget">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control text_area" name="" placeholder="Your Preference">
					  </div>
					  <div class="form-group">
						<input type="text" class="form-control text_area" name="" placeholder="Select your location">
					  </div>
					  <button type="submit" class="btn form_btn center-block">SUBMIT</button>
					</form>
				</div>
				</div>
			</div>
		</div>
    </div>
    <div class="quick_search">
		<div class="container">
		<div class="row">
        <div class="col-md-12">
            <h3>Quick Search</h3>
        </div>
       <div class="col-md-12">
            <div class="panel panel-default content">
                <div class="panel-body">
					<?php foreach($quickLinks as $ql) { ?>
                    <div class="col-md-2 icons">
                        <a href="<?=base_url()?>searchLocation?search=<?=$ql['locName']?>">
							<div class="fea-div"><img src="<?= base_url() ?>assets/home/images1/icon_1.png" class="img-responsive center-block img_icon" alt="OMR"></div>
                        <p>Properties in <?=ucfirst($ql['locName'])?></p></a>
                    </div>
					<?php } ?>
                    
                </div>
            </div>
        </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
            <div class="featuredprojects">
				<div class="col-md-12">
                    <h3>FEAUTERED NEW PROJECTS</h3>
                </div>
                <div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body details">
							<div class="col-md-3">
								<h3>South-Chennai</h3>
								<p class="sub_p">Commercial Properties</p>
								<hr>
								<p>•Plan b, Egmore, 4.5 Cr</p>
								<p>•EA Floor, 6 Cr</p>
								<p class="sub_p">Residential Properties</p>
								<hr>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								
							
							</div>
							<div class="col-md-3">
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<h3>North-Chennai</h3>
								<p class="sub_p">Residential Properties</p>
								<hr>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 C</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>

								
							</div>
							<div class="col-md-3">
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<h3>Chennai-Nungambakkam</h3>
								<p class="sub_p">Residential Properties</p>
								<hr>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
							
								
							</div>
							<div class="col-md-3">
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<h3>Chennai-Vadapalani</h3>
								<p class="sub_p">Residential Properties</p>
								<hr>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
								<p>•VGN Brixton, Tondayarpet, 65 Lac - 1.5 Cr</p>
							</div>
							
						</div>
					</div>
                </div>
            </div>
			</div>
			</div>
        </div>
		
        <div class="col-md-12 text-center">
            <div class="pagination">
              <a href="#" style="color: #5f2f96;">&lt;</a>
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a class="active" href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>
              <a href="#">7</a>
              <a href="#">8</a>
              <a href="#">9</a>
              <a href="#">10</a>
              <a href="#" style="color: #5f2f96;">&gt;</a>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 carousel_img">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
					<div class="item active">
						<img src="<?= base_url() ?>assets/home/images1/img_carousel.png" class="img-responsive" alt="home_img" style="width:100%;">
					</div>
				  </div>
				  <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span style="font-size: 50px;" class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span style="font-size: 50px;" class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				  </a> -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<?php $this->load->view('home/footer');?>
<!-- footer end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/home/assets1/js/bootstrap.min.js"></script>


<script>
        $(document).ready(function(){
            $('#searchsubmit').click(function(e){
                e.preventDefault();
			var base_url = 'http://localhost/codeigniter/mpb/index.php/home/';                
			
                
                var search = $("input[name = 'search_box']").val();
                
                search_box = search.replace('BHK', 'bhk'); 
                
                
                    $.ajax({
                                url: base_url+'searchLocation',
                                method: 'post',
                                data: {search:search},
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

            });
            
        });
    </script>



</body>
</html>