jQuery(document).ready(function($) {

	// Gestion de la navigation par onglets
	//$('.onglets-panel:not(:first)').hide();

	$('.onglets li a').click(function(){
		var lien = $(this).attr('href');
		history.pushState({}, '', $(this).attr("href"));
		$('.onglets li a').removeClass('actif');
		$(this).addClass('actif');
		$("html, body").animate({ scrollTop: $(lien).offset().top - 32 }, 1000);
		 return false;
	});

	
});
