/* ----------------- Start JS Document ----------------- */
var $ = jQuery.noConflict();
$(document).ready(function() {
	
	
	
	//-------------- Post Gallery --------------//
	$(".post-gallery").owlCarousel({
		autoPlay : 3000,
		stopOnHover : true,
		navigation:true,
		paginationSpeed : 1000,
		goToFirstSpeed : 2000,
		singleItem : true,
		autoHeight : true,
		transitionStyle : "fade",
		lazyLoad : true,
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
	
	
	//-------------- Progress Bar Animation --------------//
	$("[data-progress-animation]").each(function() {
		var $this = $(this);
		$this.appear(function() {
			var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
			if(delay > 1) $this.css("animation-delay", delay + "ms");
			setTimeout(function() {
				$this.animate({width: $this.attr("data-progress-animation")}, 800);
				$this.find('span').animate({opacity: 1}, 2000);
			}, delay);
		}, {accX: 0, accY: -50});
	});
	
	
	//-------------- Widget slider (Flickr) --------------//
	$(".widget-slider").owlCarousel({
		autoPlay : 3000,
		stopOnHover : true,
		navigation:true,
		pagination : false,
		goToFirstSpeed : 2000,
		singleItem : true,
		autoHeight : true,
		transitionStyle : "fade",
		lazyLoad : true,
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
	
	
	//-------------- Nice Scroll Script --------------//
	$("nav.st-menu").niceScroll("nav.st-menu .wrapper",{
		cursorborder:"",
		cursorcolor:"rgba(255,255,255,0.15)",
		cursorwidth:"4px",
		bouncescroll:false,
		railpadding:{top:0,right:2,left:2,bottom:0} 
	});
	
	
	//-------------- Fit Videos --------------//
	$(".fitvid").fitVids();
	
	
	//-------------- Dropdown Nav Menu --------------//
	$('.nav-menu ul li').hover(function(){
		var sub = $(this).find(' > ul');
		if(sub.length > 0 && $(window).width() > 979) {
			sub.stop().slideDown(200);
		}
	}, function(){
		var sub = $(this).find(' > ul');
		if(sub.length > 0 && $(window).width() > 979) {
			sub.stop().slideUp(200);
		}
	});
	
	
	//-------------- Responsive Menu --------------//
	$(".responsive-menu .nav-menu").hide();
    $(".toggle-menu").click(function() {
        $(".responsive-menu .nav-menu").slideToggle(500);
    });
	
	
	//-------------- GoTop Link --------------//
	$('.go-top').click(function(){
        $('.st-content').animate({scrollTop:0}, 'slow');
		$('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
	
	
	//-------------- Add Icons --------------//
	$( ".archives-page .toggle-item .panel-collapse ul li a" ).prepend( "<i class='fa fa-caret-right'></i>" );
	$('.widget_categories > ul > li > a, .widget_pages > ul > li > a, .widget_archive > ul > li > a').prepend( "<i class='fa fa-caret-right'></i>" );
	$('.widget_categories ul ul li a, .widget_pages ul ul li a, .widget_archive ul ul li a').prepend( "<i>...</i>" );
	$('.blog-posts .post.sticky').prepend( "<div class='sticky-icon'><i class='fa fa-star'></i></div>" );
	
	
	
});


//-------------- Google Map Script --------------//
var MapDiv = $("#gmap"),
    mapAddress = $('#gmap').data('address'),
    mapZoom = ($('#gmap').data('zoom')) ? $('#gmap').data('zoom') : 15,
	mapMarker = $('#gmap').data('marker');

var style = [
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a2daf2"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f7f1df"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#d0e3b4"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#bde6ab"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#fbd3da"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffe15f"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#efd151"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "black"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#cfb2db"
            }
        ]
    }
];

$(document).ready(function(){
    $('#gmap').each(function(){
        MapDiv.initMap({
            center: mapAddress,
            markers : {
                marker_1: { 
                    position: mapAddress,
                    options : { icon: mapMarker },
					animation: 'bounce',
                }
            },
            type: "roadmap",
            options: {
				zoom: mapZoom,
				zoomControl: false,
				mapTypeControl: false,
				scaleControl: false,
				scrollwheel: false,
				streetViewControl: false,
				overviewMapControl: false,
				styles: style
            }
        });
     });
})
/* ----------------- End JS Document ----------------- */