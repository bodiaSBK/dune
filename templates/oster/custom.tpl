<script type="text/javascript">
function showTralerwin{news-id}() {
$(function(){
    $('#traler{news-id}').dialog({
        autoOpen: true,
        show: 'Scale',
        hide: 'Scale',
        width: 640,
	   buttons: {
				"Полная версия" : function() {
					$(this).dialog(window.open("{full-link}"  ));
				}
				
			 }
		});
});
}
</script>

<div class="main_news">
       <div class="mn_left_colum">
	   [xfgiven_image] 
           <img src="[xfvalue_image]">
		[/xfgiven_image]
       
   </div>
    <div class="mn_right_colum">
        <div class="mn_title">
            <h2 class="mn_title_in">{title} / {title_eng}</h2>
             
            <div class="clr"></div>
        </div>
        <div class="mn_text">
        	{short-story}
         
        </div>
 
     
    </div>
    <div class="clr"></div>
    <ul class="mn_links">
        <li ><a class="mn_l_more" href="{full-link}">больше</a></li>
    </ul>
</div>