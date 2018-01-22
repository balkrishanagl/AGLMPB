

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Homezelect</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/home/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/home/assets/css/jquery-scrollify-style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
   <!--header-->
   <?php $this->load->view('home/top-bar'); ?>
   

<!--header-end-->

<!--banner-part-->
<div class="fixed-hedaer-top-space"></div>
<div class="baner-img">
   <div class="search-div project">
    <div class="container-fluid">
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


        <!-- <div class="more-searchdiv" id="moresrarch">
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
                </button> -->
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
                        <!-- </div>
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
                </div> -->

            </div>
        </div>
    </div>

</div>
</form>



<!--banner-part-end-->


<!--project-details-section-part-->
<div class="project-detail-section-part">

  <!--project-bar-end-->

  <div class="container-fluid">
      <div class="col-md-12  search-filter">





       <div class="col-md-3 sidebar">

        <div class="budget_class">
            <h5>Budget</h5>
            <div class="col-md-12">
                <div class="col-md-6 nopadding">
                    <input type="text" class="form-control" name="" placeholder="Min">
                </div>
                <div class="col-md-6 nopadding">
                    <input type="text" class="form-control" name="" placeholder="Max">
                </div>

            </div>
        </div>
        <hr class="small-line">
        <div class="b_class">
            <h5>Bedrooms</h5>
            <div class="checkbox">
                <label><input type="checkbox" value="">1 Bedroom</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">2 Bedroom</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">3 Bedroom</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">4 Bedroom</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">5 Bedroom</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">6 Bedroom</label>
            </div>
        </div>



        <hr>
        <h5>Availability</h5>
        <div class="checkbox">
            <label><input type="checkbox" value="">Under Construction</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Ready to Move-In</label>
        </div>
        <hr>


        <div class="budget_class">
            <h5>Area</h5>
            <div class="col-md-4 nopadding">
                <input type="text" class="form-control" name="" placeholder="Min">
            </div>
            <div class="col-md-offset-1 col-md-4 col-md-offset-1 nopadding">
                <input type="text" class="form-control" name="" placeholder="Max">
            </div>
        </div>
        <hr class="small-line">

        <h5>Type</h5>
        <div class="checkbox">
            <label><input type="checkbox" value="">Apartment</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Villa</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Plot</label>
        </div>
        <hr>

        <h5>Looking at</h5>
        <div class="checkbox">
            <label><input type="checkbox" value="">Standalone Building</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Gated Community</label>
        </div>


    </div>
    <div class=" col-md-9 contentBox">


        <div class="wrapped_box">
            <div class="detilsBox">
                <div class="imgBox">
                    <a href="#">
                        <img src="<?= base_url() ?>assets/home/images2/cardImg.png" class="img-responsive" alt="house_view">
                    </a>
                </div>
                <div class="contentBox">
                    <div class="headlogo pull-right">
                        <img src="<?= base_url() ?>assets/home/images2/casa_logo.png" class="img-responsive" alt="builder_logo">
                    </div>
                    <div class="boxHead">
                        <h3>Casa Grande - The Height</h3>
                    </div>

                    <p><b>Highlights - </b> Under-Construction / New Booking / Posession by Aug 2017</p>

                    <p><b>Description - </b> The Height, an upcoming residential township in Guindy being developed Casa Grande....</p>
                    <br>
                    <div class="listBox">
                        <div class="stars pull-right">
                            <span class="rating">
                                <span class="star" title=""></span>
                                <span>Shortlist</span>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="postDetails">
                    <div class="builder">
                        <span><b>Builder - </b><a href="#">casa Grande </a></span>
                    </div>
                    <div class="post">
                        <span><b>Posted - </b> <a href="#">on 20 Sept </a></span>
                    </div>
                </div>
            </div>
            <div class="wrapped_footer">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="link_1">
                    <i class="fa fa-ban error" aria-hidden="true"></i>
                    <a href="#">Report Error in Listing</a>
                </div>
                <div class="link_2 pull-right">
                    <a href="#" class="btnLink_1">
                        Contact Builder
                    </a>
                    <button type="button" data-toggle="modal" data-lat="" data-long="" data-target="#mapModal" class="viewMapButton btnLink_1">
                        View in Maps
                    </button>
                    <a href="" class="btnLink_2">
                        View Details
                    </a>
                </div>
            </div>
        </div>

                        <!-- <div>
                            <div>
                                <img src="images/ad.png" alt="ads" class="img-responsive">
                            </div>
                        </div> -->
                        <div class="col-md-12 text-center">
                            <div class="pagination">
                              <a href="#" style="color: #061d36;">&lt;</a>
                              <a class="active"  href="#">1</a>
                              <a href="#">2</a>
                              <a href="#">3</a>
                              <a href="#">4</a>
                              <a href="#">5</a>
                              <a href="#">6</a>
                              <a href="#">7</a>
                              <a href="#">8</a>
                              <a href="#">9</a>
                              <a href="#">10</a>
                              <a href="#" style="color: #061d36;">&gt;</a>
                          </div>
                      </div>
                  </div>

              </div>
          </div>


          <!-- /container -->


          <div class="container">












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
        var base_url = 'http://localhost/codeigniter/mpb/index.php/';

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
                //var base_url = 'http://13.59.53.61/index.php/home/'
                
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