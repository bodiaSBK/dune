<div class="other_content">
	<h2 class="oc_title"> [pmlist]������ ���������[/pmlist][newpm]����� ���������[/newpm][readpm]{subj}[/readpm]</h2>
    <div class="oc_links">[new_pm]������� �����[/new_pm] | [outbox]������������[/outbox] | [inbox]��������[/inbox]</div>
     <div class="oc_content">
           [pmlist]{pmlist}[/pmlist]
              [newpm]
        <table class="tableform">
			<tr>
            	<td>
                    <ul class="reset">
                                    <li class="lfield">
                                   <input type="text" name="name" value="����������" onblur="if(this.value=='') this.value='����������';" onfocus="if(this.value=='����������') this.value='';" class="f_input" />
                                   </li>
            
                                <li class="lfield">
                                <input type="text" name="subj" value="����"  onblur="if(this.value=='') this.value='����';" onfocus="if(this.value=='����') this.value='';" class="f_input"/>
                                </li>
                                </ul>
                </td>
            </tr>
			<tr>
				<td colspan="2" class="editorcomm">{editor}
                 <div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">��������� ��������� � ����� "������������"</label></div></td>
                </td>
			</tr>
			
			<tr>
				<td>
					[sec_code]<div>{sec_code}</div>
					<div><input type="text" name="sec_code" value="������� ���" onblur="if(this.value=='') this.value='������� ���';" onfocus="if(this.value=='������� ���') this.value='';" id="sec_code" style="width:115px" class="f_input" /></div>	
                    [/sec_code]
                    [recaptcha]<div>{recaptcha}</div>[/recaptcha]
				</td>
				
			</tr>
		</table>
       <button type="submit" name="submit" class="main_botoms"><span>�������</span></button>  <input type="button" class="fbutton" onclick="dlePMPreview()" title="��������" value="��������" />
          
              [/newpm]
    </div>
</div>          
          [readpm]        
                <div class="comments">
                <div class="com_title">
                    {author} ({date})
                    <div class="com_opt_menu">
                        [complaint]<img src="{THEME}/images/icon_repot.png" width="19" height="18" alt="" />[/complaint]
                        [del]<img src="{THEME}/images/icon_delit.png" width="19" height="18" alt="" />[/del]
                        [reply]<img src="{THEME}/images/icon_quote.png" width="19" height="18" alt="" />[/reply]
                     
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="com_in">
                    <div class="com_left">
                        <img src="{foto}" alt=""/><br />
                       
                    </div>
                    <div class="com_right">
                         {text}<br />
                           [ignore]������������[/ignore]
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
              [/readpm]