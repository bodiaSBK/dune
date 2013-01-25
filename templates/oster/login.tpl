[not-group=5]
<div class="block">
        <div class="block_title">
            <img src="{THEME}/images/icons/icon1.png" width="28" height="27" alt="" /> {login}
        </div>
        <div class="block_cont">
        <div class="lb_left"><img src="{foto}" alt="{login}" /></div>
        <div class="lb_right">
            <ul class="loginenter">
        [admin-link]<li><a href="{admin-link}" target="_blank"><b>Админпанель</b></a></li>[/admin-link]
                    <li class="marginli"><a href="{addnews-link}">Добавить новость</a></li>
                    <li  ><a href="{profile-link}">Мой профиль</a></li>
                    <li><a href="{pm-link}">Почта ({new-pm}|{all-pm})</a></li>
                    <li><a href="{favorites-link}">Мои закладки ({favorite-count})</a></li>
                    <li><a href="{newposts-link}">Непрочитанное</a></li>
                    <li><a href="/?do=lastcomments">Последние комментарии</a></li>
                    <li><a href="/reklama-na-sayte.html">Реклама на сайте</a></li>
                    <li class="marginli"><a class="thide lexit" href="{logout-link}">Выход</a></li>
                </ul>
        </div>
        <div class="clr"></div>
    </div>
</div>
[/not-group]
[group=5]
<div class="block">
        <div class="block_title">
            <img src="{THEME}/images/icons/icon1.png" width="28" height="27" alt="" /> Профиль
        </div>
        <div class="block_cont">
      <div class="lb_left"><img src="{foto}" alt="{login}" /></div>
      <div class="lb_right">
          <form method="post" action="">
              <div id="logform">
                  <ul class="reset">
                      <li class="lfield"><input type="text" name="login_name" class="f_input" value="Имя" onblur="if(this.value=='') this.value='Имя';" onfocus="if(this.value=='Имя') this.value='';" /></li>
                      <li class="lfield"><input type="password" name="login_password" class="f_input" value="Пароль" onblur="if(this.value=='') this.value='Пароль';" onfocus="if(this.value=='Пароль') this.value='';" /></li>
                      <li class="lpasres"><a href="{lostpassword-link}">Забыли?</a></li>
                      <li class="lbotooms"><a href="{registration-link}">Регистрация</a> <button class="main_botoms" onclick="submit();" type="submit" title="Войти"><span>Войти</span></button></li>
                  </ul>
                  <input name="login" type="hidden" id="login" value="submit" />
              </div>
          </form>
      </div>
      <div class="clr"></div>
   </div>
</div>
[/group]