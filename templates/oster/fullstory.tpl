

<div class="other_content" style="padding:5px 10px">
	<h2 class="oc_title"> {title} / {title_eng}</h2>
    <div class="oc_content fn_padding">
    	<div class="occ_left">
        	<div class="occ_news_img">
                <img src="[xfvalue_image]" />
				[xfgiven_screen]<img style="padding-top: 5px;" src="[xfvalue_screen]" />[/xfgiven_screen]
				[xfgiven_screen2]<img style="padding-top: 5px;" src="[xfvalue_screen2]" />[/xfgiven_screen2]
                <div class="clr"></div>
            </div>
            <div class="rating_block">{rating}	   </div>
			<div class="rating_block">����������: {views}	   </div>
        </div>
        <div class="occ_right">
        	<div class="fn_film_info_style">
                <ul class="film_info">
                 <li><strong>������</strong> [xfvalue_country]</li>
                 <li><strong>���</strong>[xfvalue_year]</li>
                 <li><strong>����</strong> {link-category}</li>
                 <li><strong>��������</strong> [xfvalue_director]</li>
                 <li><strong>� �����</strong> [xfvalue_actors]</li>
                 </ul>
                 {short-story}
				 
				
                 <div>
				 [category=29,27]
                    <div newsid="{news-id}" ip="10.0.0.1" class="showtv">��������� 1</div>
                    <div newsid="{news-id}" ip="10.0.0.2" class="showtv">��������� 2</div>
                    <div newsid="{news-id}" ip="10.0.0.3" class="showtv">��������� 3</div>
                    <div newsid="{news-id}" ip="10.0.0.4" class="showtv">��������� 4</div>
                    <div newsid="{news-id}" ip="10.0.0.5" class="showtv">��������� 5</div>
                 [/category]
				 
				 
				  [category=28]
				  {include file="engine/modules/serial.php?id={news-id}"}
                  [/category]
				 
                    <div class="clr"></div>
                 </div>
                <div class="fn_links" align="right">
                </div>
                <div class="clr"></div>
                [poll]{poll}[/poll]
            </div>
        </div>
         <div class="clr"></div>
         
    </div>
</div>
