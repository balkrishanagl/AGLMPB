<?php $this->load->view('home/header'); ?>


<?php  /*if($_SERVER['REMOTE_ADDR'] == '61.95.225.130') {  
print "<pre>";
    print_r($trending); } 
print "</pre>";*/
    ?>
<div class="circlecontainer">  
    <a href="#section-1" class="circle section-1"></a>
    <a href="#section-2" class="circle section-2"></a>
    <a href="#section-3" class="circle section-3"></a>
    <a href="#section-4" class="circle section-4"></a>
    <a href="#section-5" class="circle section-5"></a>
    <a href="#section-6" class="circle section-6"></a>
</div>
<section id="fullpage">
        <div class="section" id="mpb-home">
            <div class="section_one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 s_left">
                         <?php $this->load->view('home/search-bar'); ?>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="tab_mster">
                                <ul class="nav nav-tabs custom_tabs">
                                    <li class="active"><a href="#trending_projects" data-toggle="tab">Trending projects</a></li>
                                    <li><a href="#new_projects" data-toggle="tab">New Projects</a></li>
                                    <li><a href="#luxury_living" data-toggle="tab">Luxury Living</a></li>
                                    <li><a href="#affordable_homes" data-toggle="tab">Affordable homes</a></li>
                                </ul>
                                <div class="tab-content custom_tab_content">

                                    
                                    <div class="tab-pane fade conf_summary in active" id="trending_projects">
                                        <div class="owl-carousel tp_slider">
                                           <?php  for ($i=0; $i <count($trending); $i++) { ?>
                                            <div class="item">
                                                <div class="tab_block">
                                                    <a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$trending[$i]['project_id'] ?>" ><img src="<?php echo base_url().'assets/uploads/images/'.$trending[$i]['name']?>" alt=""></a>
                                                    <div class="overlay">
                                                        <h3><?php echo $trending[$i]['projectname']?> </h3>
                                                        <p><i class="fa  fa-map-marker"></i> <?php echo ucfirst($trending[$i]['locationsname'])?> | <i class="fa fa-rupee"></i>32.7 Lacs</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }  ?>
                                        </div>
                                    </div>

                                  
                                    <div class="tab-pane fade conf_sch" id="new_projects">
                                        <div class="owl-carousel tp_slider">
                                             <?php  for ($i=0; $i <count($trending); $i++) { ?>
                                            <div class="item">
                                                <div class="tab_block">
                                                    <a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$trending[$i]['project_id'] ?>" ><img src="<?php echo base_url().'assets/uploads/images/'.$trending[$i]['name']?>" alt=""></a>
                                                    <div class="overlay">
                                                        <h3><?php echo $trending[$i]['projectname']?> </h3>
                                                        <p><i class="fa  fa-map-marker"></i> <?php echo ucfirst($trending[$i]['locationsname'])?> | <i class="fa fa-rupee"></i>32.7 Lacs</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }  ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade conf_sch" id="luxury_living">
                                        <div class="owl-carousel tp_slider">
                                             <?php  for ($i=0; $i <count($trending); $i++) { ?>
                                            <div class="item">
                                                <div class="tab_block">
                                                    <a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$trending[$i]['project_id'] ?>" ><img src="<?php echo base_url().'assets/uploads/images/'.$trending[$i]['name']?>" alt=""></a>
                                                    <div class="overlay">
                                                        <h3><?php echo $trending[$i]['projectname']?> </h3>
                                                        <p><i class="fa  fa-map-marker"></i> <?php echo ucfirst($trending[$i]['locationsname'])?> | <i class="fa fa-rupee"></i>32.7 Lacs</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }  ?>
                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane fade conf_sch" id="affordable_homes">
                                        <div class="owl-carousel tp_slider">
                                             <?php  for ($i=0; $i <count($trending); $i++) { ?>
                                            <div class="item">
                                                <div class="tab_block">
                                                    <a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$trending[$i]['project_id'] ?>" ><img src="<?php echo base_url().'assets/uploads/images/'.$trending[$i]['name']?>" alt=""></a>
                                                    <div class="overlay">
                                                        <h3><?php echo $trending[$i]['projectname']?> </h3>
                                                        <p><i class="fa  fa-map-marker"></i> <?php echo ucfirst($trending[$i]['locationsname'])?> | <i class="fa fa-rupee"></i>32.7 Lacs</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }  ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#section-2" class="dwn_arrow">
                <img src="images/down-arrow.png" alt="">
            </a>
        </div>
        <div class="section" id="project-showcase">
            <div class="section_two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <div class="heading">
                                <h2><span>project</span>Showcase</h2>
                            </div>
                            <div class="owl-carousel showcase_slider">
                                <div class="item">
                                    <div class="img_block">
                                        <img src="images/deal-img.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img_block">
                                        <img src="images/deal-img.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img_block">
                                        <img src="images/deal-img.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img_block">
                                        <img src="images/deal-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="showcase_block">
                                        <div class="img_block">
                                            <img src="images/showcase-img1.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h4>Locations</h4>
                                            <ul>
                                                <li><a id="Tambaram" class="homeloc" href="#"><span>+</span>Tambaram</a></li>
                                                <li><a id="Perumbakkam" class="homeloc" href="#"><span>+</span>Perumbakkam</a></li>
                                                <li><a id="Sholinganallur" class="homeloc" href="#"><span>+</span>Sholinganallur</a></li>
                                                <li><a id="Nungambakkam" class="homeloc" href="#"><span>+</span>Nungambakkam</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="showcase_block">
                                        <div class="img_block">
                                            <img src="images/showcase-img2.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h4>Projects</h4>
                                            <ul>
                                                <li><a href="http://mypropertyboutique.com/MyPropertyBoutique/index.php/home/projectDetails?id=2"><span>+</span>Radiance Mercury</a></li>
                                                <li><a href="http://mypropertyboutique.com/MyPropertyBoutique/index.php/home/projectDetails?id=12"><span>+</span>Light House</a></li>
                                                <li><a href="http://mypropertyboutique.com/MyPropertyBoutique/index.php/home/projectDetails?id=22"><span>+</span>The Art</a></li>
                                                <li><a href="http://mypropertyboutique.com/MyPropertyBoutique/index.php/home/projectDetails?id=7"><span>+</span>Ferns</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="showcase_block">
                                        <div class="img_block">
                                            <img src="images/showcase-img3.jpg" alt="">
                                        </div>
                                        <div class="content">
                                            <h4>Builders</h4>
                                            <ul>
                                                <li><a class="homeloc" id="Radiance Realty" href="#"><span>+</span>Radiance Realty</a></li>
                                                <li><a class="homeloc" id="Jain Housing" href="#"><span>+</span>Jain Housing</a></li>
                                                <li><a class="homeloc" id="Casagrand" href="#"><span>+</span>Casagrand</a></li>
                                                <li><a class="homeloc" id="Indiabulls" href="#"><span>+</span>Indiabulls</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#section-3" class="dwn_arrow">
                <img src="images/down-arrow.png" alt="">
            </a>
        </div>
        <div class="section" id="featured-projects">

            <?php /*if($_SERVER['REMOTE_ADDR'] == '61.95.225.130') {   echo"<pre>"; print_r($featuredproject); echo"</pre>"; }*/?>
            <div class="section_three">
                <div class="container">
                    <div class="heading">
                        <h2><span>Featured</span>new projects</h2>
                    </div>
                    <div class="project_slide_wrap">
                        <div class="owl-carousel project_slider">
                            

                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="project_block">
                                            <div class="img_block"><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$featuredproject[0]->project_id; ?>" > <img width="332" height="460" src="<?php echo base_url().'assets/uploads/images/'.$featuredproject[0]->img_path; ?>" alt=""></a></div>
                                            <div class="overlay">
                                                <h4><?php echo $featuredproject[0]->projName; ?></h4><br />
                                                <span><i class="fa  fa-map-marker"></i><?php echo $featuredproject[0]->locName; ?> | <i class="fa fa-rupee"></i><?php echo $featuredproject[0]->min.'-'. $featuredproject[0]->max; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="row paddingbottom20">
                                            <div class="col-sm-7 col-xs-12">
                                                <div class="project_block">
                                                    <div class="img_block"><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$featuredproject[1]->project_id; ?>" > 
                                                        <img width="568" height="220" src="<?php echo base_url().'assets/uploads/images/'.$featuredproject[1]->img_path; ?>" alt=""></a></div>
                                                    <div class="overlay">
                                                        <h4><?php echo $featuredproject[1]->projName; ?></h4><br />
                                                        <span><i class="fa  fa-map-marker"></i><?php echo $featuredproject[1]->locName; ?> | <i class="fa fa-rupee"></i><?php echo $featuredproject[1]->min.'-'. $featuredproject[1]->max; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12">
                                                <div class="project_block">
                                                    <div class="img_block"><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$featuredproject[2]->project_id; ?>" > 
                                                        <img width="568" height="220" src="<?php echo base_url().'assets/uploads/images/'.$featuredproject[2]->img_path; ?>" alt=""></a></div>
                                                    <div class="overlay">
                                                        <h4><?php echo $featuredproject[2]->projName; ?></h4><br />
                                                        <span><i class="fa  fa-map-marker"></i><?php echo $featuredproject[2]->locName; ?> | <i class="fa fa-rupee"></i><?php echo $featuredproject[2]->min.'-'. $featuredproject[2]->max; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5 col-xs-12">
                                                <div class="project_block">
                                                    <div class="img_block"><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$featuredproject[3]->project_id; ?>" > 
                                                        <img width="568" height="220" src="<?php echo base_url().'assets/uploads/images/'.$featuredproject[3]->img_path; ?>" alt=""></a></div>
                                                    <div class="overlay">
                                                        <h4><?php echo $featuredproject[3]->projName; ?></h4><br />
                                                        <span><i class="fa  fa-map-marker"></i><?php echo $featuredproject[3]->locName; ?> | <i class="fa fa-rupee"></i><?php echo $featuredproject[3]->min.'-'. $featuredproject[3]->max; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-xs-12">
                                                <div class="project_block">
                                                    <div class="img_block"><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$featuredproject[4]->project_id; ?>" > 
                                                        <img width="568" height="220" src="<?php echo base_url().'assets/uploads/images/'.$featuredproject[4]->img_path; ?>" alt=""></a></div>
                                                    <div class="overlay">
                                                        <h4><?php echo $featuredproject[4]->projName; ?></h4><br />
                                                        <span><i class="fa  fa-map-marker"></i><?php echo $featuredproject[4]->locName; ?> | <i class="fa fa-rupee"></i><?php echo $featuredproject[4]->min.'-'. $featuredproject[4]->max; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
            <a href="#section-4" class="dwn_arrow">
                <img src="images/down-arrow.png" alt="">
            </a>
        </div>
        <div class="section" id="our-boutiques">
            <div class="section_four">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="heading sd_heading">
                                <h2><span>Our</span>Boutiques</h2>
                                <p>Our hyper local prop shops have revolutionized the way India buys property. The boutiques display top-notch properties across the city, all under one roof, where buyers and sellers can avail special deals and exclusive pricing with absolutely no service charge. The purpose of the boutiques are to enable prospective buyers and investors to gain real estate financing and consultancy services all under one roof, creating a galaxy of builders, buyers and experts in real estate. </p>
                            </div>
                            <div class="ob_left">
                                <img src="images/ob-img1.jpg" alt="">
                                <div class="overlay">
                                    <h3>Last Event <span>29th September 2017</span></h3>
                                    <p>Held at SP Infocity Food Court, this was exclusively for corporate employees on Chennai’s Real Estate market, the growth potentials and upcoming micro markets to invest in and details about PMAY Scheme.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="heading bd_heading">
                                <h2><span>Our</span>Boutiques</h2>
                            </div>
                            <div class="ob_right">
                                <p>Our hyper local prop shops have revolutionized the way India buys property. The boutiques display top-notch properties across the city, all under one roof, where buyers and sellers can avail special deals and exclusive pricing with absolutely no service charge.</p>
                                <ul class="lightgallery">
                                    <li class="col-xs-6" data-responsive="images/ob-img2.jpg" data-src="images/ob-img2.jpg"> 
                                        <div class="img_block"><img src="images/ob-img2.jpg" alt=""></div>
                                        <h5>SP Infocity, Chennai </h5>
                                        <a href="#"><img src="images/search-zoom.png" alt=""></a>
                                    </li>
                                    <li class="col-xs-6" data-responsive="images/ob-img3.jpg" data-src="images/ob-img3.jpg"> 
                                        <div class="img_block"><img src="images/ob-img3.jpg" alt=""></div>
                                        <h5>SP Infocity, Chennai </h5>
                                        <a href="#"><img src="images/search-zoom.png" alt=""></a>
                                    </li>
                                    <li class="col-xs-6" data-responsive="images/ob-img4.jpg" data-src="images/ob-img4.jpg"> 
                                        <div class="img_block"><img src="images/ob-img4.jpg" alt=""></div>
                                        <h5>Spencer Plaza, Chennai</h5>
                                        <a href="#"><img src="images/search-zoom.png" alt=""></a>
                                    </li>
                                    <li class="col-xs-6" data-responsive="images/ob-img5.jpg" data-src="images/ob-img5.jpg"> 
                                        <div class="img_block"><img src="images/ob-img5.jpg" alt=""></div>
                                        <h5>Spencer Plaza, Chennai</h5>
                                        <a href="#"><img src="images/search-zoom.png" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#section-5" class="dwn_arrow">
                <img src="images/down-arrow.png" alt="">
            </a>
        </div>
        <div class="section" id="about-mpb">
            <div class="section_five">
                <div class="container">
                    <div class="heading">
                        <h2><span>About</span>my property boutique</h2>
                    </div>
                    <p>A distinctive new real estate agency based out of Chennai, My Property Boutique has evolved from showcasing exquisite real estate properties under one roof, to displaying real estate projects online where buyers and sellers can connect and discuss their prospects of doing business conveniently with utmost transparency. From the brick and mortar realm to a click and mortar portal, My Property Boutique is one of Chennai’s fastest growing startups and has evolved and expanded rapidly in a short span of time since its inception in 2016.</p>
                    <div class="text-center">   
                        <ul class="abt_list">
                            <li>
                                <div class="icon">
                                    <img src="images/abt-icon1.png" alt="">
                                </div>
                                <h4>luxury living</h4>
                                <p>Tolor consecteur alite.</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="images/abt-icon2.png" alt="">
                                </div>
                                <h4>affordable homes</h4>
                                <p>Tolor consecteur alite.</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="images/abt-icon3.png" alt="">
                                </div>
                                <h4>ready to occupy</h4>
                                <p>Tolor consecteur alite.</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="images/abt-icon4.png" alt="">
                                </div>
                                <h4>New Projects</h4>
                                <p>Tolor consecteur alite.</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="images/abt-icon5.png" alt="">
                                </div>
                                <h4>exclusive deals</h4>
                                <p>Tolor consecteur alite.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="#section-6" class="dwn_arrow">
                <img src="images/down-arrow.png" alt="">
            </a>
        </div>
