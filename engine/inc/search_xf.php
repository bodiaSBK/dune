<?php

if (!defined('DATALIFEENGINE') or !defined('LOGGED_IN')) {
    die("Hacking attempt!");
}

if (!$user_group[$member_id['user_group']]['admin_addnews']) {
    msg("error", $lang['index_denied'], $lang['index_denied']);
}

if ($_SERVER['REQUEST_URI'] == $PHP_SELF . '?mod=search_xf') {

    if ($_POST['fieldHide'] and $_POST['fieldNameAdd'] != null) {
        $fName = $_POST['fieldNameAdd'];
        $status = $_POST['status'] ? $_POST['status'] : 0;
        $db->query("SELECT * FROM " . PREFIX . "_search_blocks WHERE fieldname = '$fName'");
        if ($db->num_rows() > 0) {
            msg("error", "Ошибка",
                    "Такой объект уже присутствует...",
                    "/admin.php?mod=search_xf");
        } else {
            switch($_POST['type'])
			{
				case '0':$type = 'field';break;
				case '1':$type = 'block';break;
				case '2':$type = 'interval';break;
			}
			
            $db->query("INSERT INTO " . PREFIX . "_search_blocks VALUES ('', '$fName','$status','$type')");
            clear_cache();
            msg("info", "Добавление объекта", "Объект успешно добавлен", "/admin.php?mod=search_xf");
        }
    }

    if (isset($_POST['varHideBlockId'])) {

        $block_id = $_POST['varHideBlockId'];

        if (!empty($_POST['varAdd'])) {
            $valField = htmlspecialchars(stripslashes($_POST['varAdd']));
            $valField = explode(',',trim($valField));
            foreach($valField as $value){

                $db->query("INSERT INTO " . PREFIX . "_search_var VALUES ('','$block_id','$value')");
            
            }
            clear_cache();
            header("Location: " . $PHP_SELF . "?mod=search_xf");

        } else {

            msg("Error", "Ошибка",
                    "Вы не заполнили ни одной строчки - объект не добавился",
                    "/admin.php?mod=search_xf");
        }
    }
    if (isset($_POST['intHideBlockId'])) {

        $intval_id = $_POST['intHideBlockId'];

        if (!empty($_POST['intvalAdd'])) {
            $valField = htmlentities(stripslashes($_POST['intvalAdd']));
            $valField = explode(',',$valField);
            foreach($valField as $value){

                $db->query("INSERT INTO " . PREFIX . "_search_intvals VALUES ('','$intval_id','$value')");
            
            }
            clear_cache();
            header("Location: " . $PHP_SELF . "?mod=search_xf");

        } else {

            msg("Error", "Ошибка",
                    "Вы не заполнили ни одной строчки - объект не добавился",
                    "/admin.php?mod=search_xf");
        }
    }

    //Вытяжка дополнительных полей )
    $output = "";
    if (!isset($xfieldsid))
        $xfieldsid = "";
    $xfieldsdata = xfieldsload($xfieldsid);
    foreach ($xfieldsdata as $name => $value) {
        $fieldname = $value[0];
        $fieldtext = $value[1];
        $output .= '<option value="' . $fieldname . '">' . $fieldtext . '</option>';
    }
    echoheader("searchblocks", "Управление поисковыми блоками");

    echo <<< HTML
<div style="padding-top:5px;padding-bottom:2px;">
<table width="100%">
    <tr>
        <td width="4"><img src="engine/skins/images/tl_lo.gif" width="4" height="4" border="0"></td>
        <td background="engine/skins/images/tl_oo.gif"><img src="engine/skins/images/tl_oo.gif" width="1" height="4" border="0"></td>
        <td width="6"><img src="engine/skins/images/tl_ro.gif" width="6" height="4" border="0"></td>
    </tr>
    <tr>
        <td background="engine/skins/images/tl_lb.gif"><img src="engine/skins/images/tl_lb.gif" width="4" height="1" border="0"></td>
        <td style="padding:5px;" bgcolor="#FFFFFF">

<table width="100%">
    <tr>
        <td bgcolor="#EFEFEF" height="29" style="padding-left:10px;"><div class="navigation">Управление поисковыми блоками</div></td>
    </tr>
</table>

<div class="unterline"></div>
<center><h3>{Управление поисковыми блоками}</h3></center>
HTML;

    $global_res = $db->query("SELECT * FROM " . PREFIX . "_search_blocks");
    $content = '';
    $results = '';
    while ($row = $db->get_array($global_res)):

        if (!isset($xfieldsid))
            $xfieldsid = "";
        $xfieldsdata = xfieldsload($xfieldsid);
        foreach ($xfieldsdata as $name => $value) {
            if($row['fieldname'] == $value[0])$fieldtext = $value[1];
            
        }

        switch ($row['type']) {
            case 'block':
                $display_image = $row['status'] ? '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=0"><img src="engine/skins/images/displayoff.png" title="Снять с главной!" border="0"></a></div>' : '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=1"><img src="engine/skins/images/display.png" title="Отображать на главной!" border="0"></a></div>';
                $inner_res = $db->query("SELECT * FROM " . PREFIX . "_search_var WHERE block_id='{$row['id']}' order by id ASC");
                $results .= '<tr><td class="text_block">';
                $count_id = $db->num_rows($inner_res);
                while ($row2 = $db->get_array($inner_res)) :

                    $results .= '<div style="float:left;width:30%;">'.$row2['value'] . '<a href="' . $PHP_SELF . '?mod=search_xf&delvar=' . $row2['id'] . '">[x]</a></div>';
                endwhile;

                $content .= '<div class="block">

                            <center><h3>'.$fieldtext.'</h3><h2>(блок № ' . $row['id'] . ')</h2>
							   <b>{sfblock_'.$row['fieldname'].'}</b>
                                <div class="sel">Вариантов: <span class="select">' . $count_id . '</span>
                                    </div></center>
                                         <div style="padding-top:2px;">
                                             <div class="pu_bg">
                                                ' . $display_image . '
                                                      <div style="float:left;">
                                                      <a href="' . $PHP_SELF . '?mod=search_xf&del=' . $row['id'] . '">
                                                          <img src="/engine/skins/images/krest.png" alt="" border="0">
                                                          </a></div>
                                            </div>
                                        </div>
                                    </div>';

                $results .= '</td><td class="text2_block"><form method="POST">
                                        <input type="hidden" name="varHideBlockId" value="' . $row['id'] . '"/>
                                             <div style="float:left;"><input type="text" name="varAdd" class="inputin"/></div>
                                                    <div style="float:left;"><input type="submit" class="btn" value="' . $row['id'] . '" /> '.$fieldtext.'</div>
                                                         </form></td></tr>';
                break;
            case 'field':

                $display_image = $row['status'] ? '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=0"><img src="engine/skins/images/displayoff.png" title="Снять с главной!" border="0"></a></div>' : '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=1"><img src="engine/skins/images/display.png" title="Отображать на главной!" border="0"></a></div>';

                $fields .= '<div class="block">

                            <center><h3>'.$fieldtext.'</h3><h2>(поле № ' . $row['id'] . ')</h2>
							   <b>{sfield_'.$row['fieldname'].'}</b>
                                <div class="sel">
                                    </div></center>
                                         <div style="padding-top:2px;">
                                             <div class="pu_bg">
                                                ' . $display_image . '
                                                      <div style="float:left;">
                                                      <a href="' . $PHP_SELF . '?mod=search_xf&del=' . $row['id'] . '">
                                                          <img src="/engine/skins/images/krest.png" alt="" border="0">
                                                          </a></div>
                                            </div>
                                        </div>
                                    </div>';

                break;
			case 'interval':
			$display_image = $row['status'] ? '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=0"><img src="engine/skins/images/displayoff.png" title="Снять с главной!" border="0"></a></div>' : '<div class="separator"><a href="' . $PHP_SELF . '?mod=search_xf&display=' . $row['id'] . '&status=1"><img src="engine/skins/images/display.png" title="Отображать на главной!" border="0"></a></div>';
			    $intvalRes = $db->query("SELECT * FROM " . PREFIX . "_search_intvals WHERE intval_id='{$row['id']}'");
                $intVals .= '<tr><td class="text_block">';
 				$count_id = $db->num_rows($intvalRes);
				while ($row2 = $db->get_array($intvalRes)) 
				{
					$interval = explode('-',$row2['value']);
                    $intVals .= '<div style="float:left;width:50%;">От ' . $interval[0] . ' до ' . $interval[1] . '<a href="' . $PHP_SELF . '?mod=search_xf&delintval=' . $row2['id'] . '">[x]</a></div>';
                }
							$intervals .= '<div class="block">
                            <center><h3>'.$fieldtext.'</h3>
							 <div class="sel">Интервалов: <span class="select">' . $count_id . '</span></div></center>
							   <b>{sfintval_'.$row['fieldname'].'}</b>
                                <div class="sel"></div></center>
                                         <div style="padding-top:2px;">
                                             <div class="pu_bg">
                                                ' . $display_image . '
                                                      <div style="float:left;">
                                                      <a href="' . $PHP_SELF . '?mod=search_xf&del=' . $row['id'] . '">
                                                          <img src="/engine/skins/images/krest.png" alt="" border="0">
                                                          </a></div>
                                            </div>
                                        </div>
                                    </div>';
						$intVals .= '</td><td class="text2_block"><form method="POST">
                                   <input type="hidden" name="intHideBlockId" value="' . $row['id'] . '"/>
                                 <div style="float:left;"><input type="text" name="intvalAdd" class="inputin"/></div>
                               <div style="float:left;"><input type="submit" class="btn" value="' . $row['id'] . '" /> '.$fieldtext.'</div>
                             </form></td></tr>';
							break;
        }
    endwhile;


    echo <<< HTML
                <div style="text-align:center;margin: 20px 0 10px 0;">

	<a href="javascript:ShowOrHide('BlockAdd')">
                <img src="engine/skins/images/btn_add.png" alt="Добавить блок" border="0" />
                </a>
    <a href="$PHP_SELF?mod=xfields&xfieldsaction=configure">
                <img src="engine/skins/images/trtoxfields.png" alt="Добавить блок" border="0" />
                </a>

            </div>

            <div id="BlockAdd" style="display:none;">
            <form method="POST">
                <table border="0" style="width:100%;"><tr><td align="center">
                    <table border="0" cellspacing="0" cellpadding="0" style="margin: 0 0 10px 0;">
                        <tr>
                            <td class="name_block"></td>
                                <td class="name_block_checkbox" valign="middle" align="center">
                                    <input type="hidden" name="fieldHide" value="1"/>
                                    <select size="1" name="fieldNameAdd">
                                    $output
                                    </select>
                                </td>
                                <td class="sep_name_block"></td>
                                <td class="view_block"></td>
                            <td class="name_block_checkbox" valign="middle" align="center">

                                <input name="type" type="radio" value="1" />блок
                                <input name="type" type="radio" value="0" />текстовое поле
								<input name="type" type="radio" value="2" />интервал

                            </td>
                                <td class="sep_view_block"></td>
                            <td class="name_block_checkbox" valign="middle" align="center">

                                <input name="status" type="radio" value="1" />показать
                                <input name="status" type="radio" value="0" />не показывать
                            </td>
                            <td valign="middle" align="center">
                                <input type="submit" value="" class="btn_send" />
                            </td>
                        </tr>
                </table>
             </td>
          </tr>
      </table>
</form>
</div>

                <table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
	<tbody><tr>
		<td class="add_text"></td>
		<td class="text_option">( для управления блоками, используйте соотвествующие кнопки )</td>
	</tr>
	<tr>
		<td class="text" colspan="2">

			 $content

		</td>
	</tr>
                </tbody></table>




<table border="0" cellspacing="0" cellpadding="0" style="width:100%;"><tr><td class="ugol_left" width="9"></td><td class="ugol_ct">&nbsp;</td><td class="ugol_right"></td></tr></table>

    <table border="0" cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">
	<tr>
		<td class="add_text_pol"></td>
		<td class="text_option">( для управления полями, используйте соотвествующие кнопки )</td>
	</tr>
	<tr>
		<td align="center" class="text" colspan="2">

                   $fields

		</td>
	</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" style="width:100%;"><tr><td class="ugol_left" width="9"></td><td class="ugol_ct">&nbsp;</td><td class="ugol_right"></td></tr></table>

    <table border="0" cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">
	<tr>
		<td class="add_text_int"></td>
		<td class="text_option">( для управления интервалами, используйте соотвествующие кнопки )</td>
	</tr>
	<tr>
		<td align="center" class="text" colspan="2">

                   $intervals

		</td>
	</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" style="width:100%;"><tr><td class="ugol_left" width="9"></td><td class="ugol_ct">&nbsp;</td><td class="ugol_right"></td></tr></table>

<h1>Варианты Блоков</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:10px;border-collapse:collapse;">
	<tbody><tr>
		<td class="var_text"></td>
		<td class="add2_text"></td>
	</tr>
$results
</tbody></table><br /><br />

<h1>Интервалы</h1>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:10px;border-collapse:collapse;">
	<tbody><tr>
		<td class="var_text"></td>
		<td class="add2_text"></td>
	</tr>
$intVals
</tbody></table>

        </td>
   
        <td background="engine/skins/images/tl_rb.gif"><img src="engine/skins/images/tl_rb.gif" width="6" height="1" border="0"></td>
     <tr>
        <td><img src="engine/skins/images/tl_lu.gif" width="4" height="6" border="0"></td>
        <td background="engine/skins/images/tl_ub.gif"><img src="engine/skins/images/tl_ub.gif" width="1" height="6" border="0"></td>
        <td><img src="engine/skins/images/tl_ru.gif" width="6" height="6" border="0"></td>
    </tr>
</table>
</div>

HTML;
    echofooter();
} elseif (isset($_GET['del'])) {

    $id = intval($_GET['del']);
    $db->query("DELETE FROM " . PREFIX . "_search_blocks WHERE id='{$id}'");
    $db->query("DELETE FROM " . PREFIX . "_search_var WHERE block_id='{$id}'");
	$db->query("DELETE FROM " . PREFIX . "_search_intvals WHERE intval_id='{$id}'");
    clear_cache();
    header("Location: " . $PHP_SELF . "?mod=search_xf");

} elseif (isset($_GET['display']) and isset($_GET['status'])) {

    $id = intval($_GET['display']);
    $status = intval($_GET['status']);
    $db->query("UPDATE " . PREFIX . "_search_blocks set status='$status' WHERE id='$id'");
    clear_cache();
    header("Location: " . $PHP_SELF . "?mod=search_xf");

} elseif (isset($_GET['delvar'])) {

    $id = intval($_GET['delvar']);
    $db->query("DELETE FROM " . PREFIX . "_search_var WHERE id='{$id}'");
    clear_cache();
    header("Location: " . $PHP_SELF . "?mod=search_xf");
	
} elseif (isset($_GET['delintval'])) {

    $id = intval($_GET['delintval']);
    $db->query("DELETE FROM " . PREFIX . "_search_intvals WHERE id='{$id}'");
    clear_cache();
    header("Location: " . $PHP_SELF . "?mod=search_xf");

}
?>