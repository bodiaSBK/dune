$(function() {
	$.fn.extend({
		center: function () {
			return this.each(function() {
				var $this = $(this);
				var $window = $(window);
				clearTimeout($this.timerHandle);
				var top = ($window.height() - $this.height())/2+$window.scrollTop();
				var left = ($window.width() - $this.width())/2+$window.scrollLeft();
				clearTimeout(this.timerHandle);
				this.timerHandle = setTimeout(function () {
					$this.animate({
						"top": top,
						"left": left
					}, 300);
					$(window).bind('scroll', function() {
						$($this).center();
					});
					$(window).bind('resize', function() {
						$($this).center();
					});
				}, 200);
			});
		}
	});

	var overlayHeight = $(document).height();
	var overlayWidth = $(window).width();
	$('body').prepend('<div id="mask"></div>');
	$('#mask').css({'position':'absolute','top':'0','left':'0', 'background':'#000', 'cursor':'pointer', 'z-index':'999', 'display':'none'});
	$(window).bind('resize', function() {
		$('#mask').css({'width':($(document).width()), 'height':($(document).height())});
	});
	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('href');
		$('#mask').css({'width':overlayWidth,'height':overlayHeight});
		$('#mask').fadeTo("slow",0.7);
		$(id).css({'z-index':'1000', 'position':'absolute', 'display':'none'});
		$(id).fadeIn(500);
		$(document).keyup(function(d) {
			if (d.keyCode == 27) {
				$('#mask').fadeOut();
				$(id).fadeOut();
			}
		});
		$('#mask').click(function () {
			$(this).fadeOut();
			$(id).fadeOut();
		});
	});
});