// FOR LTR & RTL - rtl:getRtlVal(),
function getRtlVal() {
    var returnVal = false;
    if (document.dir === "rtl") {
        returnVal = true;
    }
    return returnVal;
}

$(document).ready(function() {
	// WOW
	new WOW().init();

	// TOOLTIP
	$('[data-toggle="tooltip"]').tooltip();

	// Check All Checkboxes
	$('#checkAll').click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});

	// GRIDS
	$('[data-eqh]').equalHeight();

	// DROPDOWN ONCLICK ISSUE
	$('.dropdown').on('hide.bs.dropdown', function (e) {
		if (e.clickEvent) {e.preventDefault();}
	});
});

// OWL CAROUSEL
// $(document).ready(function () {
// 	$(".qa").owlCarousel({
// 		rtl: getRtlVal(),
// 		mouseDrag: false,
// 		touchDrag: false,
// 		pullDrag: false,
// 		freeDrag: false,
// 		loop: true,
// 		dots: false,
// 		nav: false,
// 		autoHeight:true,
// 		autoplay: false,
// 		autoplayTimeout: 5000,
// 		autoplayHoverPause: true,
//         margin: 10,
// 		responsiveClass: true,
// 		responsive: {
// 			0:{items:1}
// 		}
// 	});
// });
var $owlcenter = $('.owl-carousel-center');
$owlcenter.children().each( function( index ) {
	$(this).attr( 'data-position', index );
});
$(document).on('click', '.owl-item>div', function() {
	$owlcenter.trigger('to.owl.carousel', $(this).data( 'position' ) );
});
// ===== Header li Active ====
$('header li').on('click', function() {
	$('li').removeClass('active');
	$(this).addClass('active');
});

// SCROLL TO FIX HEADER
window.onscroll = function() {myFunction()};
function myFunction() {
	var header = document.getElementById("header");
	var sticky = header.offsetTop;
	scroll = $(window).scrollTop();
	if (scroll >= 100) header.classList.add('fixed');
	else header.classList.remove("fixed");
}

$(window).scroll(function(){
	var sticky = $('.sticky'),
		scroll = $(window).scrollTop();

	if (scroll >= 200) sticky.addClass('fixed');
	else sticky.removeClass('fixed');
});

$(window).scroll(function() {
	// Parallax Scrolling
	$('.parallax-scroll').each(function(){
		if ($(this).offset().top < $(window).scrollTop()) {
			var difference = $(window).scrollTop() - $(this).offset().top;
			var half = (difference / 2) + 'px';
			$(this).find('.content-box').css('top', half);
		} else {
		$(this).find('.content-box').css('top', '0');
		}
	});
	// Scroll To Top
	if ($(this).scrollTop() >= 50) {
		$('#scroll-to-top').fadeIn(50);
	} else {
		$('#scroll-to-top').fadeOut(50);
	}
});
$('#scroll-to-top').click(function() {
    alert('clicked');
	$('body,html').animate({
		scrollTop : 0
	}, 500);
});

// // Header Active Link on Page Load
// $(document).ready(function () {
// 	$(function() {
// 		var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
// 		$(".navbar-nav li a").each(function() {
// 			if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
// 				$(this).addClass("active");
// 		})
// 	});
// });
