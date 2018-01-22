$(document).ready(function() {
	// alert("Am here");

	"use strict";
	 $('.lightgallery').lightGallery();
	
	/*FUll Page SCRIPT*/
	if ((screen.width>980)){
			
		$('#fullpage').fullpage({
			anchors: ['section-1', 'section-2', 'section-3', 'section-4', 'section-5', 'section-6'],
			sectionsColor: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'],
			navigation: false,
			navigationPosition: 'left',
			autoScrolling: true,
			css3:false,
			scrollingSpeed: 1000,
			fixedElements: '#moveDown, #moveUp',
			onLeave: function(index, nextIndex){
        		//leaving 1st section
        		if(index == 1){
           			$('header').addClass('fixed');
        		}
        		//back to the 1st section
        		if(nextIndex == 1){
            		$('header').removeClass('fixed');
        		}
				
    		},
			
		});
	}
	
	else if ((screen.width<=980))  {
		$('#fullpage').fullpage({
			autoScrolling: false,
			navigation: false,
			scrollingSpeed: false,
			responsive: 500,
			
			afterRender: function () {
            	setInterval(function () {
                	$.fn.fullpage.moveSlideRight();
            	}, 10000);
        	},
			
			onLeave: function(index, nextIndex){
        		//leaving 1st section
        		if(index == 1){
           			$('header').addClass('fixed');
        		}
        		//back to the 1st section
        		if(nextIndex == 1){
            		$('header').removeClass('fixed');
        		}
    		}
		});
	}
	
	//Showcase SLider
	$('.tp_slider').owlCarousel({
    	margin:0,
    	responsiveClass:true,
		autoplay:true,
    	autoplayTimeout:7000,
		smartSpeed: 1000,
		nav:false,
		dots:true,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	480:{
            	items:1
        	},
			768:{
            	items:1
        	},
        	1000:{
            	items:1
        	}
    	}
	});
	//END Showcase SLider
	
	//Showcase SLider
	$('.showcase_slider').owlCarousel({
    	margin:0,
    	responsiveClass:true,
		autoplay:true,
    	autoplayTimeout:5000,
		smartSpeed: 1000,
		nav:false,
		dots:true,
		loop:true,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	480:{
            	items:1
        	},
			768:{
            	items:1
        	},
        	1000:{
            	items:1
        	}
    	}
	});
	//END Showcase SLider
	
	//Project SLider
	$('.project_slider').owlCarousel({
    	margin:0,
    	responsiveClass:true,
		autoplay:false,
    	autoplayTimeout:3000,
		smartSpeed: 2000,
		nav:true,
		dots:false,
		navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
		loop:false,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	480:{
            	items:1
        	},
			768:{
            	items:1
        	},
        	1000:{
            	items:1
        	}
    	}
	});
	//END Project SLider
	//Project Page SLider
	$('.pp_slider').owlCarousel({
    	margin:0,
    	responsiveClass:true,
		autoplay:false,
    	autoplayTimeout:3000,
		smartSpeed: 2000,
		nav:true,
		dots:false,
		navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
		loop:false,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	480:{
            	items:1
        	},
			768:{
            	items:1
        	},
        	1000:{
            	items:1
        	}
    	}
	});
	//END Project Page SLider
	
	$('.bank_slider').owlCarousel({
    	margin:25,
    	responsiveClass:true,
		autoplay:false,
    	autoplayTimeout:3000,
		smartSpeed: 2000,
		nav:true,
		dots:false,
		navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
		loop:false,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:2
        	},
        	640:{
            	items:3
        	},
			768:{
            	items:5
        	},
        	1025:{
            	items:6
        	}
    	}
	});
	
	$('.recommendation_slider').owlCarousel({
    	margin:30,
    	responsiveClass:true,
		autoplay:false,
    	autoplayTimeout:3000,
		smartSpeed: 2000,
		nav:true,
		dots:false,
		navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
		loop:false,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	640:{
            	items:2
        	},
			768:{
            	items:2
        	},
        	1025:{
            	items:3
        	}
    	}
	});
	
	$('.search_slider').owlCarousel({
    	margin:10,
    	responsiveClass:true,
		autoplay:true,
    	autoplayTimeout:3000,
		smartSpeed: 2000,
		nav:true,
		dots:false,
		navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
		loop:false,
		lazyLoad:true,
    	autoplayHoverPause:false,
    	responsive:{
        	0:{
            	items:1
        	},
        	480:{
            	items:1
        	},
			768:{
            	items:2
        	},
        	1000:{
            	items:2
        	}
    	}
	});
	
	checkbhk();
	$(".s-bhk").click(function(){
	 checkbhk();
	});
	
	function checkbhk(){
	        var d = '';
		$(".s-bhk").each(function(){
		  if ($(this).is(":checked")){
		   var s = $(this).next('label').text();
		   if(d!=''){
		   	d = d+ ','+s;
		   } else {
		   	d = s;
		   }
		   
		  }
		});
		if(d!=""){
			$("#search_concept_three").text(d);
		} else {
			$("#search_concept_three").text("Choose BHK");
		}
		
	}
	

	/*$('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
	
	$('.search-panel-two .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel-two span#search_concept_two').text(concept);
		$('.input-group #search_param_two').val(param);
	});
	
	$('.search-panel-three .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel-three span#search_concept_three').text(concept);
		$('.input-group #search_param_three').val(param);
	});
	
	$('.search-panel-four .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel-four span#search_concept_four').text(concept);
		$('.input-group #search_param_four').val(param);
	});*/
	
	
	
	$(".progress-bar-circle").loading();
		$('input').on('click', function () {
			 $(".progress-bar-circle").loading();
		});
	
	/*$("#rang-amt").slider({
		ticks: [1000000, 2000000, 3000000, 4000000, 5000000, 6000000, 7000000, 8000000, 9000000, 10000000],
		ticks_labels: ['10 L', '20 L', '30 L', '40 L', '50 L', '60 L', '70 L', '80 L', '90 L', '100 L'],
		ticks_snap_bounds: 30,
		slide : function(e, ui) {
alert(ui.value + " " + unit);
}
	});*/
	$("#int-rate").slider({
		ticks: [7, 8, 9, 10, 11, 12, 13, 14, 15,16],
		ticks_labels: ['7%', '8%', '9%', '10%', '11%', '12%', '13%', '14%', '15%', '16%'],
		ticks_snap_bounds: 30
	});
	
	if ($("#rang-price").length){
	$("#rang-price").slider({
		ticks: [1000000, 2000000, 3000000, 4000000, 5000000, 6000000],
		ticks_labels: ['10 L', '20 L', '30 L', '40 L', '50 L', '60 L', '70 L', '80 L', '90 L', '100 L'],
		min: 0, 
		max: 10, 
		value: [0, 10], 
		//focus: true,
		ticks_snap_bounds: 30
		
	}).on('change', function(ev) {
	console.log(ev.value);
	var newv1 = ev.value.newValue;
	var start = newv1[0];
	var end  = newv1[1];
	console.log(start);
	console.log(end);
	$("#price-min").val(start);
	$("#price-max").val(end);
	
});
}
	
	/*$('.right_panel').affix({
    	offset: {     
      	top: $('.right_panel').offset().top - 90,
      	bottom: ($('footer').outerHeight(true)) + 30
    	}
	});*/

	//Function for Custome Scrollbar
$(".filter_one ul").mCustomScrollbar({
	setHeight:105,
	theme:"dark-3"
});
	
	
});//End of document.ready




// Function for Accordion
function toggleIcon(e) {
   "use strict";
	$(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('fa-angle-down fa-angle-up');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);

// add the animation to the modal
$(".modal").each(function (index) {
    $(this).on('show.bs.modal', function (e) {
        var open = $(this).attr('data-easein');
        if (open == 'shake') {
            $('.modal-dialog').velocity('callout.' + open);
        } else if (open == 'pulse') {
            $('.modal-dialog').velocity('callout.' + open);
        } else if (open == 'tada') {
            $('.modal-dialog').velocity('callout.' + open);
        } else if (open == 'flash') {
            $('.modal-dialog').velocity('callout.' + open);
        } else if (open == 'bounce') {
            $('.modal-dialog').velocity('callout.' + open);
        } else if (open == 'swing') {
            $('.modal-dialog').velocity('callout.' + open);
        } else {
            $('.modal-dialog').velocity('transition.' + open);
        }

    });
});