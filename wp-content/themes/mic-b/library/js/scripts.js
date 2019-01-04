jQuery(document).ready(function($) {

	// setup magic sparkles for title
	$('.custom-block-hero-logo-text').imagesLoaded(function(){

		var $this = $(".custom-block-hero-logo-text-wrapper").css("position","relative");

		var settings = {
			width: $this.outerWidth(),
			height: $this.outerHeight(),
			color: "#FFFFFF",
			count: 20,
			overlap: 0,
			speed: 0.5
		};

		var sparkle = new Sparkle( $this, settings );
		sparkle.over();

	});	

	// rotating brand slider
	$('.brand-slider').slick({
		slidesToShow: 6,
		slidesToScroll: 1,
		infinite: true,
		dots: false,
		autoplay: true,
		autoplaySpeed: 2000,
		arrows : false,
		responsive: [
			{
				breakpoint: 1440,
				settings: {
					slidesToShow: 5,
				}
			},
			{
				breakpoint: 1240,
				settings: {
					slidesToShow: 4,
				}
			},			
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 3
				}
			}
		]
	});

	// store container for later
	var $masonry = $('.project-masonry-item-bucket');

	// set initial filter after masonry images load
	$masonry.imagesLoaded(function(){
		$masonry.show();
		$("#btn-web").click();
	});

	// setup masonry reflow function
	reflow = function() {
		$masonry.masonry({
			itemSelector: '.project-masonry-item',
			columnWidth: '.grid-sizer',
				percentPosition: true
		});
	}

	// attempt to prevent fouc
	$masonry.hide();
	reflow();

	// filter switch function
	$(".mason-filter").on("click",function(){

		// update display
		$(".mason-filter").removeClass("selected");
		$(this).addClass("selected");
		$(".project-masonry-item").removeClass("hidden");

		switch ($(this).data('type')) {

			case "web":
				// show web only
				$(".post-youtube, .post-vimeo, .post-spotify").addClass("hidden");
				break;

			case "media":
				// show media only
				$(".post-default, .post-website").addClass("hidden");
				break;

		}

		reflow();

	});

});