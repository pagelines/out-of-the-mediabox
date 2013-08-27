jQuery(document).ready(function(){   					
		//  Transition Bottom
		jQuery(".bar-bottom").mouseenter(function() {
			var popOver = jQuery(this).find(".toggle");
			if (jQuery(popOver).is(":hidden")) {
				jQuery(popOver).slideDown(400);
				jQuery(this).find(".mosaic-backdrop").css("opacity", "0.6");
			}
		});
		
		jQuery(".bar-bottom").mouseleave(function() {
			var popOver = jQuery(this).find(".toggle");
			if (jQuery(popOver).is(":visible")) {
				jQuery(popOver).slideUp(400);
				jQuery(this).find(".mosaic-backdrop").css("opacity", "1.0");
			}
		});
		
		// Transition Top
		jQuery(".bar-top").mouseenter(function() {
			var popOver = jQuery(this).find(".toggle");
			if (jQuery(popOver).is(":hidden")) {
				jQuery(popOver).slideDown(400);
				jQuery(this).find(".mosaic-backdrop").css("opacity", "0.6");
			}
		});
		
		jQuery(".bar-top").mouseleave(function() {
			var popOver = jQuery(this).find(".toggle");
			if (jQuery(popOver).is(":visible")) {
				jQuery(popOver).slideUp(400);
				jQuery(this).find(".mosaic-backdrop").css("opacity", "1.0");
			}
		});
	});		  