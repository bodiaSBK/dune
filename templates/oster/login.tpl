[not-group=5]
<div class="block">
        <div class="block_title">
            <img src="{THEME}/images/icons/icon1.png" width="28" height="27" alt="" /> {login}
        </div>
        <div class="block_cont">
        <div class="lb_left"><img src="{foto}" alt="{login}" /></div>
        <div class="lb_right">
            <ul class="loginenter">
        [admin-link]<li><a href="{admin-link}" target="_blank"><b>�����������</b></a></li>[/admin-link]
                    <li class="marginli"><a href="{addnews-link}">�������� �������</a></li>
                    <li  ><a href="{profile-link}">��� �������</a></li>
                    <li><a href="{pm-link}">����� ({new-pm}|{all-pm})</a></li>
                    <li><a href="{favorites-link}">��� �������� ({favorite-count})</a></li>
                    <li><a href="{newposts-link}">�������������</a></li>
                    <li><a href="/?do=lastcomments">��������� �����������</a></li>
                    <li><a href="/reklama-na-sayte.html">������� �� �����</a></li>
                    <li class="marginli"><a class="thide lexit" href="{logout-link}">�����</a></li>
                </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
[/not-group]
[group=5]
<div class="block">
        <div class="block_title">
            <img src="{THEME}/images/icons/icon1.png" width="28" height="27" alt="" /> �������
        </div>
        <div class="block_cont">
      <div class="lb_left"><img src="{foto}" alt="{login}" /></div>
      <div class="lb_right">
          <form method="post" action="">
              <div id="logform">
                  <ul class="reset">
                      <li class="lfield"><input type="text" name="login_name" class="f_input" value="���" onblur="if(this.value=='') this.value='���';" onfocus="if(this.value=='���') this.value='';" /></li>
                      <li class="lfield"><input type="password" name="login_password" class="f_input" value="������" onblur="if(this.value=='') this.value='������';" onfocus="if(this.value=='������') this.value='';" /></li>
                      <li class="lpasres"><a href="{lostpassword-link}">������?</a></li>
                      <li class="lbotooms"><a href="{registration-link}">�����������</a> <button class="main_botoms" onclick="submit();" type="submit" title="�����"><span>�����</span></button></li>
                  </ul>
                  <input name="login" type="hidden" id="login" value="submit" />
              </div>
          </form>
      </div>
      <div class="clr"></div>
   </div>
</div>
[/group]