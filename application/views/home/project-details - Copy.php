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
        .jq-scroller {
            border: 1px solid lightgrey;
            padding-top: 12px;
            border-radius: 0px;
            box-shadow: inset 0px 3px 14px -4px rgba(0, 0, 0, 0.2);
        }
        
    </style>
    <!--header-->
    <?php $this->load->view('home/top-bar'); ?>
    

    <!--header-end-->
    
    <!--banner-part-->
    <div class="fixed-hedaer-top-space"></div>
    <div class="baner-img">
        <?php if($records['project_details'][0]['img_path'] == null) { ?>
        <img src="<?= base_url() ?>assets/home/assets/images/banner.png" class="img-responsive" alt="banner" />
        <?php } else { ?>
        <img src="<?= base_url() ?>assets/uploads/images/<?=$records['project_details'][0]['img_path']?>" class="img-responsive" alt="banner" />
        <?php } ?>
        <div class="search-div project">
            <div class="container">
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
        </div>
    </div>

</div>
</form>
<div class="container">
<div class="memebername-bg">
<div class="project-title">
    <h3><?=$records['project_details'][0]['name']?></h3>              
</div>

<div class="project-location">
    <span><?=$records['project_details'][0]['address']?></span>  <a id="pseudoWhatsNearBy" href="" class="normalizedLink whatsNearby _pageanchor trackVam" anchor="#mapWidgetPD" vamacttype="MAP_LINK" vamactsrc="IMAGE_PLDPAGE" title="" style="visibility: visible;"> <i class="iconPd pdIcn_prop_location"></i> <span style="color: #337ab7;">What's Nearby</span> </a> 
