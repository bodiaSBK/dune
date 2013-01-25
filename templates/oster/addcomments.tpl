<div class="oc_content">
		<table class="tableform">
			<tr>
				<td colspan="2" class="editorcomm">{editor}</td>
			</tr>
			<tr>
				<td>
					[question]
					<div>Вопрос: {question}</div>
					<div><input type="text" name="question_answer" id="question_answer" value="Введите ответ" onblur="if(this.value=='') this.value='Введите ответ';" onfocus="if(this.value=='Введите ответ') this.value='';" style="width:115px" class="f_input" /></div><div style="display:none;"><a href="http://yephone.ru" title="Игры для iphone">Игры для iphone</a></div> <div style="display:none;"><a href="http://ipozdravil.ru/happy-birthday" title="Поздравленияс днём рождения">Поздравленияс днём рождения</a></div>
					[/question]
					[sec_code]<div>{sec_code}</div>
					<div><input type="text" name="sec_code" value="Введите код" onblur="if(this.value=='') this.value='Введите код';" onfocus="if(this.value=='Введите код') this.value='';" id="sec_code" style="width:115px" class="f_input" /></div>	
                    [/sec_code]
                    [recaptcha]<div>{recaptcha}</div>[/recaptcha]
				</td>
				<td>
                	[not-logged]
                    <ul class="reset">
						<li class="lfield"><input type="text" name="name" id="name" value="Имя" onblur="if(this.value=='') this.value='Имя';" onfocus="if(this.value=='Имя') this.value='';" class="f_input" style="width: 94%;" /></li><div style="display:none;"><a href="http://yephone.ru" title="Игры для iphone">Игры для iphone</a></div> <div style="display:none;"><a href="http://ipozdravil.ru/happy-birthday" title="Поздравленияс днём рождения">Поздравленияс днём рождения</a></div>
                    <li class="lfield"><input type="text" name="mail" id="mail" value="E-Mail" onblur="if(this.value=='') this.value='E-Mail';" onfocus="if(this.value=='E-Mail') this.value='';" class="f_input" style="width: 94%;" /></li>
                    </ul>[/not-logged]
                </td>
			</tr>
		</table>
        	<button type="submit" name="submit" class="main_botoms"><span>[not-aviable=comments]Сказать[/not-aviable][aviable=comments]Изменить[/aviable]</span></button>
</div>