<!-- footer -->
<?php $this->load->view('home/footer');?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD04JLwVRXgGgYtVs5mkMIgvBpDt93pZvI"
  type="text/javascript"></script>
<script>
    $(document).ready(function(){
        var base_url = "<?php echo base_url();?>index.php/home/";
        var page = 0;
        var pageLimit =0;
        if(page == 0)
        {
            $("#prv-btn").hide();
        }

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


        $('.homeloc').click(function(e){
             e.preventDefault();
             // alert("welcom");
            var loc = $(this).attr("id");
            $("#mysearchinput").val(loc);

            $.ajax({
                        url: base_url+'searchLocation',
                        method: 'post',
                        data: $('#search_form').serialize(),
                        success:function(msg)
                        {
                            msg = $.toString(msg);
                                     console.log(msg);
                                   if(msg.status==false) {
                                       alert(msg.msg);
                                   } else {
                                       $('#search_form').submit();
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
                } else {
                    search_box = search.replace('BHK', 'bhk'); 
                   /* console.log($('#search_form').serialize()); */
                     $('#search_form').submit();

                    /*$.ajax({
                        url: base_url+'searchLocation',
                        method: 'post',
                        data: $('#search_form').serialize(),
                        success:function(msg)
                        {
                            msg = $.toString(msg);
                                     console.log(msg);
                                   if(msg.status==false) {
                                       alert(msg.msg);
                                   } else {
                                       $('#search_form').submit();
                                   }

                               }
                           }); */
                }
                

            });

        $('.clearall').click(function(e){
            e.preventDefault();
            $('#search_form')[0].reset();
        });

        $.ajax({
            url: base_url+'newListings',
            method: 'GET',
            success:function(msg)
            {
                msg = $.parseJSON(msg);
                console.log(msg);
                                // if(msg.status==true)
                                // {
                                //     alert();
                                //     location.href= msg.redirectURL;
                                // }
                                // else
                                // {
                                //     alert('Something wrong!');
                                // }
                            }
                        });


            //city projects list

            $.ajax({
                url: base_url+'featuredNewProjectsLimit',
                method: 'GET',
                success:function(cityListNum)
                {
                    //console.log(cityListNum);
                    pageLimit = cityListNum;
                    console.log('page-limit: ',pageLimit);

                }
            });

            $.ajax({
                url: base_url+'featuredNewProjects',
                method: 'POST',
                data: {'offset': page},
                success:function(cityList)
                {
                    cityList =$.parseJSON(cityList);
                    console.log("new city list",cityList);
                    $.each(cityList,function(i,item){
                        if(item['locName'] != null)
                        {
                            console.log(""+item['projName']+" in " +item['locName']+","+item['min']+"-"+item['max']);
                            // $('.sub-featured-products').append("<a href="+base_url+"projectDetails?id="+item['project_id']+"><div class='col-md-3'><div class='well well-lg project-show-cart card'>"+item['projName']+" <br> "+item['locName']+"<br> "+item['min']+" - "+item['max']+"</div></div></a>")
                            //Mythili
                            $('.sub-featured-products').append('<a href="'+base_url+'projectDetails?id='+item['project_id']+'" > <div class="col-md-4"><div class="project-show-cart card"> <img src="<?php echo base_url()?>assets/uploads/images/'+item['img_path']+'" class="imag-responsive" /> <div class="cart-des-project-a"><h4>'+item['projName']+'<br>'+item['locName']+'<br>'+item['min']+'-'+item['max']+'</h4></div></a>  ');

                        }
                    });
                }
            });
            $('#nxt-btn').click(function(e){
                page = page+12;
                $.ajax({
                    url: base_url+'featuredNewProjects',
                    method: 'POST',                    data: {'offset':page},
                    success:function(cityList)
                    {
                     cityList =$.parseJSON(cityList);
                     console.log("new city list",cityList);
                     $('.sub-featured-products').empty();
                     $.each(cityList,function(i,item){
                        if(item['locName'] != null)
                        {
                            console.log(""+item['projName']+" in " +item['locName']+","+item['min']+"-"+item['max']);
                            // $('.sub-featured-products').append("<a href="+base_url+"projectDetails?id="+item['project_id']+"><div class='col-md-4'><div class='project-show-cart card'>"+item['projName']+" <br> "+item['locName']+"<br> "+item['min']+" - "+item['max']+"</div></div></a>")
                            $('.sub-featured-products').append('<a href="'+base_url+'projectDetails?id='+item['project_id']+'" > <div class="col-md-4"><div class="project-show-cart card"> <img src="<?php echo base_url()?>assets/uploads/images/'+item['img_path']+'" class="imag-responsive" /> <div class="cart-des-project-a"><h4>'+item['projName']+'<br>'+item['locName']+'<br>'+item['min']+'-'+item['max']+'</h4></div></a>  ');
                            
                        }
                    });

                     $("#prv-btn").show();
                     if(page >= pageLimit - 1)
                     {
                         $("#nxt-btn").hide(); 
                     }
                 }
             });                
                
            });

            $('#prv-btn').click(function(e){
                page = page-12;
                console.log(page,"page value prev")
                $.ajax({
                    url: base_url+'featuredNewProjects',
                    method: 'POST',
                    data: {'offset':page},
                    success:function(cityList)
                    {
                     cityList =$.parseJSON(cityList);
                     console.log("new city list",cityList);
                     $('.sub-featured-products').empty();
                     $.each(cityList,function(i,item){
                        if(item['locName'] != null)
                        {
                            console.log(""+item['projName']+" in " +item['locName']+","+item['min']+"-"+item['max']);
                            // $('.sub-featured-products').append("<a href="+base_url+"projectDetails?id="+item['project_id']+"><div class='col-md-4'><div class='project-show-cart card'>"+item['projName']+" <br> "+item['locName']+"<br> "+item['min']+" - "+item['max']+"</div></div></a>")
                            $('.sub-featured-products').append('<a href="'+base_url+'projectDetails?id='+item['project_id']+'" > <div class="col-md-4"><div class="project-show-cart card"> <img src="<?php echo base_url()?>assets/uploads/images/'+item['img_path']+'" class="imag-responsive" /> <div class="cart-des-project-a"><h4>'+item['projName']+'<br>'+item['locName']+'<br>'+item['min']+'-'+item['max']+'</h4></div></a>  ');
                            
                        }
                    });
                     if(page == 0)
                     {
                        $('#prv-btn').hide();
                    }
                    if(page < pageLimit)
                    {
                     $("#nxt-btn").show(); 
                 }
             }
         });                
                
            });

/* FOR autocomplete search :- sharad 15jan2018 start */
  $( "#mysearchinput" ).on('keyup',function() {
	$.ajax({
		type: "POST",
		dataType: "json",
		url  : '<?php echo base_url();?>/home/searchAuto',
		success  : function(response) {
			//alert(response); return false;
			var sData = response;
			$( "#mysearchinput" ).autocomplete({
			  source: sData
			});
		}
	});
  });

  $('#srchMapBtn').click(function(){
	var sVal = $('#mysearchinput').val();
	if(sVal==''){
		alert('please enter your query first');
		$('#mysearchinput').focus();
		return false;
	}else{
		$.ajax({
		type: "POST",
		dataType: "json",
		data: 'srVal='+sVal,
		url  : '<?php echo base_url();?>/home/srchLatLong',
		success  : function(response) {
			//alert(response); 
			if(isEmpty(response)) {
				alert('no projects found for your query');
				return false;
			} else {
				$('#reg_modal').show();
				init(response);
			}
			
		}
	});
	}
  });
  
  $('.close').on('click',function(e){
	$('#reg_modal').hide();
  });
  
  function isEmpty(obj) {
		for(var key in obj) {
			if(obj.hasOwnProperty(key))
				return false;
		}
		return true;
	}	
  
/* FOR autocomplete search :- sharad 15jan2018 end */
  });

$('.dropdown-menu').on('click', function(e) {
    e.stopPropagation();
});


//search via link

$('.search-link').click(function(e){
            e.preventDefault();
                console.log($(this).data("id"));
                var city_id = $(this).data("id");
                var search_box = $('#searchlink'+city_id).val();

                $("#mysearchinput").val(function() {
                    return this.value + search_box;
                });
                $('#searchsubmit').click();
});
</script>
<script>
	var map; 
	function init(response) {
		var markers = response;
		var map = new google.maps.Map(document.getElementById("map_canvas"), {
		  center: new google.maps.LatLng(13.0827, 80.2707),
		  zoom: 8,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});		 
		var infoWindow = new google.maps.InfoWindow();
		for (var i = 0, length = markers.length; i < length; i++) {
		  var data = markers[i],
			  latLng = new google.maps.LatLng(data.latitude, data.longitude); 

		  // Creating a marker and putting it on the map
		  var marker = new google.maps.Marker({
			position: latLng,
			map: map,
			title: data.name
		  });
		  (function(marker, data) {

				// Attaching a click event to the current marker
				google.maps.event.addListener(marker, "click", function(e) {
					infoWindow.setContent(data.description);
					infoWindow.open(map, marker);
				});


			})(marker, data);
		}	   
	}
</script>
<!-- footer end -->