// JavaScript Document

  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });
  
  
  
  jQuery(document).ready(function($){

	var MqL = 1170;

	$('.cd-search-trigger').on('click', function(event){
		event.preventDefault();
		toggleSearch();
		closeNav();
	});

	


	function toggleSearch(type) {
		if(type=="close") {
			//close serach 
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
		} else {
			//toggle search visibility
			$('.cd-search').toggleClass('is-visible');
			$('.cd-search-trigger').toggleClass('search-is-visible');
			$('.cd-overlay').toggleClass('search-is-visible');
			if($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
			($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible') ;
		}
	}

	function checkWindowWidth() {
		//check window width (scrollbar included)
		var e = window, 
            a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if ( e[ a+'Width' ] >= MqL ) {
			return true;
		} else {
			return false;
		}
	}

	
});




<!---------------------------zoom------------------------------->

;(function($){
	$.fn.zoom = function(options){
		// 默认配置
		var _option = {
			align: "left",				// 当前展示图片的位置，则放大的图片在其相对的位置
			thumb_image_width: 300,		// 当前展示图片的宽
			thumb_image_height: 400,	// 当前展示图片的高
			source_image_width: 900,  	// 放大图片的宽
			source_image_height: 1200,	// 放大图片的高
			zoom_area_width: 600, 		// 放大图片的展示区域的宽
			zoom_area_height: "justify",// 放大图片的展示区域的高
			zoom_area_distance: 10,     // 
			zoom_easing: true,          // 是否淡入淡出
			click_to_zoom: false,
			zoom_element: "auto",
			show_descriptions: true,
			description_location: "bottom",
			description_opacity: 0.7,
			small_thumbs: 3,			// 小图片展示的数量
			smallthumb_inactive_opacity: 0.4, 	// 小图片处于非激活状态时的遮罩透明度
			smallthumb_hide_single: true,    	// 
			smallthumb_select_on_hover: false,
			smallthumbs_position: "bottom",		// 小图片的位置
			show_icon: true,
			hide_cursor: false,			// 鼠标放到图片时，是否隐藏指针
			speed: 600,     			// 
			autoplay: true,				// 是否自动播放
			autoplay_interval: 6000, 	// 自动播放时每张图片的停留时间
			keyboard: true,
			right_to_left: false,
		}

		if(options){
			$.extend(_option, options);
		}

		var $ul = $(this);
		if($ul.is("ul") && $ul.children("li").length && $ul.find(".bzoom_big_image").length){

			$ul.addClass('bzoom clearfix').show();
			var $li = $ul.children("li").addClass("bzoom_thumb"),
				li_len = $li.length,
				autoplay = _option.autoplay;
			$li.first().addClass("bzoom_thumb_active").show();
			if(li_len<2){
				autoplay = false;
			}

			$ul.find(".bzoom_thumb_image").css({width:_option.thumb_image_width, height:_option.thumb_image_height}).show();

			var scalex = _option.thumb_image_width / _option.source_image_width,
				scaley = _option.thumb_image_height / _option.source_image_height,
				scxy = _option.thumb_image_width / _option.thumb_image_height;

			var $bzoom_magnifier, $bzoom_magnifier_img, $bzoom_zoom_area, $bzoom_zoom_img;

			// 遮罩显示的区域
			if(!$(".bzoom_magnifier").length){
				$bzoom_magnifier = $('<li class="bzoom_magnifier"><div class=""><img src="" /></div></li>');
                $bzoom_magnifier_img = $bzoom_magnifier.find('img');

                $ul.append($bzoom_magnifier);

                $bzoom_magnifier.css({top:top, left:left});
                $bzoom_magnifier_img.attr('src', $ul.find('.bzoom_thumb_active .bzoom_thumb_image').attr('src')).css({width: _option.thumb_image_width, height: _option.thumb_image_height});
                $bzoom_magnifier.find('div').css({width:_option.thumb_image_width*scalex, height:_option.thumb_image_height*scaley});
			}
			
			// 大图
			if(!$('.bzoom_zoom_area').length){
                $bzoom_zoom_area = $('<li class="bzoom_zoom_area"><div><img class="bzoom_zoom_img" /></div></li>');
                $bzoom_zoom_img = $bzoom_zoom_area.find('.bzoom_zoom_img');
                var top = 0,
                    left = 0;

                $ul.append($bzoom_zoom_area);

                if(_option.align=="left"){
                	top = 0;
                	left = 0 + _option.thumb_image_width + _option.zoom_area_distance;
                }

                $bzoom_zoom_area.css({top:top, left:left});
                $bzoom_zoom_img.css({width: _option.source_image_width, height: _option.source_image_height});
			}

			var autoPlay = {
				autotime : null,
				isplay : autoplay,

				start : function(){
					if(this.isplay && !this.autotime){
						this.autotime = setInterval(function(){
							var index = $ul.find('.bzoom_thumb_active').index();
							changeLi((index+1)%_option.small_thumbs);
						}, _option.autoplay_interval);
					}
				},

				stop : function(){
					clearInterval(this.autotime);
					this.autotime = null;
				},

				restart : function(){
					this.stop();
					this.start();
				}
			}

			// 循环小图
			var $small = '';
			if(!$(".bzoom_small_thumbs").length){
				var top = _option.thumb_image_height+10,
					width = _option.thumb_image_width,
					smwidth = (_option.thumb_image_width / _option.small_thumbs) - 10,
					smheight = smwidth / scxy,
					ulwidth = 
					smurl = '',
					html = '';

				for(var i=0; i<_option.small_thumbs; i++){
					smurl = $li.eq(i).find('.bzoom_thumb_image').attr("src");

					if(i==0){
						html += '<li class="bzoom_smallthumb_active"><img src="'+smurl+'" alt="small" style="width:'+smwidth+'px; height:'+smheight+'px;" /></li>';
					}else{
						html += '<li style="opacity:0.4;"><img src="'+smurl+'" alt="small" style="width:'+smwidth+'px; height:'+smheight+'px;" /></li>';
					}
				}

				$small = $('<li class="bzoom_small_thumbs" style="top:'+top+'px; width:'+width+'px;"><ul class="clearfix" style="width: 485px;">'+html+'</ul></li>');
				$ul.append($small);

				$small.delegate("li", "click", function(event){
					changeLi($(this).index());
					autoPlay.restart();
				});

				autoPlay.start();
			}

			function changeLi(index){
				$ul.find('.bzoom_thumb_active').removeClass('bzoom_thumb_active').stop().animate({opacity: 0}, _option.speed, function() {
                    $(this).hide();
                });
                $small.find('.bzoom_smallthumb_active').removeClass('bzoom_smallthumb_active').stop().animate({opacity: _option.smallthumb_inactive_opacity}, _option.speed);

                $li.eq(index).addClass('bzoom_thumb_active').show().stop().css({opacity: 0}).animate({opacity: 1}, _option.speed);
                $small.find('li:eq('+index+')').addClass('bzoom_smallthumb_active').show().stop().css({opacity: _option.smallthumb_inactive_opacity}).animate({opacity: 1}, _option.speed);

                $bzoom_magnifier_img.attr("src", $li.eq(index).find('.bzoom_thumb_image').attr("src"));
			}

			
			

			_option.zoom_area_height = _option.zoom_area_width / scxy;
			$bzoom_zoom_area.find('div').css({width:_option.zoom_area_width, height:_option.zoom_area_height});

			$li.add($bzoom_magnifier).mousemove(function(event){
				var xpos = event.pageX - $ul.offset().left,
					ypos = event.pageY - $ul.offset().top,
					magwidth = _option.thumb_image_width*scalex,
					magheight = _option.thumb_image_height*scalex,
					magx = 0,
					magy = 0,
					bigposx = 0,
					bigposy = 0;

				if(xpos < _option.thumb_image_width/2){
					magx = xpos > magwidth/2 ? xpos-magwidth/2 : 0;
				}else{
					magx = xpos+magwidth/2 > _option.thumb_image_width ? _option.thumb_image_width-magwidth : xpos-magwidth/2;
				}
				if(ypos < _option.thumb_image_height/2){
					magy = ypos > magheight/2 ? ypos-magheight/2 : 0;
				}else{
					magy = ypos+magheight/2 > _option.thumb_image_height ? _option.thumb_image_height-magheight : ypos-magheight/2;
				}

				bigposx = magx / scalex;
				bigposy = magy / scaley;
				
				$bzoom_magnifier.css({'left':magx, 'top':magy});
				$bzoom_magnifier_img.css({'left':-magx, 'top': -magy});

				$bzoom_zoom_img.css({'left': -bigposx, 'top': -bigposy});
			}).mouseenter(function(event){
				autoPlay.stop();

				$bzoom_zoom_img.attr("src", $(this).find('.bzoom_big_image').attr('src'));
				$bzoom_zoom_area.css({"background-image":"none"}).stop().fadeIn(400);

				$ul.find('.bzoom_thumb_active').stop().animate({'opacity':0.5}, _option.speed*0.7);
				$bzoom_magnifier.stop().animate({'opacity':1}, _option.speed*0.7).show();
			}).mouseleave(function(event){
				$bzoom_zoom_area.stop().fadeOut(400);
				$ul.find('.bzoom_thumb_active').stop().animate({'opacity':1}, _option.speed*0.7);
				$bzoom_magnifier.stop().animate({'opacity':0}, _option.speed*0.7, function(){
					$(this).hide();
				});

				autoPlay.start();
			})
		}
	}
})(jQuery);

!function(t){t.fn.carouseller=function(i){var i=t.extend({scrollSpeed:150,autoScrollDelay:0,hoverStopScroll:!0,easing:"linear"},i),e=function(){this.interval=null,this.stop=!1,t(this).find(".carousel-button-left").on("click",o.bind(this)),t(this).find(".carousel-button-right").on("click",n.bind(this)),t(this).on("l",n.bind(this)),t(this).on("r",o.bind(this)),i.hoverStopScroll&&(t(this).on("mouseenter",s.bind(this)),t(this).on("mouseleave",l.bind(this))),i.autoScrollDelay>0&&(this.interval=window.setInterval(n.bind(this),i.autoScrollDelay)),i.autoScrollDelay<0&&(this.interval=window.setInterval(o.bind(this),-i.autoScrollDelay))},s=function(){window.clearInterval(this.interval)},l=function(){i.autoScrollDelay>0&&(this.interval=window.setInterval(n.bind(this),i.autoScrollDelay)),i.autoScrollDelay<0&&(this.interval=window.setInterval(o.bind(this),-i.autoScrollDelay))},o=function(){if(!this.stop){this.stop=!0;var e=t(this).find(".carousel-block").eq(-1).outerWidth(!0);t(this).find(".carousel-items .carousel-block").eq(-1).prependTo(t(this).find(".carousel-items")),t(this).find(".carousel-items").css({left:"-"+e+"px"}),t(this).find(".carousel-items").animate({left:"0px"},i.scrollSpeed,i.easing,function(){this.stop=!1}.bind(this))}},n=function(){if(!this.stop){this.stop=!0;var e=t(this).find(".carousel-block").eq(-1).outerWidth(!0);t(this).find(".carousel-items").animate({left:"-"+e+"px"},i.scrollSpeed,i.easing,function(){t(this).find(".carousel-items .carousel-block").eq(0).appendTo(t(this).find(".carousel-items")),t(this).find(".carousel-items").css({left:"0px"}),this.stop=!1}.bind(this))}};return this.each(e)}}(jQuery);








(function($){$.fn.filterable=function(settings){settings=$.extend({useHash:true,animationSpeed:1000,show:{width:'show',opacity:'show'},hide:{width:'hide',opacity:'hide'},useTags:true,tagSelector:'#portfolio-filter a',selectedTagClass:'current',allTag:'all'},settings);return $(this).each(function(){$(this).bind("filter",function(e,tagToShow){if(settings.useTags){$(settings.tagSelector).removeClass(settings.selectedTagClass);$(settings.tagSelector+'[href='+tagToShow+']').addClass(settings.selectedTagClass)}$(this).trigger("filterportfolio",[tagToShow.substr(1)])});$(this).bind("filterportfolio",function(e,classToShow){if(classToShow==settings.allTag){$(this).trigger("show")}else{$(this).trigger("show",['.'+classToShow]);$(this).trigger("hide",[':not(.'+classToShow+')'])}if(settings.useHash){location.hash='#'+classToShow}});$(this).bind("show",function(e,selectorToShow){$(this).children(selectorToShow).animate(settings.show,settings.animationSpeed)});$(this).bind("hide",function(e,selectorToHide){$(this).children(selectorToHide).animate(settings.hide,settings.animationSpeed)});if(settings.useHash){if(location.hash!='')$(this).trigger("filter",[location.hash]);else $(this).trigger("filter",['#'+settings.allTag])}if(settings.useTags){$(settings.tagSelector).click(function(){$('#portfolio-list, #portfoliolist').trigger("filter",[$(this).attr('href')]);$(settings.tagSelector).removeClass('current');$(this).addClass('current')})}})}})(jQuery);$(document).ready(function(){$('#portfolio-list, #portfoliolist').filterable()});
