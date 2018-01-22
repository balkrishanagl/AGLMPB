<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Homezelect</title>
	<link rel="icon" href="<?= base_url() ?>assets/home/assets/images/homezelect_fav.ico" type="image/ico"/> 
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/home/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/jquery-scrollify-style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://fancyapps.com/fancybox/source/jquery.fancybox.css" />
    <link rel="stylesheet" href="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-thumbs.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <style>
        .jq-scroller-caption
        {
            display:none;
        }
    </style>
    <!--header-->
    <div class="navbar navbar-default header-logo navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <button button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
                    <img src="<?= base_url() ?>assets/home/assets/images/logo.png">
                </a>
            </div>

            <div id="navbar" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav_btn_1"><a href="#">Post Free Ad</a>
                    </li>
                    <li class="nav_btn_2"><a href="#">Book an Appointment</a>
                    </li>
                    <li class="nav_btn_3 "><a href="#">Login</a>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    <!--header-end-->
    
    <!--banner-part-->
    <div class="fixed-hedaer-top-space"></div>
    <div class="baner-img">
       <div class="search-div project">
        <div class="container">
		<div class="row">
            <div class="col-md-12" id="searchForm">
               <form id="search_form" action="<?php echo base_url() ?>index.php/home/search" method="post">
                <div class="form-group ">
                    <span class="banner-drop col-lg-2 col-md-2 col-sm-3 col-xs-12"><div class="dropdown">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chennai
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="#">Bangalore</a>
                            </li>
                            <li><a href="#">Pondy</a>
                            </li>
                            <li><a href="#">Tanjore</a>
                            </li>
                            <li><a href="#">Madurai</a>
                            </li>
                        </ul>
                    </div>
                </span>
                        <!-- <span class="inner-addon right-addon">
                <i class="glyphicon glyphicon-search"></i>
            </span> -->
            <span class="banner-type-search col-lg-8 col-md-8 col-sm-6 col-xs-12"><input type="text" id="mysearchinput" name="search_box" class="form-control" placeholder="Search" autocomplete="off"></span>
            <span class="banner-search-btn col-lg-2 col-md-2 col-sm-3 col-xs-12">
                <button type="submit" id="searchsubmit">Search</button>
            </span>
        </div>


        <div class="more-searchdiv" id="moresrarch">
            <span class="construction-statement">
                <div class="dropdown">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Construction Status
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="property_status" value="1">
                                    Ready to move
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="property_status" value="2">
                                    Under Construction
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </span>

            <span class="price-range">
              <div class="dropdown">
                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Price Range
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="price_range" value="1000000">
                                Below 10 Lakhs
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="price_range" value="2000000">
                                Below 20 Lakhs
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="price_range" value="3000000">
                                Below 30 Lakhs
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="price_range" value="4000000">
                                Below 40 Lakhs
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="price_range" value="5000000">
                                Below 50 Lakhs
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </span>
        <span class="bedroom-range">
            <div class="dropdown">
                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bedroom
                    <span class="caret"></span>
                </button>
                <!-- <ul class="dropdown-menu" aria-labelledby="dLabel"> -->
                            <!-- <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bhk[]" value="1">
                                        1 BHK
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bhk[]" value="2">
                                    2 BHK
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bhk[]" value="3">
                                    3 BHK
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bhk[]" value="4">
                                    4 BHK
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bhk[]" value="5">
                                    4+ BHK
                                    </label>
                                </div>
                            </li> -->
                            <!-- </ul> -->
                        </div>
                    </span>

                    <span class="posted-by">
                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Property Type
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li>
                                    <div class="radio-group">
                                        <label>
                                            <input type="radio" name="property_type" value="Apartments">
                                            Apartment
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-group">
                                        <label>
                                            <input type="radio" name="property_type" value="Villa">
                                            Villa
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio-group">
                                        <label>
                                            <input type="radio" name="property_type" value="Individual">
                                            Individual Plot
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </span>
                    <a class="clearall"><p>Clear all</p></a>
					
                </div>

            </div>
			</form>
        </div>
    </div>
</div>
</div>




<!--banner-part-end-->
<style>
.card:hover {
  width: 100%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  /* text-align: center; */
}
</style>


<div class="project-detail-section-part">
    <div class="container">
        <div class="">
            
            <section class="collect-det-banner-sect">
                <?php // echo '<pre>'; print_r($records); echo '</pre>'; ?>
                
                <?php  if($records != null) { ?>
                <div class="container">
            
            <div class="row">   
                <!-- <div class="col-lg-12 col-det-banner">

                </div> -->
                <img style="width: 100%;height: 50%;" src="<?= base_url() ?>assets/uploads/images/<?=$records[0]['img_url']?>">

                <div class="col-lg-12 col-det-banner-cont">
                    <h1><?=$records[0]['name'] ?></h1>
                    
                    <p><?=$records[0]['description']?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="collect-grp-sect">
      <div class="row">
        <div class="row">   
            <div class="col-lg-12 col-grp-cont nopadding">
                <?php foreach($records as $r) { ?>
                <a href="<?=base_url()?>index.php/Home/projectDetails?id=<?=$r['project_id']?>">
                <div class="col-lg-4">
                    <div class="row">   
                        <div class="col-lg-12 grp-col-container">
						<div class="card">
                            <div class="col-lg-12 grp-col-new" style="padding:0px;">
                                <img src="<?= base_url() ?>assets/uploads/images/<?=$r['projectImage']?>" alt="image" class="img-responsive img_card" >
                            </div>
                            <div class="grp-col-text-div">
                                <h2><?=$r['projectName']?></h2>
                                <p><?=ucfirst($r['locName'])?></p>
                            </div>
							</div>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>
                
            </div>
        </div>
    </div>
</section>
<!--show-caese-end-->

                


<!--project-bar-end-->











</div>
</div>
<?php } else { ?>
<div class="container">
    <div class="col-md-12 No-properties">

                    <h2>No properties are available now. Please try again later.</h2>
                    </div>        
</div>
<?php } ?>
<!--project-detail-section-part-end-->


<!-- footer -->
<?php $this->load->view('home/footer');?>
<!-- footer end -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Add jQuery library -->
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
<!-- Add fancyBox -->
<script type="text/javascript" src="http://fancyapps.com/fancybox/source/jquery.fancybox.js"></script>

<script src="<?= base_url() ?>assets/home/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/home/assets/js/jquery.scrollify.js"></script>




</body>

</html>