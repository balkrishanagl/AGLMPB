<?php $this->load->view('home/header'); 
/*echo "<pre>";
print_r($records); 
echo "<pre>"; */
?>  

    <section class="inner_section">
        <div class="project_top_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12">
                                <div class="tps_logo">
                                    <?php if($records['project_details'][0]['project_logo']!=''){ ?>
                                        <img width="150px" height="100px" src="<?php echo base_url().'assets/uploads/images/'.$records['project_details'][0]['project_logo']?>" alt="">
                                    <?php } else { ?>
                                        <img style="width: 150px;margin-top: -10px;" src="<?php echo base_url().'images/no-image.png' ?>" alt="no-image">
                                    <?php }?>
<!-- 
                                    <img src="<?= base_url() ?>images/radince-logo.png" alt=""> -->
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <div class="tps_cont">
                                    <h3><?php echo $records['project_details'][0]['name']; ?> </h3>
                                    <h6><span>By</span> <?php echo $records['project_details'][0]['developername']; ?> </h6>
                                    <p><?php echo $records['project_details'][0]['description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <ul class="tps_list">
                            <li>
                                <div class="icon">
                                    <img src="<?= base_url() ?>images/tps-icon1.png" alt="">
                                </div>
                                uds area - <span>480 - 870 sQ..ft</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="<?= base_url() ?>images/tps-icon2.png" alt="">
                                </div>
                                No.of Units - <span><?php echo $records['project_details'][0]['total_units']; ?></span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="<?= base_url() ?>images/tps-icon3.png" alt="">
                                </div>
                                bedroom(s) <span><?php 
                                      $listings = $records['listings'];
                                for ($l=0; $l<count($listings); $l++) { 
                                    if($listings[$l]->bhk == 0){
                                          echo "Plots";
                                     } else {
                                        echo $listings[$l]->bhk;
                                         if(count($listings[$l]->bhk) > 1){
                                            echo " & ";
                                         }
                                     }
                                     
                                }?>

                                </span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="<?= base_url() ?>images/tps-icon4.png" alt="">
                                </div>
                                Possession Date <span>ready to move</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="price_tag_section">
                            <h3>
                                <img src="<?= base_url() ?>images/tag-icon.png" alt="">
                                <span>Base Price :</span> <?php echo $records['project_details'][0]['price_min']; ?> +
                            </h3>
                            <div class="stats_list">
                                <ul>
                                    <li>3499/- per Sq.Ft.</li>
                                    <li>EMI starts at 11.8 K</li>
                                </ul>
                            </div>
                            <!-- <a href="#" class="calc">
                                <img src="<?= base_url() ?>images/calc.png" alt="">
                                EMI Calculator
                            </a> -->
                            <a style="margin-top: 33px;" href="#" class="btn dwn_btn">
                                <img src="<?= base_url() ?>images/dwn-icon.png" alt="">
                                <span>Download</span> Brochure
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Projects in Chennai</a></li>
                   <!--  <li><a href="#">Sec-89 A</a></li> -->
                    <li><?php echo $records['project_details'][0]['name']; ?></li>
                </ul>
            </div>
        </div>
        <div class="project_panel">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="left_panel">
                           <div class="navbar navbar-default affix-top" data-spy="affix" data-offset-top="383">
                                <div class="container-fluid paddingnone">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                                            <span class="icon-bar top-bar"></span>
                                            <span class="icon-bar middle-bar"></span>
                                            <span class="icon-bar bottom-bar"></span>
                                        </button>
                                    </div>
                                    <div id="navbar" class="navbar-collapse collapse" aria-expanded="true">
                                        <ul id="nav" class="nav navbar-nav">                             
                                            <li class="active"><a href="#gallery">Gallery</a></li>
                                            <li><a href="#location">location</a></li>
                                            <li><a href="#amenities">amenities</a></li>
                                            <li><a href="#homeloan_offers">HomeLoan Offers</a></li>
                                            <li><a href="#payment_plan">Payment Plan</a></li>
                                            <li><a href="#recommendations">Recommendations</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pp_slide_wrap" id="gallery">    
                                <div class="owl-carousel pp_slider">

                                    <?php // for ($i=0; $i < count($records['images']); $i++) { ?>
                                    <div class="item">
                                        <div class="row">
                                             <div class="col-md-8 col-sm-12 col-xs-12">
                                                <ul class="pp_img_list lightgallery">
                                                    <li data-responsive="<?php echo base_url().'assets/uploads/images/'.$records['images'][0]['path']?>" data-src="<?php echo base_url().'assets/uploads/images/'.$records['images'][0]['path']?>">
                                                        <a href="#"><img height="454px" src="<?php echo base_url().'assets/uploads/images/'.$records['images'][0]['path']?>" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <ul class="pp_img_list lightgallery">
                                                    <li data-responsive="<?php echo base_url().'assets/uploads/images/'.$records['images'][1]['path']?>" data-src="<?php echo base_url().'assets/uploads/images/'.$records['images'][1]['path']?>">
                                                        <a href="#"><img height="222px;" src="<?php echo base_url().'assets/uploads/images/'.$records['images'][1]['path']?>" alt=""></a>
                                                    </li>
                                                    <li data-responsive="<?php echo base_url().'assets/uploads/images/'.$records['images'][2]['path']?>" data-src="<?php echo base_url().'assets/uploads/images/'.$records['images'][2]['path']?>">
                                                        
                                                        <a href="#"><img height="222px;" src="<?php echo base_url().'assets/uploads/images/'.$records['images'][2]['path']?>" alt=""></a>
                
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                   <?php // } ?>
                                </div>
                                <div class="row">
                                    
                                    
                                </div>
                            </div>
                            <div class="project_abt_builder">
                                
                                <div class="abt_bulider">
                                    <h4>ABout the Builders</h4>
                                    <div class="block">
                                        <div class="img_block" style="border: 1px solid #CCC;">
                                            <img src="<?php echo base_url().'assets/uploads/images/'.$records['project_details'][0]['img_path'];?> " alt="">
                                        </div>
                                        <h5> <?php echo $records['project_details'][0]['developername']; ?> </h5>
                                        <ul>
                                            <li>Established in - 2007</li>
                                            <li>Total No. of Projects - 2007</li>
                                        </ul>
                                        <p><?php echo $records['project_details'][0]['devdescription']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="project_location" id="location">
                                <h3>Locality Information</h3>
                                <div class="map_block">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15556.83647807625!2d80.2024403!3d12.8942707!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcf2170e5fc99750f!2sRadiance+Mercury!5e0!3m2!1sen!2sin!4v1513858596231" height="370" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <!-- <div id="map" style="width:100%;height:50%"> -->
                                </div>
                                <div class="pl_form">
                                    <p>Save a date for your visit! If you’re interested in taking a look around, please provide us with the following details. </p>
                                    <form>
                                        <ul class="row">
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="name">
                                                    <span>
                                                        <img src="<?= base_url() ?>images/user-icon.png" alt="">
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Phone">
                                                    <span>
                                                        <img src="<?= base_url() ?>images/mobile-icon.png" alt="">
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="E-mail">
                                                    <span>
                                                        <img src="<?= base_url() ?>images/mail-icon.png" alt="">
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Date">
                                                    <span>
                                                        <img src="<?= base_url() ?>images/cal-icon.png" alt="">
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <button class="btn">
                                                    Book Site Visit
                                                    <img src="<?= base_url() ?>images/car-icon.png" alt="">
                                                </button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="project_amenities" id="amenities">
                                <h3>Amenities</h3>
                                <p>Access to all amenities that give you the perfect lifestyle...</p>
                                <ul>

                                    <?php 

                                    $facilities = $records['facilities'];

                                    for ($f=0; $f <count($records['facilities']) ; $f++) { ?>

                                    <li>
                                        <span>
                                        <img width="25px" height="25px" src="<?php echo base_url().'assets/uploads/images/'.$facilities[$f]['img_url'];?>" alt=""> 
                                        <!-- <img src="<?= base_url() ?>images/amenities-icon1.png" alt=""> -->
                                        </span>
                                        <?php echo $facilities[$f]['facilities_name']?>
                                    </li>
                                      
                                   <?php } ?>
                                    
                                    <!-- <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon2.png" alt="">
                                        </span>
                                        Indoor Restaurants
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon3.png" alt="">
                                        </span>
                                        Wi-fi Enabled Community
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon4.png" alt="">
                                        </span>
                                        State of the Art Fitness Center
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon5.png" alt="">
                                        </span>
                                        Gazebos
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon6.png" alt="">
                                        </span>
                                        Vaastu Compliant Homes
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon7.png" alt="">
                                        </span>
                                        Indoor Swimming Pool
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon8.png" alt="">
                                        </span>
                                        Pharmacy
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon9.png" alt="">
                                        </span>
                                        Uninterrupted Water Supply
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon10.png" alt="">
                                        </span>
                                        Tennis Courts
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon11.png" alt="">
                                        </span>
                                        Baby Day Care Center
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon12.png" alt="">
                                        </span>
                                        24 Hours Security
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon13.png" alt="">
                                        </span>
                                        Basketball Courts
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon14.png" alt="">
                                        </span>
                                        Meditation Hall
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon15.png" alt="">
                                        </span>
                                        Solar Power
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon16.png" alt="">
                                        </span>
                                        Indoor Badminton and TT
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon17.png" alt="">
                                        </span>
                                        Library
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon18.png" alt="">
                                        </span>
                                        Rain water harvesting
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon19.png" alt="">
                                        </span>
                                        Billiards and Pool
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon20.png" alt="">
                                        </span>
                                        Children’s Play Area
                                    </li>
                                    <li>
                                        <span>
                                            <img src="<?= base_url() ?>images/amenities-icon21.png" alt="">
                                        </span>
                                        Video Surveillance with Intercom
                                    </li> -->
                                </ul>
                            </div>
                            <div class="floor_plan">
                                <h3>Floor Plans & Sitemap</h3>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#one-bhk" data-toggle="tab">1 BHK</a></li>
                                    <li><a href="#two-bhk" data-toggle="tab">2 BHK</a></li>
                                    <li><a href="#sitemap" data-toggle="tab">Sitemap</a></li>
                                </ul>
                                                              
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="one-bhk">
                                        <div class="fps_cont">
                                            <div class="full-width">
                                                <div class="float-left">
                                                    <p>1 BHK Independent Floor <br>Possession: Apr, 2015 <br>Super Builtup Area : 450 sqft.</p>
                                                </div>
                                                <div class="float-right">
                                                    <p>
                                                        Base Price: <i class="fa fa-rupee"></i>19.0 Lacs <br>EMI starts at 11.8 K
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="lightgallery text-center">
                                                <div class="fps_img" data-responsive="<?= base_url() ?>images/floor-map.jpg" data-src="<?= base_url() ?>images/floor-map.jpg">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>images/floor-map.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="two-bhk">
                                        <div class="fps_cont">
                                            <div class="full-width">
                                                <div class="float-left">
                                                    <p>1 BHK Independent Floor <br>Possession: Apr, 2015 <br>Super Builtup Area : 450 sqft.</p>
                                                </div>
                                                <div class="float-right">
                                                    <p>
                                                        Base Price: <i class="fa fa-rupee"></i>19.0 Lacs <br>EMI starts at 11.8 K
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="lightgallery text-center">
                                                <div class="fps_img" data-responsive="<?= base_url() ?>images/floor-map.jpg" data-src="<?= base_url() ?>images/floor-map.jpg">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>images/floor-map.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sitemap">
                                        <div class="fps_cont">
                                            <div class="full-width">
                                                <div class="float-left">
                                                    <p>1 BHK Independent Floor <br>Possession: Apr, 2015 <br>Super Builtup Area : 450 sqft.</p>
                                                </div>
                                                <div class="float-right">
                                                    <p>
                                                        Base Price: <i class="fa fa-rupee"></i>19.0 Lacs <br>EMI starts at 11.8 K
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="lightgallery text-center">
                                                <div class="fps_img" data-responsive="<?= base_url() ?>images/floor-map.jpg" data-src="<?= base_url() ?>images/floor-map.jpg">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>images/floor-map.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bank_offer">
                                <h3>Radiance Mercury Bank Offers</h3>
                                <div class="owl-carousel bank_slider">
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank1.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank2.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank3.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank4.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank5.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank6.jpg" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?= base_url() ?>images/bank1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="project_calculater" id="homeloan_offers">
                                <h3>Home Loan & EMI calculator</h3>
                                <div class="pc_left">
                                    <form class="row">
                                        <div class="col-sm-7 col-xs-12 form-group">
                                            <label>Select Unit</label>
                                            <div class="styled_select">
                                                <select class="form-control">
                                                    <option selected>2BHK+ 2T (599 Sq.Ft.)</option>
                                                    <option>2BHK+ 2T (599 Sq.Ft.)</option>
                                                    <option>2BHK+ 2T (599 Sq.Ft.)</option>
                                                    <option>2BHK+ 2T (599 Sq.Ft.)</option>
                                                    <option>2BHK+ 2T (599 Sq.Ft.)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-xs-12 form-group">
                                            <label>Loan Tenure</label>
                                            <div class="styled_select">
                                                <select class="form-control">
                                                    <option selected>15 Years</option>
                                                    <option>15 Years</option>
                                                    <option>15 Years</option>
                                                    <option>15 Years</option>
                                                    <option>15 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-xs-12 form-group">
                                            <label>Loan Amount</label>
                                        </div>
                                        <div class="col-sm-5 col-xs-12 form-group">
                                            <input type="text" class="form-control" value="5000,000">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input id="rang-amt" type="text" ticks-snap-bounds="30">
                                        </div>
                                        <div class="col-sm-7 col-xs-12">
                                            <label>Interest Rate (P.A)</label>
                                        </div>
                                        <div class="col-sm-5 col-xs-12">
                                            <input type="text" class="form-control" value="9">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <input id="int-rate" type="text" ticks-snap-bounds="30">
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <label class="emi_lbl"><span>EMI -</span> <i class="fa fa-rupee"></i> 1.0 Lakh</label>
                                            <input type="submit" class="btn" value="Apply Now">
                                        </div>
                                    </form>
                                </div>
                                <div class="pc_right">
                                    <div class="progress-bar-circle" data-percent="25" data-duration="1000" data-color="#4d617c,#d14c4c">
                                        <span class="progerss_data">
                                            <img src="<?= base_url() ?>images/cal-icon2.png" alt="">
                                        </span>
                                    </div>
                                    <ul>
                                        <li>Principal: <i class="fa fa-rupee"></i>50.0 L</li>
                                        <li>Interest: <i class="fa fa-rupee"></i>12.3 L</li>
                                        <li>Total Amount Payable: <i class="fa fa-rupee"></i>62.3 L</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment_plan" id="payment_plan">
                                <div class="heading_pay">
                                    <h3>Payment Plan</h3>   
                                </div>
                                <ul>
                                    <li>
                                        <span class="percent">10%</span>
                                        <span class="circle"></span>
                                        <p>On Booking</p>
                                    </li>
                                    <li>
                                        <span class="percent">20%</span>
                                        <span class="circle"></span>
                                        <p>Within 30 days from Booking</p>
                                    </li>
                                    <li>
                                        <span class="percent">10%</span>
                                        <span class="circle"></span>
                                        <p>Completion of Basement</p>
                                    </li>
                                    <li>
                                        <span class="percent">10%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 1<sup>st</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">8%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 4<sup>th</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">8%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 8<sup>th</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">8%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 12<sup>th</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">8%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 16<sup>th</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">8%</span>
                                        <span class="circle"></span>
                                        <p>Completion of 18<sup>th</sup> Floor Roof</p>
                                    </li>
                                    <li>
                                        <span class="percent">5%</span>
                                        <span class="circle"></span>
                                        <p>Completion of Flooring</p>
                                    </li>
                                    <li>
                                        <span class="percent">5%</span>
                                        <span class="circle"></span>
                                        <p>On Handing Over</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="project_recommendation" id="recommendations">
                                <h3>Recommendations</h3>
                                <div class="owl-carousel recommendation_slider">
                                    <div class="item">
                                        <div class="img_block">
                                            <img src="<?= base_url() ?>images/rec-img1.jpg" alt="">
                                        </div>
                                        <div class="cont">
                                            <h5>ATS Greens Le Grandiose Corvous India Infratech Pvt. Lt</h5>
                                            <p>3, 4 BHK Apartments <br>Sector 150, Chennai</p>
                                            <h4><i class="fa fa-rupee"></i>77.19 Lacs</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="img_block">
                                            <img src="<?= base_url() ?>images/rec-img1.jpg" alt="">
                                        </div>
                                        <div class="cont">
                                            <h5>ATS Greens Le Grandiose Corvous India Infratech Pvt. Lt</h5>
                                            <p>3, 4 BHK Apartments <br>Sector 150, Chennai</p>
                                            <h4><i class="fa fa-rupee"></i>77.19 Lacs</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="img_block">
                                            <img src="<?= base_url() ?>images/rec-img2.jpg" alt="">
                                        </div>
                                        <div class="cont">
                                            <h5>ATS Greens Le Grandiose Corvous India Infratech Pvt. Lt</h5>
                                            <p>3, 4 BHK Apartments <br>Sector 150, Chennai</p>
                                            <h4><i class="fa fa-rupee"></i>77.19 Lacs</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="img_block">
                                            <img src="<?= base_url() ?>images/rec-img3.jpg" alt="">
                                        </div>
                                        <div class="cont">
                                            <h5>ATS Greens Le Grandiose Corvous India Infratech Pvt. Lt</h5>
                                            <p>3, 4 BHK Apartments <br>Sector 150, Chennai</p>
                                            <h4><i class="fa fa-rupee"></i>77.19 Lacs</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="let_cont">
                                <p>To our understanding, ensuring efficiency and transparency in the real estate sector is the primary objective of the Real Estate (Regulation and Development) Act, 2016. We also intend to promote the same, to the extent we can, by providing a platform to display all relevant information which is publicly available in an organized format relating to a particular property at a single place, however, at all times do keep in mind that the information that has been provided on mypropertyboutique 'the Website', including property listings, project details, location, floor, area, maps, layout etc. have been displayed for reference purposes only and cannot replace the primary source i.e. an independent verification by buyer/ agent. Any investment decisions that you take should not be based relying solely on the data that is available on the Website. Please remember it is your money which is at stake, therefore, it is advisable that any decisions that are taken to invest in any real estate are taken after researching the bonafides of the person/entity selling the same to you including title of such property.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="right_panel">
                            <h3><img src="<?= base_url() ?>images/phone-icon.png" alt="">request call back</h3>
                            <div class="enq_form">
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email ID">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone Number +91">
                                    </div>
                                    <div class="form-group">
                                        <p>I would like to know more about <a href="#" class="btn">3BHK</a></p>
                                    </div>
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="test1" />
                                            <label for="test1">Allow other sellers to get in touch</label>
                                        </li>
                                        <li>I’m interesded in Home Loans</li>
                                    </ul>
                                    <div class="form-group">
                                        <input type="submit" class="btn" value="SUBMIT">
                                    </div>
                                    <p>By clicking you agree <a href="#">Terms & Conditions</a></p>
                                </form>
                            </div>
                            <div class="mpb_exp">
                                <h4>MyProperty Boutique Experience</h4>
                                <ul>
                                    <li>
                                        <img src="<?= base_url() ?>images/exp-icon1.png" alt="">
                                        Trust our 300+ professional property consultants to help you take the right decision.
                                    </li>
                                    <li>
                                        <img src="<?= base_url() ?>images/exp-icon2.png" alt="">
                                        End to End Services. From Search to Possession. Multiple Stages, One companion.
                                    </li>
                                    <li>
                                        <img src="<?= base_url() ?>images/exp-icon3.png" alt="">
                                        10,000+ properties shortlisted after rigorous checks of over 2 lakh properties.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a class="project_filter_btn">
                            request call back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

      

      


        <script>


        function initMap() {alert("ok");}

    //$(document).ready(function(){
        var latitude = 12.874872395572394;
        var longitude = 80.10787099599838;
        var projectName = <?php echo $records['project_details'][0]['name'] ?>;
        var address = "-";
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADZQWDfKiyUvSsgpWn-E22JTqtj5qFEPo&callback=myMap" async defer></script>
   <?php $this->load->view('home/innerfooter');?>
  <script type="text/javascript">
 $('.right_panel').affix({
        offset: {     
        top: $('.right_panel').offset().top - 90,
        bottom: ($('footer').outerHeight(true)) + 30
        }
    });
  </script>