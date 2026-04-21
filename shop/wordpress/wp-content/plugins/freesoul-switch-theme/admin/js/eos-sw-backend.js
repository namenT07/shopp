jQuery(document).ready(function($){
	$('#eos-switch-theme').on('click', function(){
		$(this).attr('href',$(this).attr('href').replace('theme=' + $('#eos-theme-selection').attr('data-prev-theme'),'theme=unknown'));
		$(this).attr('href',$(this).attr('href').replace('theme=unknown','theme=' + $('#eos-theme-selection').val()));
		$('#eos-theme-selection').attr('data-prev-theme',$('#eos-theme-selection').val());
	});	
});