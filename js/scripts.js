$(function() {
    var lang  = $('#lang').val(),
		query = $('#query').val();

	$('#embed-size').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
	    var val  = $(this).val(),
		    code = $('#embed-code').val();

	    if ( 'small' == val ) {
	  		width  = 400;
	  		height = 300;
	  		$('.custom-embed-size').hide();
	    } else if ( 'medium' == val ) {
	  		width  = 600;
	  		height = 450;
	  		$('.custom-embed-size').hide();
	    } else if ( 'large' == val ) {
	  		width  = 800;
	  		height = 600;
	  		$('.custom-embed-size').hide();
	    } else {
	  		width  = $('#embed-width').val();
	  		height = $('#embed-height').val();
	  		$('.custom-embed-size').css("display", "flex");
	    }

	    code = code.replace(/width\s*=\s*\\*"(.+?)\\*"/g, 'width="'+width+'"');
	    code = code.replace(/height\s*=\s*\\*"(.+?)\\*"/g, 'height="'+height+'"');
	    $('#embed-code').val(code);
	});

	$('#embed-db').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
		var val   = $(this).val(),
			code  = $('#embed-code').val(),
			href  = $(location).attr('href').split('?')[0];

		if ( val )
			href = href+'?q='+query+'&lang='+lang+'&db='+val+'&output=embed-tabs';
		else
			href = href+'?q='+query+'&lang='+lang+'&output=embed-tabs';
		
	  	code = code.replace(/src\s*=\s*\\*"(.+?)\\*"/g, 'src="'+href+'"');
	  	$('#embed-code').val(code);
	});

	$('#btnFiltroD').on('click', function (e) {
		var db    = $('#filter-db').val(),
			theme = $('#select-theme').val(),
			href  = $(location).attr('href').split('?')[0];

		if ( 'tabs' == theme ) {
			href = href+'?q='+query+'&lang='+lang+'&theme='+theme+'&db='+db;
		} else {
			href = href+'?q='+query+'&lang='+lang;
		}

		window.location = href;
	});

	$('#embed-width, #embed-height').on('blur', function (e) {
		var code   = $('#embed-code').val(),
			width  = $('#embed-width').val(),
	  		height = $('#embed-height').val();

	  	code = code.replace(/width\s*=\s*\\*"(.+?)\\*"/g, 'width="'+width+'"');
	  	code = code.replace(/height\s*=\s*\\*"(.+?)\\*"/g, 'height="'+height+'"');
	  	$('#embed-code').val(code);
	});

	$('#select-theme').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
		var val = $(this).val();

		if ( 'tabs' == val ) {
			$('#filter-db').attr('disabled', false);
			$('.filter-db').show();
		} else {
			$('#filter-db').attr('disabled', true);
			$('.filter-db').hide();
		}
				
		$('#filter-db').selectpicker('refresh');
	});

	$('input[type=radio][name=radio-theme]').on('change', function(e) {
		var val  = $(this).val(),
			db   = $('#embed-db').val(),
			code = $('#embed-code').val(),
			href = $(location).attr('href').split('?')[0];

		if ( 'tabs' == val ) {
			href = href+'?q='+query+'&lang='+lang+'&db='+db+'&output=embed-tabs';
			$('#embed-db').attr('disabled', false);
		} else {
			href = href+'?q='+query+'&lang='+lang+'&output=embed';
			$('#embed-db').attr('disabled', true);
		}

		$('#embed-db').selectpicker('refresh');
		
	  	code = code.replace(/src\s*=\s*\\*"(.+?)\\*"/g, 'src="'+href+'"');
	  	$('#embed-code').val(code);
	});
});

function copyHTML() {
    var copyText = document.getElementById("embed-code");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}