function setCookie(a,b,c){if(c){var d=new Date();d.setTime(d.getTime()+(c*24*60*60*1000));var e="; expires="+d.toGMTString()}else var e="";document.cookie=a+"="+b+e+"; path=/"}function getCookie(a){var b=a+"=";var d=document.cookie.split(';');for(var i=0;i<d.length;i++){var c=d[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(b)==0)return c.substring(b.length,c.length)}return null}function delCookie(a){setCookie(a,"",-1)}

 $(function(){ 
 /* Start DocumentReady */ 
 $('div.hideAllnews a.hideBtn').each(function(i){var cookie=getCookie('hideBtn'+i); 
 if (cookie&&cookie.indexOf('show')>-1)$(this).toggleClass('show').siblings('div.hideCont').show();}) 
 /* StartClickFunction */ 
 $('div.hideAllnews a.hideBtn').click(function(){ 
 $(this).toggleClass('show').siblings('div.hideCont').slideToggle('normal'); 
 var hideBtn=$('div.hideAllnews a.hideBtn').index($(this)),isShow=$(this).attr('class'); 
 setCookie('hideBtn'+hideBtn,isShow,365); 
 return false; 
 }); 
 /* End DocumentReady */ 
 }); 
