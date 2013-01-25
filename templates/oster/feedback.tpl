<div class="other_content">
	<h2 class="oc_title">Обратная связь</h2>
    <div class="oc_content">
        <table class="tableform">
        [not-logged]
            <tr>
                <td class="label">
                    Ваше имя:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="35" name="name" class="f_input" /></td><div style="display:none;"><a href="http://yephone.ru" title="Игры для iphone">Игры для iphone</a></div> <div style="display:none;"><a href="http://ipozdravil.ru/happy-birthday" title="Поздравленияс днём рождения">Поздравленияс днём рождения</a></div>
            </tr>
            <tr>
                <td class="label">
                    Ваш E-Mail:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="35" name="email" class="f_input" /></td>
            </tr>
        [/not-logged]
            <tr>
                <td class="label">
                    Кому:<span class="impot">*</span>
                </td>
                <td>{recipient}</td>
            </tr>
            <tr>
                <td class="label">
                    Тема:<span class="impot">*</span>
                </td>
                <td><input type="text" maxlength="45" name="subject" class="f_input" /></td>
            </tr>
            <tr>
                <td class="label" valign="top">
                    Сообщение:
                </td>
                <td><textarea name="message" style="width: 380px; height: 160px" class="f_textarea" /></textarea></td>
            </tr>
            [sec_code]
			<tr>
                <td class="label">
                    Введите код:<span class="impot">*</span>
                </td>
                <td>
                    <div>{code}</div>
                    <div><input type="text" maxlength="45" name="sec_code" style="width:115px" class="f_input" /></div>
                </td>
            </tr>
			[/sec_code]
            [recaptcha]
			<tr>
                <td class="label">
                    Введите два слова, показанных на изображении:<span class="impot">*</span>
                </td>
                <td>
                    <div>{recaptcha}</div>
                </td>
            </tr>
			[/recaptcha]
        </table>
        <div class="fieldsubmit">
            <button name="send_btn" class="main_botoms" type="submit"><span>Отправить</span></button>
        </div>
    </div>
</div>