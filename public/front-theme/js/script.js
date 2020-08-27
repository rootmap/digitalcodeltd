(function($) { 

	"use strict";
	
	/* ================ Dynamic content height. ================ */
	var winH = $(window).height(),
		headH = $('#headWrapper').outerHeight(),
		footH = $('#footWrapper').outerHeight(),
		H = winH -(headH + footH);
	$('#contentWrapper').css('min-height',H);
	$(".loader-in").append('<div class="status"><span class="spin"></span><span></span></div>');

	/* ================ NiceScroll ============ */
    $('body').niceScroll({
        cursorborderradius: '0px', // Scroll cursor radius
        background: 'transparent',     // The scrollbar rail color
        cursorwidth: '0px',       // Scroll cursor width
        cursorcolor: 'transparent',     // Scroll cursor color
        horizrailenabled: false,
        cursorborder: '0px transparent none'
      });
	/* ================ Check for Mobile. ================ */
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	$('html').addClass('touch');
	}else{
		$('html').addClass('no-touch');
	}
		
	/* ================ Show Login box. ================ */
	$('.login-btn').prepend('<b class="tri hidden"></b>');
	$('.login-btn').click(function(e){
		e.preventDefault();
		$('.login-box').slideToggle();
		$('.login-btn').find('.tri').toggleClass('visible');
		$('.close-login').click(function(e){
			e.preventDefault();
			$('.login-box').slideUp();
			$('.login-btn').find('.tri').removeClass('visible');
		});
	});
	
	/* ================ NewsLetter Hide Box ============ */
	$('.Notfication .close-box').click(function(){
	      $('.Notfication').fadeOut(500);
	      return false;
	});

	/* ================ Responsive Navigation menu ============ */
	if($('.top-nav').length > 0){
	if (!$('body').hasClass('one-page')){
		var men = $('.top-nav > ul').html();	
		$('<a href="#" class="menuBtn"><i class="fa fa-bars"></i></a> <span class="mbtext">MENU</span><div class="responsive-nav"></div>').prependTo('body');
		// $('<a href="#" class="menuBtn"><i class="fa fa-bars"></i></a><div class="responsive-nav"></div>').prependTo('body');
		$('.responsive-nav').html('<h3>Menu Navigation</h3><ul>'+men+'</ul>');
		if($('html').css('direction') == 'rtl'){
			$('.responsive-nav h3').text('');
		}
		$('.menuBtn').click(function(e){
			e.preventDefault();
			$('.responsive-nav').toggleClass('res-act');
			$('.menuBtn').toggleClass('menuBtn-selected');
			$('.pageWrapper').click(function(){
				$(this).removeClass('colBody');
				$('.responsive-nav').removeClass('res-act');
				$('.menuBtn').removeClass('menuBtn-selected');
			});
		});
	}else{
		var menOne = $('.top-nav > ul').html();
		$('<div class="responsive-one"></div>').prependTo('body');
		$('.responsive-one').html('<a href="#" class="menuBtnOne"><i class="fa fa-bars"></i></a><ul>'+menOne+'</ul>');
		$('.menuBtnOne').click(function(e){
			e.preventDefault();
			$(this).toggleClass('menuBtnOneTogg');
			$('.responsive-one ul').toggleClass('showOne');
		});
		$('.responsive-one ul').onePageNav();
	}
	
	var men = $('.responsive-nav ul'),
		menItems = men.find('li');
	menItems.each(function(){
		var uls = $(this).find('> ul'),
			divs = $(this).find('.div-mega');
		if (uls.length){
			$(this).prepend('<span class="collapse"></span>');
			$(this).find('> span.collapse').click(function(){
				uls.slideToggle(500);
				$(this).parent().toggleClass('current');
			});
		}
		if (divs.length){
			$(this).prepend('<span class="collapse"></span>');
			$(this).find('> span.collapse').click(function(){
				divs.slideToggle(500);
				$('.responsive-nav .div-mega').removeClass('selected');
				$(this).addClass('selected');
			});
		}
	});
	
	/* ================ Top navigation menu. ================ */
		
	var menu = $('.top-nav > ul'),
		menuW = menu.width(),
		items = menu.find('li'),
		sel = menu.find('li.selected').index(),
		ulW,winW,menOff,m,totalOff;
	items.each(function(){
		var ul = $(this).find('ul:first');
		ul.css('max-width',menuW);
		if($(this).hasClass('selected')){
			$(this).addClass('current');
		}
		if (ul.length){
			$(this).addClass('hasChildren');
			var delay = 0;
			$(this).find('> ul > li').each(function(){
				$(this).css({transitionDelay: delay+'ms'});
				delay += 50;
			});
			$(this).hover(function(){
				$(this).addClass('selected');
			},function(){
				$(this).removeClass('selected');
			});
			if ($(this).find('ul li ul').length){
				var thisUL = $(this).find('ul ul');
					ulW = thisUL.outerWidth(),
					winW = $(window).width(),
					menOff= thisUL.offset(),
					m = menOff.left,
					totalOff = winW - m;
				if (totalOff < ulW){
					thisUL.css({left:'auto',right:'100%'});
				}
			}
		}
	});
 	
 	if($('.mega-menu').length > 0){
		var mainW = $('.top-head .container').width(),
			lft = $('.top-head .container').offset().left+15;
		$('.top-nav > ul > li').each(function(){
			var itemOff = $(this).offset().left /2,
				thisOff = $(this).offset().left,
				newOff = thisOff - lft,
				thisW	=  $(this).outerWidth(),
				offT	= itemOff - mainW,
				len		= $(this).find('.div-mega-section').length;
			$(this).find('.div-mega').css({width:mainW+'px',left:-newOff+'px',padding:'25px 0'});
			if(len == '2'){
				$(this).find('.div-mega-section').css('width','46%');
			}else if(len == '3'){
				$(this).find('.div-mega-section').css('width','29%');
			}else if(len >= '4'){
				$(this).find('.div-mega-section').css('width','21%');
			}
		});
		/*$('.top-nav > ul > li').hover(function(){
			$(this).find('.div-mega').stop(true, true).fadeIn('slow');
		},function(){
			$(this).find('.div-mega').stop(true, true).delay(0).fadeOut('slow');
		});*/
	}
	
	}
	
	/* ================ Sticky nav. ================ */
	
	if($('.top-head, .top-bar').attr('data-sticky') == "true"){
		$(window).on("scroll",function(){
			var Scrl = $(window).scrollTop();
			if (Scrl > 1) {
				$('.top-head').addClass('sticky');
				$('.top-bar').addClass('stickyTop');

				$('.mini-category-list').addClass('no_top_border_mobile');
				$('.btn-cart-info-desktop').addClass('hide_mobile');
				$('.order_info_des').addClass('hide_mobile');
				$('.cat_content').addClass('hide_mobile');
			}else{
				$('.top-head').removeClass('sticky');
				$('.top-bar').removeClass('stickyTop');

				$('.mini-category-list').removeClass('no_top_border_mobile');
				$('.btn-cart-info-desktop').removeClass('hide_mobile');
				$('.order_info_des').removeClass('hide_mobile');
				$('.cat_content').removeClass('hide_mobile');
			}
		});
		$('document').ready(function(){
			var Scrl = $(window).scrollTop();
			if (Scrl > 1) {
				$('.top-head').addClass('sticky');
				$('.top-bar').addClass('stickyTop');

				$('.mini-category-list').addClass('no_top_border_mobile');
				$('.btn-cart-info-desktop').addClass('hide_mobile');
				$('.order_info_des').addClass('hide_mobile');
				$('.cat_content').addClass('hide_mobile');
			}else{
				$('.top-head').removeClass('sticky');
				$('.top-bar').removeClass('stickyTop');

				$('.mini-category-list').removeClass('no_top_border_mobile');
				$('.btn-cart-info-desktop').removeClass('hide_mobile');
				$('.order_info_des').removeClass('hide_mobile');
				$('.cat_content').removeClass('hide_mobile');
			}
		});
	}

	
	
	/* ================ Show Hide Search box. ================ */
	$('.top-search a').click(function(){
		if($(this).parent().find('.search-box').is(':visible')){
			$('.search-box').fadeOut(300);
			$(this).parent().removeClass('selected');
			return false;
		}else{
			$('.search-box').fadeIn(300);
			$(this).parent().addClass('selected');
			return false;
		}
	});
	$(document).mouseup(function(e){
		if($('.search-box').is(':visible')){
			var targ = $(".search-box");
			if (!targ.is(e.target) && targ.has(e.target).length === 0){
			$('.search-box').fadeOut(300);
			$('.top-search').removeClass('selected');
			}
		}
	});
	
	/* ================ Back to top button. ================ */
	var winScroll = $(window).scrollTop();
	if (winScroll > 1) {
		$('#to-top').css({bottom:"10px"});
	} else {
		$('#to-top').css({bottom:"-100px"});
	}
	$(window).on("scroll",function(){
		winScroll = $(window).scrollTop();
		
		// PARALLAX background Animation.
		var y = parseInt($('.parallax').css('background-position-y'));
		var newY = -(winScroll * 0.05) + 'px';
		$('.parallax').css("background-position-y",newY);

		
		//  Show Hide back to top button.
		if (winScroll > 1) {
			$('#to-top').css({opacity:1,bottom:"10px"});
		} else {
			$('#to-top').css({opacity:0,bottom:"-100px"});
		}
	});
	$('#to-top').click(function(){
		$('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	
	/* ================ Revolution Slider. ================ */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight: 510,
	        startwidth: 1008,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on',
	        hideTimerBar:'on'
		});
	}
	if($('.tp-banner-full').length > 0){
		$('.tp-banner-full').show().revolution({
			delay:6000,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullScreen: 'on',
	        hideTimerBar:'on'
		});
	}
		
	/* ================ Waypoints: on scroll down animations. ================ */
	
	$('.touch .fx').addClass('animated');
	
	$('.no-touch .fx').waypoint(function() {
		var anim = $(this).attr('data-animate'),
			del = $(this).attr('data-animation-delay');
		    $(this).addClass('animated '+anim).css({animationDelay: del + 'ms'});
	},{offset: '90%',triggerOnce: true});
	
	
	/* ================ Level Numbers increment Animation. ================ */
	$('.no-touch .level-out').waypoint(function() {
		$('.level-out').each(function(){
			var num = $(this).find('.level-in').attr('data-percent'),
				percent = $.animateNumber.numberStepFactories.append(' %');
			$(this).find('span').animateNumber({number: num,numberStep: percent},num*20);
			$(this).find('.level-in').css('left',-num+'%').css('width',num+'%');
			$(this).find('.level-in').animate({'left':'0%'},num*20);
		});
	},{offset: '90%',triggerOnce: true});
	
	$('.touch .level-out').each(function(){
		var num = $(this).find('.level-in').attr('data-percent'),
			percent = $.animateNumber.numberStepFactories.append(' %');
		$(this).find('span').animateNumber({number: num,numberStep: percent},num*20);
		$(this).find('.level-in').css('left',-num+'%').css('width',num+'%');
		$(this).find('.level-in').animate({'left':'0%'},num*20);
	});
	
	$('.no-touch .levels-2').waypoint(function() {
		$('.chart').easyPieChart({
			size: 140,
			scaleLength: 0,
			lineWidth: 3,
			barColor:'#888',
			trackColor:'#e4e4e4',
			animate:({ duration: 2000, enabled: true }),
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
	},{offset: '90%',triggerOnce: true});
	
	/*$('.touch .chart').easyPieChart({
		size: 140,
		scaleLength: 0,
		lineWidth: 3,
		barColor:'#888',
		trackColor:'#e4e4e4',
		animate:({ duration: 2000, enabled: true }),
		onStep: function(from, to, percent) {
			$(this.el).find('.percent').text(Math.round(percent));
		}
	});*/
	
	/* ================ FUN STAFF Numbers increment Animation. ================ */
	$('.touch .fun-number').each(function(){
		var thisNo = $(this).text();
		$(this).animateNumber({number: thisNo},4000);
	});

    $('.no-touch .staff-1,.no-touch .staff-2,.no-touch .staff-3').waypoint(function() {
	    $(this).find('.fun-number').each(function(){
			var thisNo = $(this).text();
			$(this).animateNumber({number: thisNo},4000);
		});
	},{offset: '90%',triggerOnce: true});
		
	/* ================ testimonials carousel. ================ */
	if($('.testimonials-1').length)
	{
		$('.testimonials-1').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 2,
			touchMove: true,
			slidesToScroll: 1,
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});
	}

	if($('.testimonials-2').length)
	{
		$('.testimonials-2').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			touchMove: true,
			slidesToScroll: 1
		});
	}

	if($('.clients').length)
	{
	
		$('.clients').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 5,
			touchMove: true,
			slidesToScroll: 5,
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

	}

	if($('.auto-clients').length)
	{
	
		$('.auto-clients').slick({
			dots: true,
			autoplay:true,
			arrows:false,
			infinite: true,
			speed: 300,
			slidesToShow: 5,
			touchMove: true,
			slidesToScroll: 5,
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

	}

	if($('.homeGallery').length)
	{

		$('.homeGallery').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			touchMove: true,
			slidesToScroll: 1,
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});
	}

	if($('.portfolioGallery').length)
	{

		$('.portfolioGallery').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 4,
			touchMove: true,
			slidesToScroll: 1,
			responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

	}
	
	if($('.twitter-carousel').length)
	{
		$('.twitter-carousel').slick({
			dots: false,
			infinite: true,
			arrows:false,
			speed: 300,
			autoplay:true,
			slidesToShow: 1,
			touchMove: true,
			vertical:true,
			slidesToScroll: 1
		});

	}
	
	if($('.portfolio-img-slick').length)
	{
	
		$('.portfolio-img-slick').slick({
			dots: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			touchMove: false,
			slidesToScroll: 1,
			autoplay:true
		});

	}

	if($('.Newsslider').length)
	{
		$('.Newsslider').slick({
		    dots: false,
		    infinite: true,
		    speed: 300,
		    slidesToShow: 1,
		    touchMove: false,
		    slidesToScroll: 1,
		    autoplay: true,
		    pauseOnHover : true
		});
	}
	/* ================ PORTFOLIO boxes Hover effect. ================ */
	$('.slick-slide,.portfolio-items > div').each(function(){
		var $this = $(this),
			$index = $this.index(),
			contents = $this.find('.img-over');
		$this.hover(function(){
			contents.fadeIn(400).find('.link').removeClass('animated fadeOutUp').addClass('animated fadeInDown');
			contents.find('.zoom').removeClass('animated fadeOutDown').addClass('animated fadeInUp');
			return false;
		},function(){
			contents.fadeOut(400).find('.link').removeClass('animated fadeInDown').addClass('animated fadeOutUp');
			contents.find('.zoom').removeClass('animated fadeInUp').addClass('animated fadeOutDown');
			return false;
		});
	});
	
	/* ================ Portfolio Filterable. ================ */
	// init Isotope
	if($('#container').length){
		var $container = $('#container').isotope({
			layoutMode: 'fitRows'
		});
		
		$container.imagesLoaded( function() {
			$container.isotope();
		});
		
		// filter items on button click
		$('#filters').on( 'click', 'a.filter', function(e) {
			e.preventDefault();
			var filterValue = $(this).attr('data-filter');
			$container.isotope({ filter: filterValue });
			
			// Set selected class to the active filter.
			var $this = $(this);
			if ( $this.parent().hasClass('active') ) {
			  return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSet.find('.active').removeClass('active');
			$this.parent().addClass('active');
		  
		});
	}
	

	
	/* ================ Information boxes. ================ */
	$('.box').each(function(){
		$(this).find('a.close-box').click(function(e){
			var parentBox = $(this).parent();
			e.preventDefault();
			parentBox.fadeOut('slow', function(){ parentBox.remove(); });
		});
	});

	
	/* ================ Tabs. ================ */
	$.fn.tabs = function(options) {
		var defaults = {
			direction: ''
		};
		var options = $.extend({}, defaults, options);
		if(options.direction == "vertical"){
			$(this).addClass('tabs-vertical');
		}
		var tabsUl = $(this).find(' > ul'),
			activeTab = tabsUl.find('li.active').index(),
			tabsPane = $(this).find('.tabs-pane');
		tabsPane.find('.tab-panel').fadeOut();
		tabsPane.find('.tab-panel').eq(activeTab).fadeIn();
		tabsUl.find('li').find('a').click(function(e){
			if(!$(this).parent().hasClass('active')){
				e.preventDefault();
				var ind = $(this).parent().index();
				tabsUl.find('li').removeClass('active');
				$(this).parent().addClass('active');
				tabsPane.find('.tab-panel').fadeOut(0).removeClass('active');
				tabsPane.find('.tab-panel').eq(ind).fadeIn(350).addClass('active');
				return false;
			}else{
				return false;
			}
		});
	}
	
	/* ================ Accordions. ================ */
	$.fn.accordion = function(options) {
		var defaults = {
			direction: 'vertical'
		};
		var options = $.extend({}, defaults, options),
			accItem = $(this).find('li'),
			activeItem = accItem.eq(0),
			accLink	= accItem.find('h3'),
			accPane= accItem.find('.accordion-panel');
		$(activeItem).addClass('active');
		if(options.direction == "vertical"){
			accPane.slideUp();
			accPane.eq(0).slideDown();
			accLink.prepend('<u/>');
		}else if(options.direction == "horizontal"){
			$(this).addClass('accordion-horizontal');
		}
		accItem.find('h3').click(function(e){
			if(!$(this).parent().hasClass('active')){
				e.preventDefault();
				accItem.removeClass('active');
				$(this).parent().addClass('active');
				if(options.direction == "vertical"){
					accPane.slideUp(350);
					$(this).next().slideDown(350);
				}else{
					accItem.animate({width: "40px"}, {duration:350, queue:false});
			        $(this).parent().animate({width: "80%"}, {duration:350, queue:false});
				}
			}else{
				if(options.direction == "vertical"){
					e.preventDefault();
					accItem.removeClass('active');
					if(options.direction == "vertical"){
						accPane.slideUp(350);
					}
				}
				return false;
			}
		});
	}
	
	/* ================ Tooltips. ================ */
	$.fn.tooltip = function() {
		$(this).hover(function(){
			var thisTitle = $(this).attr('data-title'),
				pos = $(this).attr('data-position'),
				tp = $(this).offset().top - $(window).scrollTop(),
				l = $(this).offset().left - $(window).scrollLeft();
				
			$('body').append('<div class="tooltip">'+thisTitle+'</div>');
			var tipH = $('.tooltip').outerHeight()+5,
				tipW = $('.tooltip').outerWidth()+5,
				bot = $(window).height() - (tp + $(this).outerHeight() + tipH),
				r = $(window).width()-(l + $(this).outerWidth() + tipW);
			if(pos == "right"){
				$('.tooltip').addClass('rit-tip animated fadeInRight').css({'top':tp-(($(this).outerHeight()/2)-(tipH-5/2))+"px",'right':r+"px"});
			}else if(pos == "bottom"){
				$('.tooltip').addClass('bot-tip animated fadeInUp').css({'bottom':bot + "px",'left':l+(($(this).outerWidth()/2)-((tipW-5)/2)) + "px"});
			}else if(pos == "left"){
				$('.tooltip').addClass('lft-tip animated fadeInLeft').css({'top':tp-(($(this).outerHeight()/2)-(tipH-5/2)) + "px",'left':l-tipW + "px"});
			}else{
				$('.tooltip').addClass('animated fadeInDown').css({'top':tp-tipH + "px",'left':l+(($(this).outerWidth()/2)-((tipW-5)/2)) + "px"});
			}
		},function(){
			$('.tooltip').remove();
		});
	}
	
	// make height equals parent height.
	var planH = $('.our-plan').height();
	$('.plan-title').css('height',planH);
	
	
	/* ================= Grid - List view =============== */
	$('.list-btn').click(function() {
		$('.grid-list').addClass('list');
		$('.grid-btn').removeClass('selected');
		$(this).addClass('selected');
		return false;
	});
	$('.grid-btn').click(function() {
		$('.grid-list').removeClass('list');
		$('.list-btn').removeClass('selected');
		$(this).addClass('selected');
		return false;
	});
	
	/* ================= Product images zoom =============== */
	if($("#img_01").length){
		$("#img_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', responsive:true, loadingIcon: 'images/ajax-loader.gif'});
		$('.thumbs ul li:first a').addClass('active');
	}
	
	/* ================= increase decrease items textbox =============== */
	var num = $('#items-num').val();
	$('.add-items i.fa-plus').click(function(e){
		e.preventDefault();
		num ++;
		$('#items-num').attr('value',num);
	});
	$('.add-items i.fa-minus').click(function(e){
		e.preventDefault();
		if (num > 1){
			num --;
			$('#items-num').attr('value',num);
		}
	});
	
	/* ================= Remove items from cart =============== */
	$('.remove-item').click(function(){
		$(this).parent().parent().remove();
	});
	
	/* ================= top shopping cart box =============== */
	$('.cart-heading').click(function(){
		$(this).parent().find('.cart-popup').show();
	});
	$('.cart-icon').mouseleave(function(){
		$(this).find('.cart-popup').hide();
	});



	

	if($('.cart-icon').length > 0){
		$('.add-cart').each(function(){
			$(this).click(function(){
				var num = $('#cart-count b').text();
				num ++;
				if($('.mini_shopping-cart-quantity').length)
				{
					$('.mini_shopping-cart-quantity').html(num);
				}
				//swal('Thank You','Your selected item is added successfully.','success');
				$('#cart-count b').text(num);
				$('.cart-popup .mini-cart').show();
				$('.cart-popup .empty').hide();
				//$('html, body').animate({scrollTop: '0px'}, 1000);
				//$('.success-box.hidden').fadeIn().delay(2000).fadeOut();
				/*$('html, body').animate({
			        scrollTop: $('.cart-data-logo').offset().top - 100 //#DIV_ID is an example. Use the id of your destination on the page
			    }, 'slow');*/
				var itemImg = $(this).parent().children("div").find('img').eq(0);
			    var isMobile = false; //initiate as false
                // device detection
                if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
                    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

                console.log(isMobile);
                if(isMobile==false)
                {
			        flyToElement($(itemImg), $('.cart-data-logo'));
		    	}
		    	else
		    	{
		    		flyToElement($(itemImg), $('.cart-heading'));
		    	}
			});
		});
		
		if($('#cart-count b').text() == "0"){
			$('.cart-popup .empty').show();
			$('.cart-popup .mini-cart').hide();
		}else{
			$('.cart-popup .mini-cart').show();
			$('.cart-popup .empty').hide();
		}
	}
	
	
	$('#tabs').tabs();
	$('#tabs2').tabs();
	$('#tabs3').tabs({direction: 'vertical'});
	$('#tabs4').tabs({direction: 'vertical'});
	$('#accordion').accordion();
	$('#accordion2').accordion();
	if($('a.zoom').length)
	{
		$('a.zoom').prettyPhoto({social_tools: false});
	}
	
	$("[data-tooltip^='true']").tooltip();
	$('input, textarea').placeholder();
	
	
	/* ================ fullscreen sticky nav. ================ */
	if($('#wrap').length > 0){
		$(window).scroll(function(){
			var scrollHeight = $(document).scrollTop(),
				tp = $('#headWrapper').offset();
			if($(this).scrollTop() > tp.top ){
				$('.top-head').addClass('sticky');
			}else{
				$('.top-head').removeClass('sticky');
			}
		});
	}
	if($('#vertical-ticker').length > 0){
		$('#vertical-ticker').totemticker({
			row_height	:	'110px',
			mousestop	:	true,
			speed:500
		});
	}
	
	/* ================ one page functions. ================ */
	$(".scroll").click(function(e) {
		e.preventDefault();
		$("html, body").animate({scrollTop: $($(this).attr("href")).offset().top - 100 + "px"}, {duration: 800});
		return false;
	});
	
	if($('#nav').length){
		$('#nav').onePageNav();
	}
	/* ================ one page functions. ================ */
	if($(".digits").length > 0){
		$('.digits').countdown('2020/10/10').on('update.countdown', function(event) {
		  var $this = $(this).html(event.strftime('<ul>'
		     + '<li><span>%-w</span><p> week%!w </p> </li>'
		     + '<li><span>%-d</span><p> day%!d </p></li>'
		     + '<li><span>%H</span><p>Hours </p></li>'
		     + '<li><span>%M</span><p> Minutes </p></li>'
		     + '<li><span>%S</span><p> Seconds </p></li>'
		     +'</ul>'));
		 });
    }
    $('document').ready(function(){
    	if($(".player").length > 0){
    		$(".player").mb_YTPlayer();
    	}
    });
    
    if ($('.flexslider').length > 0){
    	$('.flexslider').flexslider();
    }
    
    /* ================ one page functions. ================ */
	if ($('#flickrFeed').length > 0){    
	    $('#flickrFeed').jflickrfeed({
			limit: 8,
			qstrings: {
				id: '37304598@N02'
			},
			itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /><span class="img-overlay"></span></a></li>'
		});
	}
	
	if ($('#flickrFeed-inner').length > 0){    
	    $('#flickrFeed-inner').jflickrfeed({
			limit: 9,
			qstrings: {
				id: '37304598@N02'
			},
			itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /><span class="img-overlay"></span></a></li>'
		});
	}
	
	/******** version 2 functions *************/
	
	// nicescroll for the side header
	$('.left-side-header,.right-side-header').niceScroll({
		cursorborderradius: '5px',
		background: '#fff',
		cursorwidth: '8px',
		cursorcolor: '#B9B9B9',
		horizrailenabled: false
	});
	
	if($('.side-nav').length > 0){
		var side_menu = $('.side-nav > ul'),
			menuW = side_menu.width(),
			items = side_menu.find('li'),
			sel = side_menu.find('li.selected').index(),
			ulW,winW,menOff,m,totalOff;
		side_menu.find('ul').addClass('main-bg');
		items.each(function(){
			var ul = $(this).find('ul:first'),
				mega = $(this).find('.div-mega');
			if($(this).hasClass('selected')){
				$(this).addClass('current');
			}
			if (ul.length){
				$(this).addClass('hasChildren');
				$(this).hover(function(){
					$(this).find('> ul').stop(true, true).delay(500).slideDown(500);
					$(this).addClass('selected');
				},function(){
					$(this).find('> ul').stop(true, true).delay(300).slideUp(300);
					$(this).removeClass('selected');
				});
			}
			if (mega.length){
				$(this).addClass('hasChildren');
				$(this).hover(function(){
					$(this).find('> .div-mega').stop(true, true).delay(500).slideDown(500);
					$(this).addClass('selected');
				},function(){
					$(this).find('> .div-mega').stop(true, true).delay(300).slideUp(300);
					$(this).removeClass('selected');
				});
			}
		});
		if (!$('body').hasClass('one-page')){
			var men = $('.side-nav > ul').html();
			$('<a href="#" class="menuBtn"><i class="fa fa-bars"></i></a><div class="responsive-nav"></div>').prependTo('body');
			$('.responsive-nav').html('<h3>Menu Navigation</h3><ul>'+men+'</ul>').find('ul').removeAttr('class');;
			if($('html').css('direction') == 'rtl'){
				$('.responsive-nav h3').text('');
			}
			$('.menuBtn').click(function(e){
				e.preventDefault();
				$('.responsive-nav').toggleClass('res-act');
				$('.menuBtn').toggleClass('menuBtn-selected');
				$('.pageWrapper').click(function(){
					$(this).removeClass('colBody');
					$('.responsive-nav').removeClass('res-act');
					$('.menuBtn').removeClass('menuBtn-selected');
				});
			});
		}else{
			var menOne = $('.side-nav > ul').html();
			$('<div class="responsive-one"></div>').prependTo('body');
			$('.responsive-one').html('<a href="#" class="menuBtnOne"><i class="fa fa-bars"></i></a><ul>'+menOne+'</ul>');
			$('.menuBtnOne').click(function(e){
				e.preventDefault();
				$(this).toggleClass('menuBtnOneTogg');
				$('.responsive-one ul').toggleClass('showOne');
			});
			$('.responsive-one ul').onePageNav();
		}
		var men = $('.responsive-nav ul'),
		menItems = men.find('li');
		menItems.each(function(){
			var uls = $(this).find('> ul'),
				divs = $(this).find('.div-mega');
			if (uls.length){
				$(this).prepend('<span class="collapse"></span>');
				$(this).find('> span.collapse').click(function(){
					uls.slideToggle(500);
					$(this).parent().toggleClass('current');
				});
			}
			if (divs.length){
				$(this).prepend('<span class="collapse"></span>');
				$(this).find('> span.collapse').click(function(){
					divs.slideToggle(500);
					$(this).parent().toggleClass('current');
				});
			}
		});
	}
	
	/****** menu effects ***********/ /* new in version 2 */
	if($('.top-nav').length > 0){
		$('.top-nav').find('> ul').attr('id','mnu-eft');
		if($('#mnu-eft').attr('class') == undefined){
			$('#mnu-eft').addClass('def-effect');
			$('.top-nav > ul > li').hover(function(){
				$(this).find('.div-mega').stop(true, true).delay(100).fadeIn();
			},function(){
				$(this).find('.div-mega').stop(true, true).delay(100).fadeOut();
			});
		}
		
		$('#mnu-eft.slide li').each(function(){
			$(this).hover(function(){
				$(this).find('> ul').stop(true, true).delay(200).slideDown();
				$(this).find('.div-mega').stop(true, true).delay(100).slideDown();
			},function(){
				$(this).find('> ul').stop(true, true).delay(100).slideUp();
				$(this).find('.div-mega').stop(true, true).delay(100).slideUp();
			});
		});
		
		$('#mnu-eft.fade li').each(function(){
			$(this).hover(function(){
				$(this).find('> ul').stop(true, true).delay(100).fadeIn();
				$(this).find('.div-mega').stop(true, true).delay(100).fadeIn();
			},function(){
				$(this).find('> ul').stop(true, true).delay(100).fadeOut();
				$(this).find('.div-mega').stop(true, true).delay(100).fadeOut();
			});
		});
		
		var mnu_eft = $('#mnu-eft').not('.def-effect,.slide,.fade').attr('class');
		$('.'+mnu_eft).find('li').each(function(){
			$(this).hover(function(){
				$(this).find('> ul').stop(true, true).show(0).addClass('animated '+mnu_eft);
				$(this).find('.div-mega').stop(true, true).show(0).addClass('animated '+mnu_eft);
			},function(){
				$(this).find('> ul').stop(true, true).hide(0).removeClass('animated '+mnu_eft);
				$(this).find('.div-mega').stop(true, true).hide(0).removeClass('animated '+mnu_eft);
			});
		});
	}
	/****** end menu effects ***********/
	
	// Gallery Plugin.
    
    if($('#gallery').length){
	
		//$('div.navigation').css({'width' : '300px', 'float' : 'left'});
		$('div.content').css('display', 'block');
	
		// Initially set opacity on thumbs and add
		// additional styling for hover effect on thumbs
		var onMouseOutOpacity = 0.67;
		$('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
		});
		
		// Initialize Advanced Galleriffic Gallery
		var gallery = $('#thumbs').galleriffic({
			delay:                     2500,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            true,
			enableBottomPager:         true,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play Slideshow',
			pauseLinkText:             'Pause Slideshow',
			prevLinkText:              '&lsaquo; Previous Photo',
			nextLinkText:              'Next Photo &rsaquo;',
			nextPageLinkText:          'Next &rsaquo;',
			prevPageLinkText:          '&lsaquo; Prev',
			enableHistory:             false,
			autoStart:                 false,
			syncTransitions:           true,
			defaultTransitionDuration: 900,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			}
		});
    }


    
	$(window).load(function() {			
		/* ================ Preloader. ================ */
		$(".page-loader").fadeOut();
		$(".loader-in").delay(350).fadeOut("slow");
		$('body').delay(350).removeAttr("style");		
	});

})(jQuery);

function flyToElement(flyer, flyingTo) {
	var $func = $(this);
	var divider = 3;
	var flyerClone = $(flyer).clone();
	$(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
	$('body').append($(flyerClone));
	var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
	var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;
	 
	$(flyerClone).animate({
		opacity: 0.4,
		left: gotoX,
		top: gotoY,
		width: $(flyer).width(),
		height: $(flyer).height()
	}, 700,
	function () {
		$(flyingTo).fadeOut('fast', function () {
			$(flyingTo).fadeIn('fast', function () {
				$(flyerClone).fadeOut('fast', function () {
					$(flyerClone).remove();
				});
			});
		});
	});
}