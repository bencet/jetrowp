jQuery(document).ready(function($){
	$(".hamburger").on("click", function(){
		$(".nav-menu").slideToggle();
		$(this).toggleClass("active");
	});
	
	$(function() {					
		$('#thumbs li').each(function(i) {	
			$(this).click(function() {
				$('#carousel').trigger( 'slideTo', [i, 0, true] );
					return false;
				});
			});
				
		$('#carousel').carouFredSel({
			responsive: true,
			
			items: {					
				visible: 1,
				width: 940,
				height: 'auto'
			},
			scroll: {
				pauseOnHover: true,
				duration: 750,
				timeoutDuration: 1250,
				fx: 'uncover-fade'
			},
			pagination: '#pager',
			prev: '.prev',
			next: '.next'
		});	
	}); 
		
	$("a").click(function(){
		$("a").removeClass("selected");
	});
	
	if ( $('div.line1 h3').text().length > 15 ) {
        $('div.line1 h3').css({"padding-bottom" : "45px"});
	}
	
	function openPopup() {
		document.getElementById('porfolioPopup').style.display = 'block';
	}
	function closePopup() {
		document.getElementById('portfolioPopup').style.display = 'none';
	}
	
	function scriptForPortfolio(elemCl, elemId){			
		var imgInaRow = 4;
		var mql3 = window.matchMedia("screen and (max-width: 975px)")
		var mql2 = window.matchMedia("screen and (max-width: 750px)")
		var mql1 = window.matchMedia("screen and (max-width: 480px)")
		
		if (mql3.matches) {
			imgInaRow = 3;
		} 
		if (mql2.matches) {
			imgInaRow = 2;
		} 
		if (mql1.matches) {
			imgInaRow = 1;
		}	
						
		if(elemId == "filter-print" || elemId == "filter-web" || elemId == "filter-wordpress" || elemId == "filter-photoshop"){
			$('.pcontainer .ppost').hide();
			$('.pcontainer .' + elemCl).show();
		} else {
			$('.pcontainer .ppost').show();		
		}
		$('.pcontainer .ppost').removeClass('ppostp');
		var i=0;
		$('.ppost').each(function( index ){
			if($('.pcontainer ._' + index).is(':visible')){					
				i++;
				if (i%imgInaRow == 0) {
					$('.pcontainer ._' + index).addClass('ppostp');
				}
			}
		});
		$('#filter-' + elemCl).addClass('selected');				
	};
	
	function resizingImg () {
		var img = $(".item").width();
		var imgHeight = img /2.35;
	
		if( $(window).width() < 975 ) {
			$(".caroufredsel_wrapper .item").height(imgHeight);
			$(".caroufredsel_wrapper").height(imgHeight);
		}
	}
	
	var id = 0;
	var cl = 0;
	
	$(window).load(function () {
		resizingImg();
	});	
	
	$(".filter").click(function(){	
		id = this.id;
		cl = id.slice(7);
		scriptForPortfolio(cl, id);
	});
	
	$(window).bind('resize', function(){ 		
		scriptForPortfolio(cl, id);	
		resizingImg();

	}).trigger('resize');
	
});

