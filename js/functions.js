;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);
	
	$doc.ready(function() {
		//homepage slider
		$('.slider .slides').slick({
			fade: true,
			dots: true,
			arrows: true,
			autoplay: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true,
			speed: 500,
  			autoplaySpeed: 7000
		});

		//light box gallery
		$('.gallery-images').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
		});

		//burger button nav trigger
		$('.nav-trigger').on('click', function (event) {
		    event.preventDefault();
		    
		    $(this).toggleClass('active');  

		    $('.nav').stop().slideToggle();  
		});

		$('.nav-dropdown').parent().addClass('has-dropdown');

		$win.on('resize load', function () {
			if($win.width() > 1024) {
				$('.nav, .nav-dropdown').removeAttr('style');
				$('.nav-trigger').removeClass('active');
			}
		});

		forms.init();
	});

	var forms = {

		forms: {},

		init: function() {
			this.setForms();
			this.hookForms();

		},

		setForms: function() {
			forms.forms = {
				primaryForm: $('#form-primary'),
				secondaryForm: $('#form-secondary'),

			}
		},

		hookForms: function() {
			forms = this.forms;

			for (i in forms) {
				var form = forms[i];
				this.formAjax(form)
			};
		},

		formAjax: function($form) {
			$form.on('submit', function(e) {

				var	$form         = $(this);
				var $formSuccess  = $form.prev('.form-success');
				var $submitButton = $form.find('.form-btn');
				var $loader       = $form.find('.form-loader');

				$submitButton.prop('disabled', true);
				$loader.removeClass('hidden');
				$form.find(':input').removeClass('field-error');

				var data = new FormData($form[0]);

				$.ajax({
					url: $form.attr('action'),
					type: $form.attr('method'),
					data: data, //$form.serializeArray(),
					dataType: 'json',
					cache: false,
		            contentType: false,
		            processData: false,
				})
				
				.done(function (response) {

					if (response.status === 'success') {
						redirect = response.redirect || false;
						if (redirect) {
							window.location = redirect;
						} else {
							
							$form.hide();
							$formSuccess.show();
						};

					} else if (response.status === 'error')  {

						for(i in response.errors) {
							$form.find(':input[name="' + i + '"]').parents('.form-controls').addClass('field-error');
						}

						if ($form.find('.field-error').length) {
							$('html, body').stop(true);
							$('html, body').animate({
								scrollTop : $form.find('.field-error').eq(0).offset().top
							}, 1000);
						};

					} else {
						alert(response.message);
					};
				})
				
				.fail(function(jqXHR, error, status) {
					alert('Something went wrong, try again later.')		
				})
				
				.always(function(jqXHR, error, status) {
					$loader.addClass('hidden');
					$submitButton.prop('disabled', false);
				});

				e.preventDefault();
			});
		}
	}

})(jQuery, window, document);
