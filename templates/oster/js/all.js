
$('.showtvserial').live('click', function()
{
    $('.seria').attr('ip', $(this).attr('ip'));
});



	$(function(){
		$("div.showtv").live("click",function()
		{
			var elem = $(this);
			if(!elem.hasClass("proccess"))
			{
				elem.addClass( 'proccess' );
				$.get( "/engine/ajax/showtv.php", 
					{ 'newsid': $(this).attr("newsid"), 'addr': $(this).attr("ip") }, 
					function( response ) {
						setTimeout(function() {
						    elem.removeClass( 'proccess' );
						}, 5000);
		    		});
			}
		});
	});



	$(function(){
		$("div.showtv").live("click",function()
		{
			var elem = $(this);
			if(!elem.hasClass("proccess"))
			{
				elem.addClass( 'proccess' );
				$.get( "/engine/modules/serial.php", 
					{ 'newsid': $(this).attr("newsid"), 'addr': $(this).attr("ip"), 'season': $(this).attr("season"), 'seria': $(this).attr("seria") }, 
					function( response ) {
						setTimeout(function() {
						    elem.removeClass( 'proccess' );
						}, 5000);
		    		});
			}
		});
	});


	$(function(){
		$("div.showtvserial").live("click",function()
		{
			var elem = $(this);
			if(!elem.hasClass("proccess"))
			{
				elem.addClass( 'proccess' );
				if($(this).attr("ip") == 'none') {
				alert('Enter IP Please');
				                                 }
				else                            {
				$.get( "/engine/ajax/showtvserial.php", 
					{ 'newsid': $(this).attr("newsid"), 'addr': $(this).attr("ip"), 'season': $(this).attr("season"), 'seria': $(this).attr("seria") }, 
					function( response ) {
						setTimeout(function() {
						    elem.removeClass( 'proccess' );
						}, 5000);
		    		});
			                                     }
			}
		});
	});


	$(function(){
		$("div.showtvip").live("click",function()
		{
					var elem = $(this);
					
				if(!elem.hasClass("proccess"))
			{    

				elem.addClass( 'proccess' );
				}

		});
	});

	function showSeries(n)
{
  var el = document.getElementById('subDiv'+n);
 
  if ( el.style.display == 'none' )
    el.style.display = 'block'
  else
    if ( el.style.display == 'block' )
    el.style.display = 'none';
};

function sendNewsId(id){ 
	$.post(
  "/addcart.php",
  {
    newsid: id,
  },
  onAjaxSuccess
);
 
function onAjaxSuccess(data)
{
}
	 }