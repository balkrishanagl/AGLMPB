<!DOCTYPE html>
<html>
<head>
    <title>collections</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>assets/home/assets3/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/home/assets3/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-fixed-top nav_right" id="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="<?= base_url() ?>assets/home/images3/logo.png" class="img-responsive"></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<button class="btn navbar-btn nav_btn_1">Post Free Ad</button>
				<button class="btn navbar-btn nav_btn_1">Saved Properties</button>
				<button class="btn navbar-btn nav_btn_2 ">Login</button>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
    <div id="searchForm">
        <form class="col-md-12">
            <div class="col-md-offset-2 col-md-2">
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
            </div>
            <div class="form-group col-md-6 ">
                <div class="input-group input-group-lg">
                    <input type="text" id="s" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" id="searchsubmit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 buy">
				<h3>Projects - <?=ucfirst($records[0]->locName)?></h3>
				<p>Explore curated list of top selling apartments, villas and plots in and around <?=ucfirst($records[0]->locName)?>.</p>
			</div>
		</div>
	</div>
	
    <!--<nav class="navbar buynav">
        <div class="row">
            <div class="col-lg-2 nav2"><p>Handpicked</p></div>
            <div class="col-lg-2 nav2"><p>Following</p></div>
            <div class="col-lg-2 nav2"><p>Saved Collection</p></div>
            <div class="col-lg-2 nav2"><p>My Collections</p></div>
        </div>
    </nav>-->
	<div class="container" style="padding-bottom:2%;">
		<div class="row">
			<div class="col-md-12 collect-col12">
                <?php // echo '<pre>'; print_r($records); echo '</pre>'?>
				<?php foreach($records as $r) { ?>
				<div class="col-md-4 nopadding colec-div">
					<div class="row">
					<a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$r->project_id ?>">

						<div class="col-md-10 col-div">
							<div class="col-md-4 nopadding">
								<div class="pull-left card_pad">
									<img src="<?= base_url() ?>assets/home/images3/homesel5.jpg" alt="image" class="img-responsive img_card">
								</div>
							</div>
							<div class="col-md-8 nopadding">
								<div class="text">
									<h4><?=$r->projectName?></h4>
									<p><?=ucfirst($r->locName)?></p>
									<p><?=ucfirst($r->totBHK)?> BHK</p>
									<p class="last_p"><span class="number">Rs.<?=$r->priceMin ?></span> Onwards</p>
								</div>
							</div>
						</div>
						</a>
					</div>
				</div>
				
				<?php } ?>
                
			</div>
			
		</div>
    </div>
</div>



<!-- footer -->
<?php $this->load->view('home/footer');?>
<!-- footer end -->



    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script>
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
    function multiplyNode(node, count, deep) {
    for (var i = 0, copy; i < count - 1; i++) {
        copy = node.cloneNode(deep);
        node.parentNode.insertBefore(copy, node);
    }
}

multiplyNode(document.querySelector('.wrapped_box'), 30, true);
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
</script>-->
</body>
</html>

