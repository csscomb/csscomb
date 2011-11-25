(function(){
	$.fn.extend({
		freeze: function(){
			return this.css('position','relative')
			.append('<div class="frozen">')
			.find('.frozen').css({
				position:'absolute',
				left: 0,
				top: 0,
				width: '100%',
				height: '100%',
				background: '#fff url(/inc/i/progress.gif) no-repeat center',
				opacity: 0
			}).animate({opacity: .6}, 'fast', 'swing').end();
		},

		unfreeze: function(){
			return this.find('.frozen').animate({opacity: 0}, 'slow', 'swing', function(){$(this).remove()}).end();
		}
	});

})(jQuery);
