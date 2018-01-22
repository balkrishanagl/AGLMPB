$(document).ready(function() {
    $('.t1,.t3').hide();
    $(".left-img").click(function() {
        // Set the effect type
      $('.t2').hide();
       $('.t3').hide();
      $('.t1').fadeIn();
      $(".left-img").addClass('image-slide-img-active');
      $(".right-img").removeClass('image-slide-img-active');
      $(".cen-img").removeClass('image-slide-img-active');
        return false;
    });
    
      $(".cen-img").click(function() {
        // Set the effect type
      $('.t1').hide();
       $('.t3').hide();
      $('.t2').fadeIn();
      $(".left-img").removeClass('image-slide-img-active');
      $(".right-img").removeClass('image-slide-img-active');
      $(".cen-img").addClass('image-slide-img-active');
        return false;
    });

        $(".right-img").click(function() {
        // Set the effect type
      $('.t2').hide();
      $('.t1').hide();
      $('.t3').fadeIn();
      $(".left-img").removeClass('image-slide-img-active');
      $(".right-img").addClass('image-slide-img-active');
      $(".cen-img").removeClass('image-slide-img-active');
        return false;
    });


    $('a#mob-nav').click(function(){
        $('nav').slideToggle('fast');
        return false;
    });


   $('a.filter-a').click(function(){
      $(".trails-listing-view-one").addClass('filter-hide');
     $(".trails-listing-view-one[data-filter='"+$(this).attr('data-filter')+"']").removeClass("filter-hide"); 
     
     $('a.filter-a').removeClass('active');
     $(this).addClass('active');
      return false;

   });
 $('a[data-filter="*"]').click(function(event) {
   $(".trails-listing-view-one").removeClass('filter-hide');
   return false;
});
$('#book').css({'display':'block'});
$('#pay').css({'display':'none'});
 $('a#book1').click(function(){
  $('#book').fadeIn('normal');
  $('a#book1').addClass('active');
  $('a#pay1').removeClass('active');
  $('#pay').hide();
  return false;
 });

 $('a#pay1').click(function(){
  $('#book').hide();
  $('#pay').fadeIn('normal');
    $('a#book1').removeClass('active');
  $('a#pay1').addClass('active');
  return false;
 });

$('#open-modal-view').click(function(){
  $('.modal-box-container').fadeIn('fast');
  $('body').addClass('modal-open');
  return false;
});

$('#close-modal-view ,.modal-overlay').click(function(){
  $('.modal-box-container').fadeOut('fast');
  $('body').removeClass('modal-open');
  return false;
});


$(this).find('.faq-row-one a.faq-open-a').click(function(){
  
  if ($(this).find(".fa").hasClass('fa-plus-circle')) {
       $(this).parent().parent().find('.fa').addClass('fa-minus-circle');
       $(this).parent().parent().find('.fa').removeClass('fa-plus-circle');       
  }
  else{
     $(this).parent().parent().find('.fa').removeClass('fa-minus-circle');
       $(this).parent().parent().find('.fa').addClass('fa-plus-circle');
  } 
$(this).parent().parent().find('p').slideToggle('fast');
return false;
});

});
