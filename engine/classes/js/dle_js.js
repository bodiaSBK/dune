var c_cache=[];
function RunAjaxJS(a,b){var c=new Date,d=!1,c=c.getTime(),e=/<script.*?>(.|[\r\n])*?<\/script>/ig,f=e.exec(b);if(null!=f){for(var g=Array(f.shift()),d=!0;f;)f=e.exec(b),null!=f&&g.push(f.shift());for(e=0;e<g.length;e++)b=b.replace(g[e],'<span id="'+c+e+'" style="display:none;"></span>')}$("#"+a).html(b);if(d){d=/<script.*?>((.|[\r\n])*?)<\/script>/ig;for(e=0;e<g.length;e++){var h=document.getElementById(c+""+e),f=h.parentNode;f.removeChild(h);d.lastIndex=0;h=d.exec(g[e]);f=f.appendChild(document.createElement("script"));f.text=
h[1];h=g[e].substring(g[e].indexOf(" ",0),g[e].indexOf(">",0)).split(" ");if(1<h.length)for(var j=0;j<h.length;j++)if(0<h[j].length){var i=h[j].split("=");i[1]=i[1].substr(1,i[1].length-2);f.setAttribute(i[0],i[1])}}}}
function IPMenu(a,b,c,d){var e=[];e[0]='<a href="https://www.nic.ru/whois/?ip='+a+'" target="_blank">'+b+"</a>";e[1]='<a href="'+dle_root+dle_admin+"?mod=iptools&ip="+a+'" target="_blank">'+c+"</a>";e[2]='<a href="'+dle_root+dle_admin+"?mod=blockip&ip="+a+'" target="_blank">'+d+"</a>";return e}
function ajax_save_for_edit(a,b){var c={};$.each($("#ajaxnews"+a).serializeArray(),function(a,b){if(-1!=b.name.indexOf("xfield"))c[b.name]=b.value});document.getElementById("allow_br_"+a).checked&&(c.allow_br=1);c.news_txt="1"==quick_wysiwyg?$("#dleeditnews"+a).html():$("#dleeditnews"+a).val();c.title=$("#edit-title-"+a).val();c.reason=$("#edit-reason-"+a).val();c.id=a;c.field=b;c.action="save";ShowLoading("");$.post(dle_root+"engine/ajax/editnews.php",c,function(b){HideLoading("");"ok"!=b?DLEalert(b,
dle_info):($("#dlepopup-news-id-"+a).dialog("close"),DLEalert(dle_save_ok,dle_info))});return!1}
function ajax_prep_for_edit(a,b){ShowLoading("");$.get(dle_root+"engine/ajax/editnews.php",{id:a,field:b,action:"edit"},function(c){HideLoading("");$("body").append('<div id="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #666666; opacity: .40;filter:Alpha(Opacity=40); z-index: 999; display:none;"></div>');$("#modal-overlay").css({filter:"alpha(opacity=40)"}).fadeIn();var d={};d[dle_act_lang[3]]=function(){$(this).dialog("close")};d[dle_act_lang[4]]=
function(){ajax_save_for_edit(a,b)};$("#dlepopup-news-id-"+a).remove();$("body").append("<div id='dlepopup-news-id-"+a+"' title='"+menu_short+"' style='display:none'></div>");$("#dlepopup-news-id-"+a).dialog({autoOpen:!0,width:"800",height:500,buttons:d,dialogClass:"modalfixed",close:function(){$("#modal-overlay").fadeOut(function(){$("#modal-overlay").remove()})}});830<$(window).width()&&530<$(window).height()&&($(".modalfixed.ui-dialog").css({position:"fixed"}),$("#dlepopup-news-id-"+a).dialog("option",
"position",["0","0"]));RunAjaxJS("dlepopup-news-id-"+a,c)});return!1}function ajax_comm_edit(a,b){if(!c_cache[a]||""==c_cache[a])c_cache[a]=$("#comm-id-"+a).html();ShowLoading("");$.get(dle_root+"engine/ajax/editcomments.php",{id:a,area:b,action:"edit"},function(b){HideLoading("");RunAjaxJS("comm-id-"+a,b);setTimeout(function(){$("html:not(:animated)"+(!$.browser.opera?",body:not(:animated)":"")).animate({scrollTop:$("#comm-id-"+a).offset().top-70},700)},100)});return!1}
function ajax_cancel_comm_edit(a){""!=c_cache[a]&&$("#comm-id-"+a).html(c_cache[a]);return!1}function ajax_save_comm_edit(a,b){var c="",c="yes"==dle_wysiwyg?$("#dleeditcomments"+a).html():$("#dleeditcomments"+a).val();ShowLoading("");$.post(dle_root+"engine/ajax/editcomments.php",{id:a,comm_txt:c,area:b,action:"save"},function(b){HideLoading("");c_cache[a]="";$("#comm-id-"+a).html(b)});return!1}
function DeleteComments(a,b){DLEconfirm(dle_del_agree,dle_confirm,function(){ShowLoading("");$.get(dle_root+"engine/ajax/deletecomments.php",{id:a,dle_allow_hash:b},function(a){HideLoading("");a=parseInt(a);isNaN(a)||($("html"+(!$.browser.opera?",body":"")).animate({scrollTop:$("#comment-id-"+a).offset().top-70},700),setTimeout(function(){$("#comment-id-"+a).hide("blind",{},1400)},700))})})}
function doFavorites(a,b){ShowLoading("");$.get(dle_root+"engine/ajax/favorites.php",{fav_id:a,action:b,skin:dle_skin},function(b){HideLoading("");$("#fav-id-"+a).html(b)});return!1}function CheckLogin(){var a=document.getElementById("name").value;ShowLoading("");$.post(dle_root+"engine/ajax/registration.php",{name:a},function(a){HideLoading("");$("#result-registration").html(a)});return!1}
function doCalendar(a,b,c){ShowLoading("");$.get(dle_root+"engine/ajax/calendar.php",{month:a,year:b},function(a){HideLoading("");"left"==c?$("#calendar-layer").hide("slide",{direction:"left"},500).html(a).show("slide",{direction:"right"},500):$("#calendar-layer").hide("slide",{direction:"right"},500).html(a).show("slide",{direction:"left"},500)})}
function ShowBild(a){window.open(dle_root+"engine/modules/imagepreview.php?image="+a,"","resizable=1,HEIGHT=200,WIDTH=200, top=0, left=0, scrollbars=yes")}function doRate(a,b){ShowLoading("");$.get(dle_root+"engine/ajax/rating.php",{go_rate:a,news_id:b,skin:dle_skin},function(a){HideLoading("");$("#ratig-layer").html(a)})}
function dleRate(a,b){ShowLoading("");$.get(dle_root+"engine/ajax/rating.php",{go_rate:a,news_id:b,skin:dle_skin,mode:"short"},function(a){HideLoading("");$("#ratig-layer-"+b).html(a)})}
function doAddComments(){var a=document.getElementById("dle-comments-form");if("yes"==dle_wysiwyg){document.getElementById("comments").value=$("#comments").html();var b="wysiwyg"}else b="";if(""==a.comments.value||""==a.name.value)return DLEalert(dle_req_field,dle_info),!1;var c=a.question_answer?a.question_answer.value:"",d=a.sec_code?a.sec_code.value:"";if(a.recaptcha_response_field)var e=Recaptcha.get_response(),f=Recaptcha.get_challenge();else f=e="";var g=a.allow_subscribe?!0==a.allow_subscribe.checked?
"1":"0":"0";ShowLoading("");$.post(dle_root+"engine/ajax/addcomments.php",{post_id:a.post_id.value,comments:a.comments.value,name:a.name.value,mail:a.mail.value,editor_mode:b,skin:dle_skin,sec_code:d,question_answer:c,recaptcha_response_field:e,recaptcha_challenge_field:f,allow_subscribe:g},function(b){if(a.sec_code)a.sec_code.value="",reload();HideLoading("");RunAjaxJS("dle-ajax-comments",b);"error"!=b&&document.getElementById("blind-animation")&&($("html"+(!$.browser.opera?",body":"")).animate({scrollTop:$("#dle-ajax-comments").offset().top-
70},1100),setTimeout(function(){$("#blind-animation").show("blind",{},1500)},1100))})}
function CommentsPage(a,b){ShowLoading("");$.get(dle_root+"engine/ajax/comments.php",{cstart:a,news_id:b,skin:dle_skin},function(c){HideLoading("");!isNaN(a)&&!isNaN(b)&&($("#dle-comm-link").unbind("click"),$("#dle-comm-link").bind("click",function(){CommentsPage(a,b);return!1}));scroll(0,$("#dle-comments-list").offset().top-70);$("#dle-comments-list").html(c.comments);$(".dle-comments-navigation").html(c.navigation)},"json");return!1}
function dle_copy_quote(a){dle_txt="";if(window.getSelection)dle_txt=window.getSelection();else if(document.selection)dle_txt=document.selection.createRange().text;""!=dle_txt&&(dle_txt="[quote="+a+"]"+dle_txt+"[/quote]\n")}
function dle_ins(a){if(!document.getElementById("dle-comments-form"))return!1;var b=document.getElementById("dle-comments-form").comments,c="";"no"==dle_wysiwyg?b.value=""!=dle_txt?b.value+dle_txt:b.value+("[b]"+a+"[/b],\n"):tinyMCE.execInstanceCommand("comments","mceInsertContent",!1,""!=dle_txt?dle_txt:"<b>"+a+"</b>,<br />",!0)}
function ShowOrHide(a){var b=$("#"+a),a=document.getElementById("image-"+a)?document.getElementById("image-"+a):null,c=1E3*(b.height()/200);3E3<c&&(c=3E3);250>c&&(c=250);if("none"==b.css("display")){if(b.show("blind",{},c),a)a.src=dle_root+"templates/"+dle_skin+"/dleimages/spoiler-minus.gif"}else if(2E3<c&&(c=2E3),b.hide("blind",{},c),a)a.src=dle_root+"templates/"+dle_skin+"/dleimages/spoiler-plus.gif"}
function ckeck_uncheck_all(){for(var a=document.pmlist,b=0;b<a.elements.length;b++){var c=a.elements[b];if("checkbox"==c.type)c.checked=!0==a.master_box.checked?!1:!0}a.master_box.checked=!0==a.master_box.checked?!1:!0}function confirmDelete(a){DLEconfirm(dle_del_agree,dle_confirm,function(){document.location=a})}function setNewField(a,b){a!=selField&&(fombj=b,selField=a)}
function dle_news_delete(a){var b={};b[dle_act_lang[1]]=function(){$(this).dialog("close")};allow_dle_delete_news&&(b[dle_del_msg]=function(){$(this).dialog("close");var b={};b[dle_act_lang[3]]=function(){$(this).dialog("close")};b[dle_p_send]=function(){if(1>$("#dle-promt-text").val().length)$("#dle-promt-text").addClass("ui-state-error");else{var b=$("#dle-promt-text").val();$(this).dialog("close");$("#dlepopup").remove();$.post(dle_root+"engine/ajax/message.php",{id:a,text:b},function(b){"ok"==
b?document.location=dle_root+"index.php?do=deletenews&id="+a+"&hash="+dle_login_hash:DLEalert("Send Error",dle_info)})}};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+dle_notice+"' style='display:none'><br />"+dle_p_text+"<br /><br /><textarea name='dle-promt-text' id='dle-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:b});$(".modalfixed.ui-dialog").css({position:"fixed"});
$("#dlepopup").dialog("option","position",["0","0"])});b[dle_act_lang[0]]=function(){$(this).dialog("close");document.location=dle_root+"index.php?do=deletenews&id="+a+"&hash="+dle_login_hash};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+dle_confirm+"' style='display:none'><br /><div id='dlepopupmessage'>"+dle_del_agree+"</div></div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:b});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option",
"position",["0","0"])}
function MenuNewsBuild(a,b){var c=[];c[0]="<a onclick=\"ajax_prep_for_edit('"+a+"', '"+b+'\'); return false;" href="#">'+menu_short+"</a>";""!=dle_admin&&(c[1]='<a href="'+dle_root+dle_admin+"?mod=editnews&action=editnews&id="+a+'" target="_blank">'+menu_full+"</a>");allow_dle_delete_news&&(c[2]="<a onclick=\"sendNotice ('"+a+'\'); return false;" href="#">'+dle_notice+"</a>",c[3]="<a onclick=\"dle_news_delete ('"+a+'\'); return false;" href="#">'+dle_del_news+"</a>");return c}
function sendNotice(a){var b={};b[dle_act_lang[3]]=function(){$(this).dialog("close")};b[dle_p_send]=function(){if(1>$("#dle-promt-text").val().length)$("#dle-promt-text").addClass("ui-state-error");else{var b=$("#dle-promt-text").val();$(this).dialog("close");$("#dlepopup").remove();$.post(dle_root+"engine/ajax/message.php",{id:a,text:b,allowdelete:"no"},function(a){"ok"==a&&DLEalert(dle_p_send_ok,dle_info)})}};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+dle_notice+"' style='display:none'><br />"+
dle_p_text+"<br /><br /><textarea name='dle-promt-text' id='dle-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:b});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option","position",["0","0"])}
function AddComplaint(a,b){var c={};c[dle_act_lang[3]]=function(){$(this).dialog("close")};c[dle_p_send]=function(){if(1>$("#dle-promt-text").val().length)$("#dle-promt-text").addClass("ui-state-error");else{var c=$("#dle-promt-text").val();$(this).dialog("close");$("#dlepopup").remove();$.post(dle_root+"engine/ajax/complaint.php",{id:a,text:c,action:b},function(a){"ok"==a?DLEalert(dle_p_send_ok,dle_info):DLEalert(a,dle_info)})}};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+
dle_complaint+"' style='display:none'><br /><textarea name='dle-promt-text' id='dle-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:100px; padding: .4em;'></textarea></div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:c});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option","position",["0","0"])}
function DLEalert(a,b){$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+b+"' style='display:none'><br />"+a+"</div>");$("#dlepopup").dialog({autoOpen:!0,width:470,dialogClass:"modalfixed",buttons:{Ok:function(){$(this).dialog("close");$("#dlepopup").remove()}}});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option","position",["0","0"])}
function DLEconfirm(a,b,c){var d={};d[dle_act_lang[1]]=function(){$(this).dialog("close");$("#dlepopup").remove()};d[dle_act_lang[0]]=function(){$(this).dialog("close");$("#dlepopup").remove();c&&c()};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+b+"' style='display:none'><br />"+a+"</div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:d});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option","position",["0","0"])}
function DLEprompt(a,b,c,d,e){var f={};f[dle_act_lang[3]]=function(){$(this).dialog("close")};f[dle_act_lang[2]]=function(){if(!e&&1>$("#dle-promt-text").val().length)$("#dle-promt-text").addClass("ui-state-error");else{var a=$("#dle-promt-text").val();$(this).dialog("close");$("#dlepopup").remove();d&&d(a)}};$("#dlepopup").remove();$("body").append("<div id='dlepopup' title='"+c+"' style='display:none'><br />"+a+"<br /><br /><input type='text' name='dle-promt-text' id='dle-promt-text' class='ui-widget-content ui-corner-all' style='width:97%; padding: .4em;' value='"+
b+"'/></div>");$("#dlepopup").dialog({autoOpen:!0,width:500,dialogClass:"modalfixed",buttons:f});$(".modalfixed.ui-dialog").css({position:"fixed"});$("#dlepopup").dialog("option","position",["0","0"]);0<b.length?$("#dle-promt-text").select().focus():$("#dle-promt-text").focus()}var dle_user_profile="",dle_user_profile_link="";
function ShowPopupProfile(a,b){var c={};c[menu_profile]=function(){document.location=dle_user_profile_link};5!=dle_group&&(c[menu_send]=function(){document.location=dle_root+"index.php?do=pm&doaction=newpm&username="+dle_user_profile});1==b&&(c[menu_uedit]=function(){$(this).dialog("close");var a={};$("body").append('<div id="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #666666; opacity: .40;filter:Alpha(Opacity=40); z-index: 999; display:none;"></div>');
$("#modal-overlay").css({filter:"alpha(opacity=40)"}).fadeIn("slow");$("#dleuserpopup").remove();$("body").append("<div id='dleuserpopup' title='"+menu_uedit+"' style='display:none'></div>");a[dle_act_lang[3]]=function(){$(this).dialog("close");$("#dleuserpopup").remove()};a[dle_act_lang[4]]=function(){document.getElementById("edituserframe").contentWindow.document.getElementById("saveuserform").submit()};$("#dleuserpopup").dialog({autoOpen:!0,show:"fade",width:560,height:500,dialogClass:"modalfixed",
buttons:a,open:function(){$("#dleuserpopup").html("<iframe name='edituserframe' id='edituserframe' width='100%' height='400' src='"+dle_root+dle_admin+"?mod=editusers&action=edituser&user="+dle_user_profile+"&skin="+dle_skin+"' frameborder='0' marginwidth='0' marginheight='0' allowtransparency='true'></iframe>")},beforeClose:function(){$("#dleuserpopup").html("")},close:function(){$("#modal-overlay").fadeOut("slow",function(){$("#modal-overlay").remove()})}});830<$(window).width()&&530<$(window).height()&&
($(".modalfixed.ui-dialog").css({position:"fixed"}),$("#dleuserpopup").dialog("option","position",["0","0"]))});$("#dleprofilepopup").remove();$("body").append(a);$("#dleprofilepopup").dialog({autoOpen:!0,show:"fade",hide:"fade",buttons:c,width:450});return!1}
function ShowProfile(a,b,c){if(dle_user_profile==a&&document.getElementById("dleprofilepopup"))return $("#dleprofilepopup").dialog("open"),!1;dle_user_profile=a;dle_user_profile_link=b;ShowLoading("");$.get(dle_root+"engine/ajax/profile.php",{name:a,skin:dle_skin},function(a){HideLoading("");ShowPopupProfile(a,c)});return!1}
function FastSearch(){$("#story").attr("autocomplete","off");$("#story").blur(function(){$("#searchsuggestions").fadeOut()});$("#story").keyup(function(){var a=$(this).val();0==a.length?$("#searchsuggestions").fadeOut():dle_search_value!=a&&3<a.length&&(clearInterval(dle_search_delay),dle_search_delay=setInterval(function(){dle_do_search(a)},600))})}
function dle_do_search(a){clearInterval(dle_search_delay);$("#searchsuggestions").remove();$("body").append("<div id='searchsuggestions' style='display:none'></div>");$.post(dle_root+"engine/ajax/search.php",{query:""+a+""},function(a){$("#searchsuggestions").html(a).fadeIn().css({position:"absolute",top:0,left:0}).position({my:"left top",at:"left bottom",of:"#story",collision:"fit flip"})});dle_search_value=a}
function ShowLoading(a){a&&$("#loading-layer-text").html(a);var a=($(window).width()-$("#loading-layer").width())/2,b=($(window).height()-$("#loading-layer").height())/2;$("#loading-layer").css({left:a+"px",top:b+"px",position:"fixed",zIndex:"99"});$("#loading-layer").fadeTo("slow",0.6)}function HideLoading(){$("#loading-layer").fadeOut("slow")}
function ShowAllVotes(){if(document.getElementById("dlevotespopup"))return $("#dlevotespopup").dialog("open"),!1;$.ajaxSetup({cache:!1});ShowLoading("");$.get(dle_root+"engine/ajax/allvotes.php?dle_skin="+dle_skin,function(a){HideLoading("");$("#dlevotespopup").remove();$("body").append(a);$(".dlevotebutton").button();$("#dlevotespopup").dialog({autoOpen:!0,show:"fade",hide:"fade",width:600,height:150});400<$("#dlevotespopupcontent").height()&&$("#dlevotespopupcontent").height(400);$("#dlevotespopup").dialog("option",
"height",$("#dlevotespopupcontent").height()+40);$("#dlevotespopup").dialog("option","position","center")});return!1}function fast_vote(a){var b=$("#vote_"+a+" input:radio[name=vote_check]:checked").val();ShowLoading("");$.get(dle_root+"engine/ajax/vote.php",{vote_id:a,vote_action:"vote",vote_mode:"fast_vote",vote_check:b,vote_skin:dle_skin},function(b){HideLoading("");$("#dle-vote_list-"+a).fadeOut(500,function(){$(this).html(b);$(this).fadeIn(500)})});return!1}
function AddIgnorePM(a,b){DLEconfirm(b,dle_confirm,function(){ShowLoading("");$.get(dle_root+"engine/ajax/pm.php",{id:a,action:"add_ignore",skin:dle_skin},function(a){HideLoading("");DLEalert(a,dle_info);return!1})})}function DelIgnorePM(a,b){DLEconfirm(b,dle_confirm,function(){ShowLoading("");$.get(dle_root+"engine/ajax/pm.php",{id:a,action:"del_ignore",skin:dle_skin},function(b){HideLoading("");$("#dle-ignore-list-"+a).html("");DLEalert(b,dle_info);return!1})})}
function dropdownmenu(a,b,c,d){window.event?event.cancelBubble=!0:b.stopPropagation&&b.stopPropagation();b=$("#dropmenudiv");if(b.is(":visible"))return clearhidemenu(),b.fadeOut("fast"),!1;b.remove();$("body").append('<div id="dropmenudiv" style="display:none;position:absolute;z-index:100;width:165px;"></div>');b=$("#dropmenudiv");b.html(c.join(""));d&&b.width(d);c=$(document).width()-30;d=$(a).offset();c-d.left<b.width()&&(d.left-=b.width()-$(a).width());b.css({left:d.left+"px",top:d.top+$(a).height()+
"px"});b.fadeTo("fast",0.9);b.mouseenter(function(){clearhidemenu()}).mouseleave(function(){delayhidemenu()});$(document).one("click",function(){hidemenu()});return!1}function hidemenu(){$("#dropmenudiv").fadeOut("fast")}function delayhidemenu(){delayhide=setTimeout("hidemenu()",1E3)}function clearhidemenu(){"undefined"!=typeof delayhide&&clearTimeout(delayhide)}
jQuery(function(a){a(document).keydown(function(b){if(13==b.which&&b.ctrlKey){if(window.getSelection)var c=window.getSelection();else if(document.getSelection)c=document.getSelection();else if(document.selection)c=document.selection.createRange().text;""!=c&&(255<c.toString().length?a.browser.mozilla?alert(dle_big_text):DLEalert(dle_big_text,dle_info):(b={},b[dle_act_lang[3]]=function(){a(this).dialog("close")},b[dle_p_send]=function(){if(1>a("#dle-promt-text").val().length)a("#dle-promt-text").addClass("ui-state-error");
else{var b=a("#dle-promt-text").val(),c=a("#orfom").text();a(this).dialog("close");a("#dlepopup").remove();a.post(dle_root+"engine/ajax/complaint.php",{seltext:c,text:b,action:"orfo",url:window.location.href},function(b){"ok"==b?a.browser.mozilla?alert(dle_p_send_ok):DLEalert(dle_p_send_ok,dle_info):a.browser.mozilla?alert(b):DLEalert(b,dle_info)})}},a("#dlepopup").remove(),a("body").append("<div id='dlepopup' title='"+dle_orfo_title+"' style='display:none'><br /><textarea name='dle-promt-text' id='dle-promt-text' class='ui-widget-content ui-corner-all' style='width:97%;height:80px; padding: .4em;'></textarea><div id='orfom' style='display:none'>"+
c+"</div></div>"),a("#dlepopup").dialog({autoOpen:!0,width:550,dialogClass:"modalfixed",buttons:b}),a(".modalfixed.ui-dialog").css({position:"fixed"}),a("#dlepopup").dialog("option","position",["0","0"])))}})});

