(function( $ ){

	"use strict";
	
	var handheldBreakpoint = 1024;
		
	// *****************
	// dropdown menu
	// *****************
	if ( jQuery(window).width() <= handheldBreakpoint ){
		// mobile
		jQuery('#menu ul li:has(> ul) > a').on('click', function(event) {
			event.preventDefault();
			jQuery(this).closest('li').toggleClass('submenu-shown');
		});
	} 
	else {
		// desktop
		jQuery('#menu ul li:has(> ul)').on('mouseenter mouseleave', function() {
			var $this = jQuery(this);
			  
			if ( !$this.hasClass('submenu-shown') ) {			
				$this.addClass('submenu-shown');
			}
			else {
				setTimeout( function() {
					$this.removeClass('submenu-shown');
				});
			}
		});
	}
	
	// *****************
	// search icon
	// *****************
	jQuery('#searchbar').on('click', function(event) {
		event.preventDefault();
		if( jQuery(this).hasClass('searchbar-shown') ) {
			if( jQuery('#searchbar input').val() ){
		        	jQuery("#searchbar button").click();
		    	}
		    	else {
			    	jQuery(this).removeClass('searchbar-shown');
		    	}
		}
		else {
			jQuery(this).addClass('searchbar-shown').find('input').focus();
		}
	});

	// *****************
	// login modal
	// *****************
	jQuery('.button.login').on('click', function(event) {
		event.preventDefault();
		jQuery('body').toggleClass('login-shown');
	});
	jQuery('#login-popup .close').on('click', function(event) {
		event.preventDefault();
		jQuery('body').removeClass('login-shown');
	});
	
	// *****************
	// social buttons stay on top while scrolling
	// *****************
	var $social = jQuery('.entry-social');
	if ( $social.length > 0 && jQuery('#comments').length > 0 ) {
		jQuery('body').imagesLoaded( function() {
			var socialTopPos = $social.offset().top;
			var socialLeftPos = $social.offset().left;
			var socialHeight = $social.outerHeight(true);
			var commentsPos  = jQuery('#comments').offset().top;
						
			jQuery(window).on('scroll', function() {
				// is the element out of viewport?
				var scrollPos = jQuery(window).scrollTop();		
				if ( scrollPos > (socialTopPos - socialHeight) ){
					$social.addClass('fixed-position').css('left',socialLeftPos);
					commentsPos  = jQuery('#comments').offset().top;
					if ( scrollPos > commentsPos ) {
						$social.addClass('hide');
					}
					else {
						$social.removeClass('hide');
					}
				}
				else {
					$social.removeClass('hide').removeClass('fixed-position').css('left',0);
				}
			});
			
			// recalculate after window resize
			jQuery(window).resize(function() {
			    clearTimeout(window.resizedFinished);
			    window.resizedFinished = setTimeout(function(){
			        console.log('Resized finished.');
			        
			        // recalculate
				   socialTopPos = $social.offset().top;
				   socialLeftPos = $social.offset().left;
				   commentsPos  = jQuery('#comments').offset().top;
			    }, 250);
			});
			
		});
	}

	// *****************
	// smooth scroll internal links (comments)
	// *****************
	jQuery('a[href*="#"]:not([href="#"])').on('click', function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html, body').animate({
					scrollTop: target.offset().top
	        		}, 800);
		   		return false;
      		}
      	}
  	});
  	
  	// *****************
	// remove title on img hover
	// *****************
	jQuery('a,img').hover(function(e){
		jQuery(this).attr('data-title', jQuery(this).attr('title'));
		jQuery(this).removeAttr('title');
	},
	function(e){
        	jQuery(this).attr('title', jQuery(this).attr('data-title'));
    	});
    	
    	// *****************
	// wrap all imgs to lazy load in an interesting way
	// *****************
	if( jQuery().lazyLoadXT ) {
		jQuery('.entry-content p img, .entry-content figure img').wrap('<div class="lazyload-wrapper"></div>');
		jQuery('.entry-content p img, .entry-content figure img').on('lazyload', function (e) {
		     jQuery(this).closest('.lazyload-wrapper').addClass('loaded');
	    	});
    	}
    	
    	// *****************
    	// heart likes
    	// *****************
    	jQuery('.like-heart').on('click', function(event){
		event.preventDefault();
		
		var $heart = jQuery(this);
		
		// Retrieve post ID from data attribute
		var post_id = $heart.data("post_id");
		    
		// Ajax call
		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
			success: function(count){
				// If vote successful
				if (count != "already") {
					$heart.addClass('voted');
					$heart.find('.like-count').text(count);
				}
				else console.log('already voted');
			}
		});
		    
		return false;
    	});
    	
    	// *****************
    	// load more pagination
    	// *****************
    	jQuery(document).on('click', '#load-more a', function(event){
		event.preventDefault();
		var page = parseInt( jQuery('#load-more').attr('data-load_page') );
		var until = parseInt( jQuery('#load-more').attr('data-until') );
		jQuery('body').addClass('fetching');
		
		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: {
				action: 'ajax_pagination',
				template: ajax_var.template,
				page: page
			},
			success: function( html ) {
				// fetch individual excerpts
				var fetchedExcerpts = jQuery(jQuery.parseHTML(html)).filter('.excerpt');
				
				// append excerpts one by one
				jQuery.each( fetchedExcerpts, function( i, val ) {
					setTimeout( function() { 
						jQuery('.excerpts').append(val);
					}, i*100)
				});
				jQuery('body').removeClass('fetching');
				
				if ( page < until ) {
					// increment flag
					jQuery('#load-more').attr('data-load_page',parseInt( page + 1 ));
				} else 
				{
					// if nothing else to show, hide navigation
					jQuery('#load-more').remove();
				}
			}
		})
	
	});	
    
	// *****************
	// load screen
	// *****************
	jQuery('body').imagesLoaded( function() {
		jQuery('body').removeClass('loading');
	});
	jQuery('#logo a, #menu a, #content p a, #content h2 a, .post-pagination a, .widget a').on('click', function(event){
		if ( jQuery(this).attr('href')!="#" && jQuery(this).attr('href')!="" && jQuery(this).attr('target')!="_blank" ){
			setTimeout(function(){
				jQuery('body').addClass('loading unloading');
			});
		}
	});
			

} )( jQuery );
