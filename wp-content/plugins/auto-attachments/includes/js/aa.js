 //Accordion
 jQuery(function($) {
  $( "#openit" ).accordion({ 
    autoHeight: false,
	animated: 'slide'
});
 });
//Accordion

//OnChange JW
jQuery(document).ready(function($) {
    $("#jwskin").change(function() {
        var src = $(this).val();
		//if (src == '') { var src= 'default' }
		$("#jwpre").html(src ? "<img style='width:150px;height:150px;' src='../wp-content/plugins/auto-attachments/includes/jw/skins/pic/" + src + ".png'>" : "");
		
    });
});
//OnChange JW

	jQuery(function($) {
		$( "#radio" ).buttonset();
		$( "#radio1" ).buttonset();
		$( "#radio2" ).buttonset();
		$( "#radio3" ).buttonset();
		$( "#radio4" ).buttonset();
		$( "#radio5" ).buttonset();
		$( "#radio6" ).buttonset();
		$( "#radio7" ).buttonset();
		$( "#radio8" ).buttonset();
		$( "#radio9" ).buttonset();
	});