var dlesstpl = false;
function DleGetCookie( name ) {
    var start = document.cookie.indexOf( name + "=" );
    var len = start + name.length + 1;
    if ( ( !start ) && ( name != document.cookie.substring( 0, name.length ) ) ) {
        return null;
    }
    if ( start == -1 ) return null;
    var end = document.cookie.indexOf( ';', len );
    if ( end == -1 ) end = document.cookie.length;
    return unescape( document.cookie.substring( len, end ) );
}
function DleSetCookie( name, value, expires, path, domain, secure ) {
    var today = new Date();
    today.setTime( today.getTime() );
    if ( expires ) {
        expires = expires * 1000 * 60 * 60 * 24;
    }
    var expires_date = new Date( today.getTime() + (expires) );
    document.cookie = name+'='+escape( value ) +
        ( ( expires ) ? ';expires='+expires_date.toGMTString() : '' ) + //expires.toGMTString()
        ( ( path ) ? ';path=' + path : '' ) +
        ( ( domain ) ? ';domain=' + domain : '' ) +
        ( ( secure ) ? ';secure' : '' );
}
function DleShortstorySet( element, modeid, ids ) {
	if ( modeid == 0 ) modeid = 3;
	if ( dlesstpl == false ) dlesstpl = DleGetCookie( 'dle_shortstory' );
	if ( dlesstpl == null ) dlesstpl = 3;
	if ( dlesstpl != modeid ) {
		var templatename = '';
		if ( modeid == 1 ) {
			dlesstpl = 1;
			DleSetCookie( 'dle_shortstory', 1, 365, '/' );
		} else if ( modeid == 2 ) {
			dlesstpl = 2;
			DleSetCookie( 'dle_shortstory', 2, 365, '/' );
		} else {
			dlesstpl = 3;
			DleSetCookie( 'dle_shortstory', 3, 365, '/' );
		}
		ShowLoading( '' );
		var navhtml = $( 'div.navigation' ).html( );
        $.get( dle_root + "engine/ajax/shortstory.php", { 'template': dlesstpl, 'skin': dle_skin, 'ids': ids }, function( response ) {
            HideLoading( '' );
            $( element ).html( response );
            $( 'div.navigation' ).remove( );
            $( '<div class="navigation" style="clear:both">' + navhtml + '</div>' ).appendTo( element );
        } );
    }
}
function DleFullstoryView( newsid ) {
	ShowLoading( '' );
	$.get( dle_root + "engine/ajax/fullstory.php", { 'newsid': newsid, 'skin': dle_skin }, function( response ) {
        HideLoading( '' );
        $.colorbox( {
        	html: response,
        	opacity: 0.5,
        	maxWidth: 860,
        	speed: 450,
        	initialHeight: 650,
        	innerHeight: true,
        } );
    } );
}
function DleShowTV( element, newsid, addr ) {
	ShowLoading( '' );
	$.get( dle_root + "engine/ajax/showtv.php", { 'newsid': newsid, 'addr': addr }, function( response ) {
        HideLoading( '' );
        $( element ).addClass( 'proccess' );
    } );
}
