
$("document").ready(function() {
	$("#video").simplePlayer();
	$("#video1").simplePlayer();
	$("#video2").simplePlayer();
	$("#video3").simplePlayer();
	$().UItoTop({ easingType: 'easeOutQuart' });
	$(".scroll").click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
	});
	$("#owl-demo").owlCarousel({

	 autoPlay: 3000, //Set AutoPlay to 3 seconds
		autoPlay : true,
		 navigation :true,

		items : 5,
		itemsDesktop : [640,4],
		itemsDesktopSmall : [414,3]

	});


	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});


	$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	$(".dropdown").hover(
		function() {
			$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
			$(this).toggleClass('open');
		},
		function() {
			$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
			$(this).toggleClass('open');
		}
	);


});
