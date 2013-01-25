<div class="other_content">                                                                                                                                                                                                                                        <div style="display:none;"><a href="http://kinoturs.ru/" title="фильмы онлайн"> фильмы онлайн</a>  <div style="display:none;"> <a href="http://dleshka.org/" title="бесплатные шаблоны dle">бесплатные шаблоны dle</a> <div style="display:none;"> <a href="http://webshon.ru/" title="веб шаблоны">веб шаблоны</a></div> <a href="http://giglife.org/" title="компьютерные игры"> скачать компьютерные игры</a> 
	<h2 class="oc_title"> {usertitle}</h2>
    [not-logged]<div class="oc_links"><a href="javascript:ShowOrHide('options')">редактировать профиль</a></div>[/not-logged]
    <div class="oc_content">
		<div class="uinf_lcol">
			<img src="{foto}" alt=""/>  <div class="rating_block">{rate}</div><div style="margin-bottom: 10px;">{group-icon}</div> {email} [not-group=5]{pm}[/not-group]
		</div>
		<div class="uinf_rcol">
			<ul class="uinf_ussep">
				<li><span class="grey">Полное имя:</span> <b>{fullname}</b></li>
				<li><span class="grey">Группа:</span> {status} [time_limit]&nbsp;В группе до: {time_limit}[/time_limit]</li>
				<li><span class="grey">ICQ:</span> <b>{icq}</b></li>
			</ul>
			<ul class="uinf_ussep">
				<li><span class="grey">Количество публикаций:</span> <b>{news-num}</b> [{news}][rss]<img src="{THEME}/images/rss.png" alt="rss" style="vertical-align: middle; margin-left: 5px;" />[/rss]</li>
				<li><span class="grey">Количество комментариев:</span> <b>{comm-num}</b> [{comments}]</li>
				<li><span class="grey">Дата регистрации:</span> <b>{registration}</b></li>
				<li><span class="grey">Последнее посещение:</span> <b>{lastdate}</b></li>
			</ul>
			<ul class="uinf_ussep">
				<li><span class="grey">Место жительства:</span> {land}</li>
				<li><span class="grey">Немного о себе:</span> {info}</li>
			</ul>
            <br />
            <br />
            <ul class="uinf_ussep">
				<li>{ignore-list}</li>
			</ul>
		</div>
		<div class="clr"></div>
    </div>
</div>
[not-logged]
<div id="options" style="display:none;">
    <div class="other_content">
        <h2 class="oc_title">Редактировать профиль</h2>
        <div class="oc_content">
            <table class="tableform">
				<tr>
					<td class="label">Ваше Имя:<br /><input type="text" name="fullname" value="{fullname}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">Ваш E-Mail:<br /><input type="text" name="email" value="{editmail}" class="f_input" /><br />
					<div class="checkbox">{hidemail}</div>
					<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">Отписаться от подписанных новостей</label></div></td>
				</tr>
				<tr>
					<td class="label">Место жительства:<br /><input type="text" name="land" value="{land}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">Номер ICQ:<br /><input type="text" name="icq" value="{icq}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">Старый пароль:<br /><input type="password" name="altpass" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">Новый пароль:<br /><input type="password" name="password1" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">Повторите:<br /><input type="password" name="password2" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label" valign="top">Блокировка по IP:<br />Ваш IP: {ip}
					<div><textarea name="allowed_ip" style="width:98%;" rows="5" class="f_textarea">{allowed-ip}</textarea></div>
					<div>
						<span class="small" style="color: #cb1919;">
						* Внимание! Будьте бдительны при изменении данной настройки. Доступ к Вашему аккаунту будет доступен только с того IP-адреса или подсети, который Вы укажете. Вы можете указать несколько IP адресов, по одному адресу на каждую строчку.
						<br />
						Пример: 192.48.25.71 или 129.42.*.*</span>
					</div>
					</td>
				</tr>
				<tr>
					<td class="label">Аватар:<br />
					<input type="file" name="image" class="f_input" /><br />
					<div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /> <label for="del_foto">Удалить фотографию</label></div>
					</td>
				</tr>
				<tr>
					<td class="label">О себе:<br /><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
				</tr>
				<tr>
					<td class="label">Подпись:<br /><textarea name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea></td>
				</tr>
				{xfields}
			</table>
				<input class="main_botoms"  type="submit" name="submit" value="Отправить" />
				<input name="submit" type="hidden" id="submit" value="submit" />
        </div>
    </div>
</div>
 [/not-logged]