</div>
</div>
</div>
<!--banner-part-end-->
<div class="project-detail-section-part">
 <div class="container">
     <div class="row">
         <div class="col-md-12 project-body">
             <div class="col-md-4">
                 <h1>&#8377 <?=$records['project_details'][0]['price_min']?> - <?=$records['project_details'][0]['price_max']?></h1><p>Base Price</p><?php // echo '<pre>'; print_r($records); echo'</pre>'; ?></div> 
                 <div class="col-md-4 project-body">
                     <h4><?=$records['project_details'][0]['size_min'] ?> Sqft - <?=$records['project_details'][0]['size_max'] ?> Sqft</h4><p>Super Built Up Area</p></div>
                     <div class="col-md-4 top-projectspace">
                         <div class="row-md-4 btn-size">
                             <button class="btn btn-info center-block" style="border-radius: 0px !important;">View Phone Number</button></div>
                             <div class="row-md-4 btn-size">
                                 <button class="btn btn-default center-block" style="width: 46%;border-radius: 0px !important;border-color: #f6b544;
                                 color: #f6b544;">Shortlist</button></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!--project-details-section-part-->
             <div class="project-detail-section-part">

              <!--project-bar-end-->




              <!-- /container -->


              <div class="container">
                 <div class="project-showcase">
                    <h3>Project Details</h3></div>   
                    <div class="table-project">
                        <table class="table table-bordered table-hover brochure floor-view">
                            <thead>
                                <tr>
                                    <th>FLOOR PLAN</th>
                                    <th>INCLUSIONS</th>
                                    <th>AREA DETAILS</th>
                                    <th>PRICE DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($records['listings'] as $list) { ?>
                                <tr>
                                    <td> 
                                        <a class="open_fancybox" href="http://fancyapps.com/fancybox/demo/1_b.jpg"><img src="<?=base_url()?>assets/uploads/images/<?php echo $list->img_url?>" alt=""/></a>
                                        <div class="Img" data-type="<?=base_url()?>assets/uploads/images/<?php echo $list->img_url?>" >
                                        </td>
                                        <td>
                                            <ul class="rooms">
                                                <li class="rooms-list"><?=$list->bhk?> Bedroom</li>
                                                <!-- <li>2 Balcony</li> -->
                                                <li><?=$list->bathrooms?> Bathroom</li>
                                                <!-- <li>Pooja Room</li> -->
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="rooms">
                                                <!-- SIZE? -->
                                                <li class="rooms-list">Super Built-up Area :  <span><?=$list->super_build_area?> Sq.ft</span></li>
                                                <li>Liveable Area :  <span><?=$list->carpet_area?> Sq.ft.</span> </li>
                                                <li>Property Type :  <span><?=$list->propertyType?></span> </li>
                                            </ul>
                                        </td>
                                        <td> 
                                            <ul class="rooms">
                                                <li class="rooms-list">Base Price :  &#8377 <?=$list->price?> @ <?=$list->sqft_price?> ps</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>


                    <!--show-caese-end-->




                    <!--project-bar-end-->

                    <!--quick-search-->
                    <div class="container">
                        <div class="quick-search">
                            <h3>Facilities</h3>

                            <ul>
                                <?php foreach($records['facilities'] as $f) { ?>
                                <li class="quickLink">
                                    <a href="">
                                        <img src="<?php echo base_url()?>assets/home/assets/images/<?=$f['img_url']?>" />
                                        <p><?=$f['facilities_name']?></p>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>

                        </div>
                    </div>
                    <!--quick-search-end-->




                    <!--quick-search-->
                    <div class="container">
                        <div class="project-search">
                            <h3>Project Pictures</h3>
            
                            <ul class="scroller list-group gallery">
                            <?php foreach($records['images'] as $i) { ?>
                            <li class="quickLink">
                                <a  class="thumbnail fancybox" rel="ligthbox" href="<?=base_url()?>assets/uploads/images/<?=$i['path']?>">
                                    <img src="<?=base_url()?>assets/uploads/images/<?=$i['path']?>" />
                                </a>
                            </li>
                            <?php } ?>
                            </ul>
            
                        </div>
                    </div>
                <!--quick-search-end-->

                <!--quick-search-->
                <div class="container">
                    <div class="project-search">
                        <h3>Brochure</h3>
                        <div class="col-md-12 brochure">
						<span class="broucher-icon">
						    <?php foreach($records['brochures'] as $b) { ?>
                                <a href="#"><img src="<?=base_url() ?>assets/home/assets/images/pdf-broucher.png"/>
                            </a>
						</span>
						
						<span class="broucher-link">
						 <a href="<?=base_url()?>assets/uploads/brochure/<?=$b['path']?>" class="btn btn-info center-block brochure-btn" download style="border-radius: 0px !important;">Download Brochure</a>
                                <?php } ?>
						</span>
						 </div>

					<div class="col-md-12 brochure">
						<span class="broucher-icon">
						    <?php foreach($records['brochures'] as $b) { ?>
                                <a href="#"><img src="<?=base_url() ?>assets/home/assets/images/pdf-broucher.png"/>
                            </a>
						</span>
						
						<span class="broucher-link">
						 <a href="<?=base_url()?>assets/uploads/brochure/<?=$b['path']?>" class="btn btn-info center-block brochure-btn" download style="border-radius: 0px !important;">Download Brochure</a>
                                <?php } ?>
						</span>
						 </div>



                    </div>
                </div>
                <!--quick-search-end-->
                <!--quick-search-->
                <div class="container">
                    <div class="project-search">
                        <h3>Location</h3>
                        <div class="col-md-12 brochure location-map">

                         <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.7171217104433!2d80.20915541437388!3d12.861538490928123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525bb7b6444d59%3A0xc592373410478fbe!2sCasa+Grand+Elan!5e0!3m2!1sen!2sin!4v1505456649901" width="1200" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                         <div id="map" style="width:100%;height:50%">
                         </div>

                     </div>


                 </div>
             </div>
             <!--quick-search-end-->

         </div>
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


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJS1u8R66sDRCBvGGNljYLy_bgBDs37TA&callback=myMap" async defer></script> 
        <script type="text/javascript">$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});</script>
        <script>
    //$(document).ready(function(){
        var latitude = <?php echo $records['project_details'][0]['latitude'] ?>;
        var longitude = <?php echo $records['project_details'][0]['longitude'] ?>;
        var projectName = "<?php echo $records['project_details'][0]['name'] ?>";
        var address = "<?php echo $records['project_details'][0]['address'] ?>";
        var price_min = "<?php echo $records['project_details'][0]['price_min'] ?>";
        var price_max = "<?php echo $records['project_details'][0]['price_max'] ?>";

        function myMap() 
        {
            var myLatLng = {lat: latitude, lng: longitude};
            console.log(myLatLng);

            var content = '<p><strong>'+projectName+'</strong></p><p>'+address+'</p><strong>Min Price: </strong>'+price_min+'<br><strong>Max Price: </strong>'+price_max;
            
            var mapOptions = {
                center: new google.maps.LatLng(latitude, longitude),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.TERRAIN
            }

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: projectName
            });

            var infowindow = new google.maps.InfoWindow({
                content: content
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            marker.setMap(map);
            

        }
        
    //});
</script>


<script>
  $(document).ready(function()
  {
   $("#moresrarch").css("display","none");
});
  $("#mysearchinput").on("click",function()
  {
   $("#moresrarch").css({"display":"block","transition" : "opacity 1s ease-in-out"});
})
</script>
<script>
    $(document).ready(function(){
        var base_url = 'http://localhost/codeigniter/mpb/index.php/home/';

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
                
                search_box = search.replace('BHK', 'bhk'); 
                console.log($('#search_form').serialize());
                
                
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

        $('.clearall').click(function(e){
            e.preventDefault();
            $('#search_form')[0].reset();
        });

        
    });
</script>
<script type="text/javascript"> 
   var tabsFn = (function() {

      function init() {
        setHeight();
    }

    function setHeight() {
        var $tabPane = $('.tab-pane'),
        tabsHeight = $('.nav-tabs').height();

        $tabPane.css({
          height: tabsHeight
      });
    }

    $(init);
})();
</script>
<script type="text/javascript">
    var arr = $('div.Img').map(function (elem) {
        return {
            href: $(this).data('type'),
            title: $(this).data('title')
        }
    }).get();
    $(".open_fancybox").click(function() {

        $.fancybox.open(arr, {
            nextEffect : 'none',
            prevEffect : 'none',
            padding    : 0,
            helpers    : {
                title : {
                    type: 'over'  
                },
                thumbs : {
                    width  : 75,
                    height : 50,
                    source : function( item ) {
                        return item.href.replace('_b.jpg', '_s.jpg');
                    }
                }
            }
        });

        return false;
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<script> 
  $(document).ready(function(){
   $('.scroller').scrollify(); 
});
</script> 

</body>

</html>