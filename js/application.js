/**
 * Created by Torbatian on 2/2/2015.
 */
$(function () {
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	$(document).on("scroll", function () {
		var cutoff = $(window).scrollTop();

		$('section').each(function () {
			if ($(this).offset().top + $(this).height() > cutoff) {
				$('section:not(#' + $(this).attr('id') + ')').each(function () {
					$('nav').removeClass($(this).attr('id'));
				});
				$('nav').addClass($(this).attr('id'));
				return false;
			}
		});

		if (cutoff > $(window).height() - 50) {
			$('nav').addClass('navbar-fixed-top');
		} else {
			$('nav').removeClass('navbar-fixed-top');
		}
		if (cutoff > 100) {
			$('.go-top').addClass('show');

		} else {
			$('.go-top').removeClass('show');
		}
	});
	$('a.page-scroll').bind('click', function (event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			                               scrollTop: $($anchor.attr('href')).offset().top
		                               }, 1500, 'easeInOutExpo', function () {
			if ($(document).scrollTop() > 100) {
				$('.go-top').addClass('show');
			}
		});
		event.preventDefault();
	});
});