<?php 

if(count($listings) > 0){

    for ($i=0; $i < count($listings); $i++) { ?>
        
                            <div class="search_block">
                                <div class="img_block">
                                    <?php if($listings[$i]['img_path']!=''){ ?>
                                        <img width="300px" height="215px" src="<?php echo base_url().'assets/uploads/images/'.$listings[$i]['img_path']?>" alt="<?php echo $listings[$i]['img_path'];?>">
                                    <?php } else { ?>
                                        <img style="width: 250px;margin-top: -10px;" src="<?php echo base_url().'images/no-image.png' ?>" alt="no-image">
                                    <?php }?>
                                    
                                </div>
                                <div class="inner">
                                    <div class="tag">
                                        <span>Recommended</span>
                                        <img src="<?= base_url() ?>images/tag-icon2.png" alt="">
                                    </div>
                                    <div class="block_one">
                                        <h3><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$listings[$i]['project_id'] ?>" ><?=$listings[$i]['projectName']?></a></h3>
                                        <p>By <?php echo $listings[$i]['developerName'];?></p>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i><?php echo ucfirst($listings[$i]['locName']).', '.ucfirst($listings[$i]['locCity']);?></li>
                                            <li><a href="<?=base_url()?>index.php/home/projectDetails?id=<?=$listings[$i]['project_id'] ?>" class="btnLink_2">View Map</a></li>
                                        </ul>
                                    </div>
                                    <ul class="block_two">
                                        <li>Size <span><?php echo $listings[$i]['size_min'].' - '. $listings[$i]['size_max']; ?> Sqft</span></li>
                                        <li>Configs <span><?php echo $listings[$i]['bhk'];?> BHK | <?php echo ucfirst($listings[$i]['category']);?></span></li>
                                        <li>Status <span>Ready to Move</span></li>
                                        <!-- <li>Sale Type <span>New booking</span></li> -->
                                        <li><i class="fa fa-rupee"></i><?php echo digitschange($listings[$i]['price_min']);?> - <?php echo digitschange($listings[$i]['price_max']);?> <span><i class="fa fa-rupee"></i> <?php echo $listings[$i]['sqft_price'];?> / Sq.ft</span></li>
                                    </ul>
                                    <div class="block_three">
                                        <p>Radiance Mercury presents High-Quality Flats in Perumbakkam, a Fast Developing Residential Hub. The project has 546 Flats for sale in Perumbakkam... <a href="#">More Details</a></p>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-heart-o" style="padding: 9px 0px;"></i></a></li>
                                            <li><a href="#">Contact Builder</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
<?php
    }
} else {

    echo "No records found";
}

function count_digit($number) {
  return strlen($number);
}

function divider($number_of_digits) {
    $tens="1";

  if($number_of_digits>8)
    return 10000000;

  while(($number_of_digits-1)>0)
  {
    $tens.="0";
    $number_of_digits--;
  }
  return $tens;
}

function digitschange($num){
//function call
$ext="";//thousand,lac, crore
$number_of_digits = count_digit($num); //this is call :)
    if($number_of_digits>3)
{
    if($number_of_digits%2!=0)
        $divider=divider($number_of_digits-1);
    else
        $divider=divider($number_of_digits);
}
else
    $divider=1;

$fraction=$num/$divider;
$fraction=number_format($fraction,2);
if($number_of_digits==4 ||$number_of_digits==5)
    $ext="k";
if($number_of_digits==6 ||$number_of_digits==7)
    $ext="L";
if($number_of_digits==8 ||$number_of_digits==9)
    $ext="Cr";
return $fraction." ".$ext;
}
?>