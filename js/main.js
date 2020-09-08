 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.carousel-car').owlCarousel({
			center: true,
			loop: true,
			autoplay: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();


	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });


	$('#book_pick_date,#book_off_date').datepicker({
	  'format': 'm/d/yyyy',
	  'autoclose': true
	});
	$('#time_pick').timepicker();
	/*------------------
         Mon Code
         JQuery/Javascript
      --------------------*/
	///ajouter mon code ici //


	//On gere les boutons qui ferme/cache la modal
	$('#my-modal .modal-footer button, #my-modal .close').on('click', function(){

		$("#my-modal").hide();

	});

	//on affiche la fenetre modal si on a du contenu entre les balises P
	if($('#my-modal .modal-body p').html().length){

		$("#my-modal").show();

	}

	$('#register_form').on('submit', (event) => {

		if(document.getElementById("register_form").checkValidity()) {
			var data = new FormData(document.getElementById("register_form"));

			$.ajax({
				url: "./lib/methode_ajax.php",
				data: {action:"register", data: JSON.stringify(Object.fromEntries(data))},
				method: "POST",
				dataType: "json"
			}).then( function(data) {

				$('#my-modal .modal-body p').html(data.data);

				$("#my-modal").show();

			}).catch(err => console.error(err))

			return false;
		}

	})
	$('#update_form').on('submit', (event) => {

		if(document.getElementById("update_form").checkValidity()) {
			var data = new FormData(document.getElementById("update_form"));

			$.ajax({
				url: "./lib/methode_ajax.php",
				data: {action:"update", data: JSON.stringify(Object.fromEntries(data))},
				method: "POST",
				dataType: "json"
			}).then( function(data) {

				$('#my-modal .modal-body p').html(data.data);

				$("#my-modal").show();

			}).catch(err => console.error(err))

			return false;
		}

	})
})(jQuery);
//modal
 $('#my-modal .modal-footer button, #my-modal .close').on('click', function(){

	 $("#my-modal").hide();

 });

 //on verifie que la cible existe avant de lancer le plugin
 if($('#summernote').length){

	 $('#summernote').summernote({
		 height: 300,                 // set editor height
		 minHeight: null,             // set minimum height of editor
		 maxHeight: null,             // set maximum height of editor
		 focus: true                  // set focus to editable area after initializing summernote
	 });

 }

 $('.wysiwyg .primary-btn').on('click', function(){

	 console.log('btn wysiwyg ready !');
	 var description = $('#summernote').summernote('code');
	 var title = $('.wysiwyg input[name=title]').val();
	 description = encodeURI(description);
	 //methode Ajax
	 var request = $.ajax({
		 url: "./lib/methode_ajax.php",
		 method: "POST",
		 data: { informations : 1, title:title, description : description },
		 dataType: "json" //JSON = reponse attendu en array() ou HTML, reponse de type string
	 });

	 //reussite reponse 200 - Inclu le fait que vous avez pas les permissions requisent
	 request.done(function( msg ) {
		 //console.log(msg);
		 //afichage de la modal ave
		 $('#my-modal .modal-body p').html(msg.modal);

		 $('#news_breadcrumb').append(msg.tmpl);

		 $("#my-modal").show();
		 //$( "#log" ).html( msg );
	 });

	 //erreur 404 ou 500 - le serveur ne repond pas, erreur PHP ?
	 request.fail(function( jqXHR, textStatus ) {
		 console.log( "Request failed: " + textStatus );
	 });


	 //stopper le comportement normal d'une balise de type <a>
	 return false;



 });

 // On initialise la latitude et la longitude de Paris (centre de la carte)
 var lat = 44.10018;
 var lon = 3.05301;
 var macarte = null;

 if($("#map2").length){
// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
	 initMap(lat, lon, macarte);

 }

 // Fonction d'initialisation de la carte
 function initMap(lat, lon, macarte) {
	 // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
	 macarte = L.map('map2').setView([lat, lon], 11);
	 // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	 L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		 // Il est toujours bien de laisser le lien vers la source des données
		 attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
		 minZoom: 12,
		 maxZoom: 20,
	 }).addTo(macarte);
	 var marker = L.marker([lat, lon]).addTo(macarte);



 }
