<!--banner-part-->
  

<form id="search_form" action="<?php echo base_url() ?>index.php/home/search" method="post">
  <div class="form-group ">
    <span class="banner-drop col-lg-2 col-md-2 col-sm-3 col-xs-12">
      <div class="dropdown">
        <select id="city_id" name="city_id" class="new-drop">

        </select>
      </div>
    </span>
    <span class="banner-type-search col-lg-8 col-md-8 col-sm-6 col-xs-12">
      <input type="text" id="mysearchinput" name="search_box" class="form-control" placeholder="Search" autocomplete="off"></span>
      <span class="banner-search-btn col-lg-2 col-md-2 col-sm-3 col-xs-12">
      <button type="submit" id="searchsubmit">Search</button>
    </span>
  </div>
</form>

<script>

var base_url = 'http://localhost/codeigniter/mpb/index.php/';

$(document).ready(function(){
   $.ajax({
                       url: base_url+'cityList',
                       method: 'GET',
                       success:function(msg)
                       {
                           msg = $.parseJSON(msg);
                           console.log(msg);
                           if(msg != null)
                           {
                            $.each(msg['cities'],function(index , value){
                                $('#city_id').append('<option value="'+value['cityId']+'">'+value['cityName']+'</option>')
                            });
                           }

                       }
               }); 


    
});
</script>

