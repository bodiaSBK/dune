<script type="text/javascript" language="JavaScript">//<!--
jQuery(function() {
 jQuery(".switcher span a").click(function() {
  var parent = jQuery(this).parent();
  if (parent.hasClass("active")) return;
  parent.siblings(".active").removeClass("active");
  var className = parent.attr("class");
  var pos = (className.substr(3)-1)*800;
  jQuery('.fast-movies-in .movies-content').stop().animate({'left':'-'+pos+'px'}, 900, 'easeInOutBack');
  parent.addClass("active");
 });
 jQuery(".block-in ul li").hover(function() {
  jQuery(this).toggleClass("active");
 });
 return true;
});
//--></script>

<div class="fast-movies">
<div class="switcher">
<span class="tab1 active"><a href="javascript:void(0)">������ � �����������</a></span><span class="tab2"><a href="javascript:void(0)">����� � �����������</a></span><a href="/premery-nedeli/" class="all">���������� ��� �����</a><div style="display:none;"><a href="http://yephone.ru" title="���� ��� iphone">���� ��� iphone</a></div> <div style="display:none;"><a href="http://ipozdravil.ru/happy-birthday" title="������������� ��� ��������">������������� ��� ��������</a></div>
</div>
<div class="hr"></div>
<div class="fast-movies-in"><div class="movies-content">
<ul>
{custom category="32" template="novinki" aviable="global" from="0" limit="5" cache="yes"}
</ul>
<ul>
{custom category="34" template="novinki" aviable="global" from="0" limit="5" cache="yes"}
</ul>
</div></div>
<div class="hr"></div>
</div>