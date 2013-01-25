<div class="fn_poll">
       <h4 class="vote_title">{title}</h4>
			[votelist]<form method="post" name="vote" action=''>[/votelist]
			{list}
			<br />
			[voteresult]<div><small>Всего проголосовало: {votes}</small></div>[/voteresult]
			[votelist]
				<input type="hidden" name="vote_action" value="vote" />
				<input type="hidden" name="vote_id" id="vote_id" value="1" />
			</form>
			[/votelist]
        <div align="center">
        	 <ul class="reset">
						<li class="lfield">
                        	<button class="fbutton" type="button" onclick="doVote('results'); return false;" >Результаты</button> <button class="main_botoms" type="submit" onclick="doVote('vote'); return false;" >Голосовать</button> 
                        </li>
                        <li class="lfield">
                        <form method="post" name="vote_result" action=''>
                                <input type="hidden" name="vote_action" value="results" />
                                <input type="hidden" name="vote_id" value="1" />
                                <button type="submit" onclick="ShowAllVotes(); return false;" class="fbutton" >Все опросы</button>
                            </form>
                        </li>
             </ul>
	</div>
</div>