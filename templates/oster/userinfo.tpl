<div class="other_content">                                                                                                                                                                                                                                        <div style="display:none;"><a href="http://kinoturs.ru/" title="������ ������"> ������ ������</a>  <div style="display:none;"> <a href="http://dleshka.org/" title="���������� ������� dle">���������� ������� dle</a> <div style="display:none;"> <a href="http://webshon.ru/" title="��� �������">��� �������</a></div> <a href="http://giglife.org/" title="������������ ����"> ������� ������������ ����</a> 
	<h2 class="oc_title"> {usertitle}</h2>
    [not-logged]<div class="oc_links"><a href="javascript:ShowOrHide('options')">������������� �������</a></div>[/not-logged]
    <div class="oc_content">
		<div class="uinf_lcol">
			<img src="{foto}" alt=""/>  <div class="rating_block">{rate}</div><div style="margin-bottom: 10px;">{group-icon}</div> {email} [not-group=5]{pm}[/not-group]
		</div>
		<div class="uinf_rcol">
			<ul class="uinf_ussep">
				<li><span class="grey">������ ���:</span> <b>{fullname}</b></li>
				<li><span class="grey">������:</span> {status} [time_limit]&nbsp;� ������ ��: {time_limit}[/time_limit]</li>
				<li><span class="grey">ICQ:</span> <b>{icq}</b></li>
			</ul>
			<ul class="uinf_ussep">
				<li><span class="grey">���������� ����������:</span> <b>{news-num}</b> [{news}][rss]<img src="{THEME}/images/rss.png" alt="rss" style="vertical-align: middle; margin-left: 5px;" />[/rss]</li>
				<li><span class="grey">���������� ������������:</span> <b>{comm-num}</b> [{comments}]</li>
				<li><span class="grey">���� �����������:</span> <b>{registration}</b></li>
				<li><span class="grey">��������� ���������:</span> <b>{lastdate}</b></li>
			</ul>
			<ul class="uinf_ussep">
				<li><span class="grey">����� ����������:</span> {land}</li>
				<li><span class="grey">������� � ����:</span> {info}</li>
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
        <h2 class="oc_title">������������� �������</h2>
        <div class="oc_content">
            <table class="tableform">
				<tr>
					<td class="label">���� ���:<br /><input type="text" name="fullname" value="{fullname}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">��� E-Mail:<br /><input type="text" name="email" value="{editmail}" class="f_input" /><br />
					<div class="checkbox">{hidemail}</div>
					<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">���������� �� ����������� ��������</label></div></td>
				</tr>
				<tr>
					<td class="label">����� ����������:<br /><input type="text" name="land" value="{land}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">����� ICQ:<br /><input type="text" name="icq" value="{icq}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">������ ������:<br /><input type="password" name="altpass" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">����� ������:<br /><input type="password" name="password1" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">���������:<br /><input type="password" name="password2" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label" valign="top">���������� �� IP:<br />��� IP: {ip}
					<div><textarea name="allowed_ip" style="width:98%;" rows="5" class="f_textarea">{allowed-ip}</textarea></div>
					<div>
						<span class="small" style="color: #cb1919;">
						* ��������! ������ ��������� ��� ��������� ������ ���������. ������ � ������ �������� ����� �������� ������ � ���� IP-������ ��� �������, ������� �� �������. �� ������ ������� ��������� IP �������, �� ������ ������ �� ������ �������.
						<br />
						������: 192.48.25.71 ��� 129.42.*.*</span>
					</div>
					</td>
				</tr>
				<tr>
					<td class="label">������:<br />
					<input type="file" name="image" class="f_input" /><br />
					<div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" />�<label for="del_foto">������� ����������</label></div>
					</td>
				</tr>
				<tr>
					<td class="label">� ����:<br /><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
				</tr>
				<tr>
					<td class="label">�������:<br /><textarea name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea></td>
				</tr>
				{xfields}
			</table>
				<input class="main_botoms"  type="submit" name="submit" value="���������" />
				<input name="submit" type="hidden" id="submit" value="submit" />
        </div>
    </div>
</div>
 [/not-logged]