<div class="heading">
        <h2><span>find the</span>Right home</h2>
</div>
<p>Discover the most personalized option for yourself by browsing through<br /> our wide array of Real Estate Properties. </p>
<!-- <form name="search_form" id="search_form" action="<?php echo base_url() ?>search" method="post"> -->
<form name="search_form" id="search_form" action="<?php echo base_url() ?>search" method="post">
<div class="input-group">
    
        <div class="input-group-btn search-panel">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                <span id="search_concept">Chennai</span> 
                <!-- <span class="fa fa-angle-down"></span> -->
            </button>
        </div>
        <input type="hidden" name="search_param" value="all" id="search_param">         
        <input type="text" class="form-control ui-autocomplete-input" id="mysearchinput" name="search_box" placeholder="Search term...">
        <span class="input-group-btn">
        <button class="btn btn_search" id="searchsubmit" type="submit">

           

        <!--<i class="fa fa-search"></i>-->
        <img src="images/search-icon.png" alt="">
        </button>
        <button class="btn" id="srchMapBtn" type="button">
        <img src="images/map-icon.png" alt="">
        </button>
        </span>
    
</div></form>
