//  Bubble-Plugin

//

//	Define parameters
//
//		- width
//		- imageSetPrefix
//		- append, before or after
//		- top and left
//		- image path
//		- Message
//		- textAlign


	(function($){
		
		var defaultParams = {
				arrowLeft : 12, 			// value in pixels
				arrowWidth : 27, 			// value in pixels
				arrowRight : 12, 			// value in pixels
				width : "auto", 			// value in pixels or CSS value "auto"
				imagePath : "./",			// "./default/image/path/"
				bubbleLocation : "append", 	// append, before or after : 
				top : 0,					// value in pixels
				left : 0,					// value in pixels
				message : "bla",			// "content of message"
				textAlign : "left",			// CSS value
				imageSetPrefix : "bla",		// directory name for image
				whiteSpace : "normal",		// css value
				duration : "slow",			// "slow", "fast", or value in milliseconds
				motion : false				// true, false, or value in milliseconds
		};
		
		var methods = {
			
			// END test methods

			showBubble : function(bubbleId, shadowId, cssParams){
				
				duration = cssParams.duration;
				
				if (cssParams.motion == true){
					
					if($.browser.msie){
						$("#"+bubbleId).stop().fadeIn(duration, function(){
							$("#"+shadowId).css("display", "block");
						});
						$("#"+holderId).animate({marginTop:"10px"}, duration);
						
					}else{
						$("#"+bubbleId).stop().fadeIn(duration);
						$("#"+holderId).animate({marginTop:"10px"}, duration);
					}
					
				}else{					
					if($.browser.msie){
						$("#"+bubbleId).stop().fadeIn(duration, function(){
							$("#"+shadowId).css("display", "block");
						});
					}else{
						$("#"+bubbleId).stop().fadeIn(duration);
					}					
				}				
			},
			
			hideBubble : function(bubbleId, shadowId, cssParams, holderId){
				
				duration = cssParams.duration;
				
				if (cssParams.motion == true){
					
					if($.browser.msie){
						$("#"+shadowId).css("display", "none");
						$("#"+bubbleId).stop().fadeOut(duration, function(){
							$("#"+holderId).html("");
						});
						$("#"+holderId).animate({marginTop:"0px"}, duration);
						
					}else{
						$("#"+holderId).animate({marginTop:"0px"}, duration);	
						$("#"+bubbleId).stop().fadeOut(duration, function(){
							$("#"+holderId).html("");
						});
					}
					
				}else{
					if($.browser.msie){
						$("#"+shadowId).css("display", "none");
						$("#"+bubbleId).stop().fadeOut(duration, function(){
							$("#"+holderId).html("");
						});
					}else{
						$("#"+bubbleId).stop().fadeOut(duration, function(){
							$("#"+holderId).html("");
						});
					}					
				}

			},
			
			buildTemplate : function(fullPath, bubbleStyles, bubbleId){
				
				var bubbleTemplate = '';
				bubbleTemplate += '<table border="0" cellspacing="0" cellpadding="0" style="' + bubbleStyles + '" id="' + bubbleId + '">\n';
					bubbleTemplate += '\t<tr>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'top-left.png);background-repeat:no-repeat;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : ' + cssParams.spacerDimension + '"></td>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'top.png);background-repeat:repeat-x;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : ' + cssParams.spacerDimension + '"></td>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'top-right.png); background-position: top right; background-repeat:no-repeat;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : ' + cssParams.spacerDimension + '"></td>\n';
					bubbleTemplate += '\t</tr>\n';
					bubbleTemplate += '\t<tr>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'left.png);background-repeat:repeat-y;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : ' + cssParams.spacerDimension + '"></td>\n';
						bubbleTemplate += '\t\t<td style="text-align:' + cssParams.textAlign +'; white-space:' + cssParams.whiteSpace + '; background-image:url(' + fullPath + 'message-holder.png);">' + bubbleParameters.message + '</td>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'right.png); background-position: top right; background-repeat:repeat-y;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : ' + cssParams.spacerDimension + '"></td>\n';
					bubbleTemplate += '\t</tr>\n';
					bubbleTemplate += '\t<tr>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'bottom-left.png);background-repeat:no-repeat;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : 19px"></td>\n';
						bubbleTemplate += '\t\t<td>\n';
				    	bubbleTemplate += '\t\t\t<table border="0" cellspacing="0" cellpadding="0" width="100%">\n';
				    		bubbleTemplate += '\t\t\t\t<tr>\n';
				    			bubbleTemplate += '\t\t\t\t\t<td style="background-image:url(' + fullPath + 'bottom.png); background-repeat:repeat-x; width:' + cssParams.arrowLeft + ';"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.arrowLeft + '; height : 19px"></td>\n';
				    			bubbleTemplate += '\t\t\t\t\t<td style="background-image:url(' + fullPath + 'arrow.png); background-repeat:no-repeat; width:' + cssParams.arrowWidth + ';"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.arrowWidth + '; height : 19px"></td>\n';
				    			bubbleTemplate += '\t\t\t\t\t<td style="background-image:url(' + fullPath + 'bottom.png); background-repeat:repeat-x;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.arrowRight + '; height : 19px"></td>\n';
				    		bubbleTemplate += '\t\t\t\t</tr>\n';
				    	bubbleTemplate += '\t\t\t</table>\n';
						bubbleTemplate += '\t\t</td>\n';
						bubbleTemplate += '\t\t<td style="background-image:url(' + fullPath + 'bottom-right.png); background-position: top right; background-repeat:no-repeat;"><img src="' + fullPath + 'dot.gif" style="width : ' + cssParams.spacerDimension + '; height : 19px"></td>\n';
					bubbleTemplate += '\t</tr>\n';
				bubbleTemplate += '</table>\n';
				
				return bubbleTemplate;
			
			},
			
			getCSSValues : function(){
				
				cssParams = {};
				
				/// START WIDTHS
				// widths			
				if(typeof bubbleParameters.arrowLeft !== "undefined"){
					cssParams.arrowLeft = (parseInt(bubbleParameters.arrowLeft)).toString() + "px";
				}else{
					cssParams.arrowLeft = (parseInt(defaultParams.arrowLeft)).toString() + "px";
				}
				
				if(typeof bubbleParameters.arrowWidth !== "undefined"){
					cssParams.arrowWidth = (parseInt(bubbleParameters.arrowWidth)).toString() + "px";
				}else{
					cssParams.arrowWidth = (parseInt(defaultParams.arrowWidth)).toString() + "px";
				}
				
				if(typeof bubbleParameters.arrowRight !== "undefined"){
					cssParams.arrowRight = (parseInt(bubbleParameters.arrowRight)).toString() + "px";
				}else{
					cssParams.arrowRight = (parseInt(defaultParams.arrowRight)).toString() + "px";
				}
				
				// spacerDimension and bubbleTable
				if(typeof bubbleParameters.width === "undefined" || bubbleParameters.width === "auto"){
					cssParams.bubbleTable = defaultParams.width;
				}else{
					if($.browser.msie){
						cssParams.bubbleTable = (parseInt(bubbleParameters.width) - 8 ).toString() + "px";
					}else{
						cssParams.bubbleTable = (parseInt(bubbleParameters.width)).toString() + "px";
					}
				}
				
				if($.browser.msie){
					cssParams.spacerDimension = "6px";
				}else{
					cssParams.spacerDimension = "10px";
				}
				
				/// END WIDTHS
				
				// text-align
				if(typeof bubbleParameters.textAlign !== "undefined"){
					cssParams.textAlign = bubbleParameters.textAlign;
				}else{
					cssParams.textAlign = defaultParams.textAlign;
				}
				
				// white-space
				if(typeof bubbleParameters.whiteSpace !== "undefined"){
					cssParams.whiteSpace = bubbleParameters.whiteSpace;
				}else{
					cssParams.whiteSpace = defaultParams.whiteSpace;
				}
				
				// bubbleLocation
				if(typeof bubbleParameters.bubbleLocation !== "undefined"){
					cssParams.bubbleLocation = bubbleParameters.bubbleLocation;
				}else{
					cssParams.bubbleLocation = defaultParams.bubbleLocation;
				}
				
				// message
				if(typeof bubbleParameters.message !== "undefined"){
					cssParams.message = bubbleParameters.message;
				}else{
					cssParams.message = defaultParams.message;
				}
				
				// duration
				if(typeof bubbleParameters.duration !== "undefined"){
					if(bubbleParameters.duration !== "slow" && bubbleParameters.duration !== "fast"){
						cssParams.duration = parseInt(bubbleParameters.duration);
					}else{
						cssParams.duration = bubbleParameters.duration.toString();
					}
					
				}else{
					cssParams.duration = defaultParams.duration;
				}
				
				// motion
				if(typeof bubbleParameters.motion !== "undefined"){
					cssParams.motion = bubbleParameters.motion;
				}else{
					cssParams.motion = defaultParams.motion;
				}
				
				return cssParams;
				
			},
			
			getImagePath : function(){
				if(typeof bubbleParameters.imagePath !== "undefined"){
					imagePath = bubbleParameters.imagePath;
				}else{
					imagePath = defaultParams.imagePath;
				}
				return imagePath;
			},
			
			getPrefix : function(){
				if(typeof bubbleParameters.imageSetPrefix !== "undefined"){
					if($.browser.msie){
						prefix = bubbleParameters.imageSetPrefix+'/IE/';
					}else{
						prefix = bubbleParameters.imageSetPrefix+'/';
					}
				}else{
					if($.browser.msie){
						prefix = defaultParams.imageSetPrefix+'/IE/';
					}else{
						prefix = defaultParams.imageSetPrefix+'/';
					}
				}
				
				return prefix;
			},
			
			getTableStyles : function(bubbleType){
				
				if(bubbleType === "Shadow"){
					
					// top
					if(typeof bubbleParameters.top !== "undefined"){
						cssParams.top = (parseInt(bubbleParameters.top) + 4).toString() + "px";
					}else{
						cssParams.top = (parseInt(bubbleParameters.top) + 4).toString() + "px";
					}
					
					// left
					if(typeof bubbleParameters.top !== "undefined"){
						cssParams.left = (parseInt(bubbleParameters.left) - 4).toString() + "px";
					}else{
						cssParams.left = (parseInt(bubbleParameters.left) - 4).toString() + "px";
					}
					
					bubbleStyles = "display: none; width:" + cssParams.bubbleTable + "; bottom: " + cssParams.top + "; left: " + cssParams.left + "; position:absolute; z-index:999;filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4', MakeShadow='true', ShadowOpacity='0.35');";
					
				}else{
					
					// top
					if(typeof bubbleParameters.top !== "undefined"){
						cssParams.top = (bubbleParameters.top).toString() + "px";
					}else{
						cssParams.top = (defaultParams.top).toString() + "px";
					}
					
					// left
					if(typeof bubbleParameters.top !== "undefined"){
						cssParams.left = (bubbleParameters.left).toString() + "px";
					}else{
						cssParams.left = (defaultParams.left).toString() + "px";
					}
					
					bubbleStyles = 'display: none; width:' + cssParams.bubbleTable + ';  bottom: ' + cssParams.top + '; left: ' + cssParams.left + '; position:absolute; z-index:1000;';
					
				}
				return bubbleStyles;
			},
			
			buildBubbleHolder : function(element, holderId){
				
				if(typeof bubbleParameters.placement !== "undefined"){
					cssParams.placement = bubbleParameters.placement;
				}else{
					cssParams.placement = defaultParams.placement;
				}
				
				holderHTML = "<div style='position: relative; height:0px; width:auto;' id='" + holderId + "'></div>";
				
				switch(cssParams.placement){
					
				case "append": 
					element.append(holderHTML);
					break;
					
				case "before": 
					element.before(holderHTML);
					break;
					
				case "after": 
					element.after(holderHTML);
					break;
				
				}
				
				bla = "blah";
				
			}
			
		
		};
		
		
	
		$.fn.bubbleIt = function(showHideMethod, bubbleParameters){
			
			return this.each(function(){
				
				var $this = $(this);
				
				holderId = ($(this).attr("id")) + ("-bubbleHolder");
				
				bubbleId = ($(this).attr("id")) + ("-bubbleTable");
				
				shadowId = ($(this).attr("id")) + ("-shadowTable");
				
				CSSValues = methods.getCSSValues();
				
				if(showHideMethod === "show"){
					
					if(typeof  $("#"+bubbleId).attr("id") === "undefined"){
						
						imgPath = methods.getImagePath();
						
						// START Top bubble
						prefix = methods.getPrefix();
						
						fullPath = imgPath + prefix;
						
						bubbleStyles = methods.getTableStyles("Other - not shadow style");
						
						methods.buildBubbleHolder($(this), holderId);
						
						topBubbleHtml = methods.buildTemplate(fullPath, bubbleStyles, bubbleId);
						
						$("#"+holderId).append(topBubbleHtml);
						
						// START Shadow bubble
						if($.browser.msie){
							fullPath = imgPath + "Shadow/";
							
							bubbleStyles = methods.getTableStyles("Shadow");
							
							shadowHtml = methods.buildTemplate(fullPath, bubbleStyles, shadowId);
							
							$("#"+holderId).append(shadowHtml);
							
							// Show bubble for IE browsers
							methods.showBubble(bubbleId, shadowId, cssParams);
							
						}else{
							
							// Show bubble for nonIE browsers
							methods.showBubble(bubbleId, "", cssParams);
						
						}
						
						// END Shadow bubble
					
					}else{
						// alert (bubbleId+" already exists");
					}
					
					// END Top bubble
					
				}else if(showHideMethod === "hide"){
					if($.browser.msie){
						// Hide  bubble for IE browsers
						methods.hideBubble(bubbleId, shadowId, cssParams, holderId);
					}else{
						// Hide bubble for nonIE browsers
						methods.hideBubble(bubbleId, "", cssParams, holderId);
					}
				}
				
			});
			
		};
		
	})(jQuery);
	
	