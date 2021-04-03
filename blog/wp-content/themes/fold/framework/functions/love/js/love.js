jQuery(document).ready(function($){
	
	$(document).on('click', 'a.post-love-link', function () {
		
			var $loveLink = $(this);
			var $id = $(this).attr('id');
			
			if($loveLink.hasClass('loved')) return false;
	
			var $dataToPass = {
				action: 'zoomarts-love', 
				loves_id: $id 
			}
			
			$.post(zoomartsLove.ajaxurl, $dataToPass, function(data){
				$loveLink.html(data).addClass('loved').attr('title','You already love this!');
				$loveLink.find('span').css('opacity',1);
			});
		
			return false;
	});
	
	
});