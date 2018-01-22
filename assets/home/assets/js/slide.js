 $(document).scroll(function(){
 $('#news-slide').cycle({
  next:   '#next',
  prev:   '#prev'
 });

  $('#award-mob-swipe').cycle({
  next:   '#next',
  prev:   '#prev'
 });
   $('#mobile-partners-swipe-ul').cycle({
  next:   '#next',
  prev:   '#prev'
 });
  
    });

 $(document).ready(function(){
 	$('a#prev').click(function(){
       return false;
 	});
 	$('a#next').click(function(){
       return false;
 	});

 $('#award-mob-swipe').cycle({
  next:   '#next',
  prev:   '#prev'
 });

 });