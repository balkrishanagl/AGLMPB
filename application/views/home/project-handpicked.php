<!DOCTYPE <?php echo "Test - Delete this" ?>
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
        <img src="<?= base_url() ?>assets/home/assets/images/banner.png" class="img-responsive" alt="banner" />

        <div class="search-div">
            <div class="container">
                <div class="col-md-12" id="searchForm">
                    <h3 class="text-center">We help you find your dream home at no additional cost</h3>
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
     
                
    <!--banner-part-end-->
     <div class="home-section-part">
     <div class="container">
     <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 project-showcase">

                    <h3>Project Showcase</h3>
                    <p>Explore curated list of top selling apartments, villas and plots in and around chennai</p>

                    <div class="row">

                        <!--project-cart-->
                       
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-6 col-xs-12 ">
                            <div class="project-show-cart">
                               <img src="<?php echo base_url()?>assets/home/assets/images/img_card.png" class="imag-responsive">
                                <div class="cart-des-project">
                                    <h4>Casa Project 1</h4>
                                    <p>Anna nagar</p>
                                    <p>2,4,3 BHK Apartments</p>
                                    <p class="last_p"><span class="number">30 Lac</span> Onwards</p>
                                </div>
                            </div>
                        </div>
                       
                        <!--project-cart-end-->

                       

                       


                    </div>
                </div>
     </div>
     </div>
     </div>
    
<!--project-details-section-part-->
    <div class="project-detail-section-part">
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

</html>html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>