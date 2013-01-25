[searchposts]
[fullresult]
<div class="kino_news" style="margin:0 20px">
	<div class="kn_left">
		{date=d M}
		<a href="[xfvalue_image]" onclick="return hs.expand(this)"><img src="[xfvalue_image]" alt="{result-title}" title="{result-title}" width="100"></a>
      	</div>
	<div class="kn_right">
		<h2 class="kn_title">{result-title}</h2>
		{result-text}
		<br /><br />
		<span id="mchitdalee">
			Просмотрели {views} |
			<a href="#" onclick="DleFullstoryView('{news-id}');return false;">Просмотреть</a>
		</span> 
	</div>
	<div class="clr"></div>
</div>
[/fullresult]
[shortresult]
<div class="kino_news" style="margin:0 20px">
	<div class="kn_left">
		{date=d M}
		<a href="[xfvalue_image]" onclick="return hs.expand(this)"><img src="[xfvalue_image]" alt="{result-title}" title="{result-title}" width="100"></a>
      	</div>
	<div class="kn_right">
		<h2 class="kn_title">{result-title}</h2>
		{result-text}
		<br /><br />
		<span id="mchitdalee">
			Просмотрели {views} |
			<a href="#" onclick="DleFullstoryView('{news-id}');return false;">Просмотреть</a>
		</span> 
	</div>
	<div class="clr"></div>
</div>
[/shortresult]
[/searchposts]
[searchcomments]
[fullresult]

<div class="comments">
	<div class="com_title">
    	{result-author} ({result-date})
    
    	<div class="com_opt_menu">
            [com-edit]<img src="{THEME}/images/icon_edit.png" width="19" height="18" alt="" />[/com-edit]
            [com-del]<img src="{THEME}/images/icon_delit.png" width="19" height="18" alt="" />[/com-del]
            <div class="clr"></div>
        </div>
    </div>
	<div class="com_in">
    	<div class="com_left">
        	<img src="{foto}" alt=""/><br />
        </div>
        <div class="com_right">
        	{result-text} - [result-link]{result-title}[/result-link]
        </div>
        <div class="clr"></div>
    </div>
</div>

[/fullresult]
[shortresult]
<div class="comments">
	<div class="com_title">
    	{result-author} ({result-date})
    
    	<div class="com_opt_menu">
            [com-edit]<img src="{THEME}/images/icon_edit.png" width="19" height="18" alt="" />[/com-edit]
            [com-del]<img src="{THEME}/images/icon_delit.png" width="19" height="18" alt="" />[/com-del]
            <div class="clr"></div>
        </div>
    </div>
	<div class="com_in">
    	<div class="com_left">
        	<img src="{foto}" alt=""/><br />
        </div>
        <div class="com_right">
        	{result-text} - [result-link]{result-title}[/result-link]
        </div>
        <div class="clr"></div>
    </div>
</div>

[/shortresult]
[/searchcomments]