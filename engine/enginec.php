<?

class Engine 
	{

		public static function GetCalendarCode($EntryName)
		{
			$result="";
			$result.="   <script language=\"javascript\">\n".
				"      function setStartDate(selectedDate) {\n".
				"       if (selectedDate!=null)\n".
				"        document.Form1.".$EntryName.".value=((selectedDate.getDate())+\".\"+(selectedDate.getMonth()+1)+\".\"+selectedDate.getFullYear());\n".
				"      }\n".
				"	</script>\n".
				"<!--   obout inc Calendar version 2.3.0.0  http://www.obout.com   -->\n".
				"<style type=\"text/css\">\n".
				".calendarCalendarDefault {border:1px solid #999999;background-color:#FFFFFF;text-align:left;}\n".
				".calendarTitleDefault {font:bold 12px Tahoma;color:#333333;text-align:center;padding-bottom:6px;padding-top:2px;}\n".
				".calendarArrowLeftDefault { font:bold 12px Tahoma;color:#333333;text-align:center;padding-left:4px;padding-right:4px;padding-bottom:6px;padding-top:2px;cursor:pointer; cursor:hand;}\n".
				".calendarArrowRightDefault {font:bold 12px Tahoma;color:#333333;text-align:center;padding-left:4px;padding-right:4px;padding-bottom:6px;padding-top:2px;cursor:pointer; cursor:hand;}\n".
				".calendarMonthDefault {background-color:#F6F6F6;border:1px solid #dddddd;}\n".
				".calendarMonthTitleDefault {font:bold 12px Tahoma;text-align:center;padding:4px;color:#333333;}\n".
				".calendarDayNameDefault {font:bold 11px Tahoma;color:#333333;text-align:center;}\n".
				".calendarDayDefault {font:11px Tahoma;color:#333333;text-align:center;padding:1px;border:1px solid #F6F6F6;cursor:pointer; cursor:hand;}\n".
				".calendarDayTodayDefault {font:bold 11px Tahoma;color:navy;text-align:center;padding:1px;background-color:#99ccee;border:1px solid #ECECEE;cursor:pointer; cursor:hand;}\n".
				".calendarDayDisabledDefault {font:11px Tahoma;color:#C0C2C1;text-align:center;padding:1px;border:1px solid #F6F6F6;}\n".
				".calendarDaySelectedDefault {font:bold 11px Tahoma;color:maroon;text-align:center;border:1px solid crimson;background-color:gold;}\n".
				".calendarDaySpecialDefault {font:bold 11px Tahoma;color:crimson;text-align:center;padding:1px;border:0px solid #993766;}\n".
				".calendarDatePickerButtonDefault {cursor:pointer; cursor:hand;vertical-align:bottom;}\n".
				"</style><img src=\"/calendar/picker.jpg\" id=\"_Calendar".$EntryName."1Button\" alt=\"Select date\" title=\"Select date\" class=\"calendarDatePickerButtonDefault\" onclick=\"Calendar".$EntryName."1.Ih(event);\" /><div id=\"_Calendar".$EntryName."1Container\" style=\"overflow:hidden;position:relative;display:none;\" class=\"calendarCalendarDefault\" onclick=\"event.cancelBubble=true; if(event.stopPropagation) {event.stopPropagation();}\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" class=\"calendscript\"><tr><td  class=\"calendscript\" class=\"calendscript\"><div class=\"calendarArrowLeftDefault\" onclick=\"Calendar".$EntryName."1.ig('Calendar".$EntryName."1.lc()');\">&lt;&lt;</div></td><td  class=\"calendscript\" width=\"100%\"><div class=\"calendarTitleDefault\">Год: <select id=\"_Calendar".$EntryName."1DD\" onChange=\"Calendar".$EntryName."1.ig('Calendar".$EntryName."1.oa(' + (12*(parseInt(this.options[this.selectedIndex].value,10) - Calendar".$EntryName."1.o1)-Calendar".
				$EntryName."1.l0*Calendar".$EntryName."1.i0+1) + ');Calendar".$EntryName."1.ic(null, null, true);');\"><option value=\"2001\">2001</option><option value=\"2002\">2002</option><option value=\"2003\">2003</option><option value=\"2004\">2004</option><option value=\"2005\">2005</option><option value=\"2006\">2006</option><option value=\"2007\">2007</option><option value=\"2008\">2008</option><option value=\"2009\" ".(date('Y')=='2009'?'selected':'').">2009</option><option value=\"2010\" ".(date('Y')=='2010'?'selected':'').">2010</option><option value=\"2011\" ".(date('Y')=='2011'?'selected':'').">2011</option></select></div></td><td  class=\"calendscript\"><div class=\"calendarArrowRightDefault\" onclick=\"Calendar".$EntryName."1.ig('Calendar".$EntryName."1.ib()');\">&gt;&gt;</div></td></tr></table><div style=\"position:relative;overflow:hidden;left:0px;width:800%;\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"position:relative;\" class=\"calendscript\"><tr></tr></table></div></div><IFRAME id=\"_Calendar".$EntryName."1iframe\" style=\"DISPLAY:none; POSITION:absolute; LEFT:0px; TOP:0px;\" src=\"javascript:false;\" frameBorder=\"0\" scrolling=\"no\"></IFRAME>\n".
				"<script type=\"text/javascript\" src=\"/calendar/calendarscript/oboutCalendar2.js\"></script>\n".
				"<script type=\"text/javascript\">var Calendar".$EntryName."1;initCalendar_Calendar".$EntryName."1(0);function initCalendar_Calendar".$EntryName."1(attempts) {if(typeof(oboutCalendar) == \"undefined\"){if(attempts < 6){window.setTimeout(\"initCalendar_Calendar".$EntryName."1(\" + (attempts+1) + \")\", 500);}else{alert(\"oboutCalendar2.js cannot be found.  Please check the file's location:\\n\\n~/calendar/calendarscript/oboutCalendar2.js\");}return;}try {Calendar".$EntryName."1 = new oboutCalendar(\"Calendar".$EntryName."1\",25,220,140,5,1,1,new Date(".date('Y').",".(date('m')-1).",".date('d')."),null,null,new Date(".date('Y').",".(date('m')-1).",".date('d')."),\"Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь\",\"Янв,Фев,Мар,Апр,Май,Июн,Июл,Авг,Сен,Окт,Ноя,Дек\",\"Воскресенье,Понедельник,Вторник,Среда,Четверг,Пятница,Суббота\",\"Вс,Пн,Вт,Ср,Чт,Пт,Сб\",1,new Array(),new Array(),new Array(),null,null,true,0,0,\"\",\"dd.MM.yyyy\",\"MMMM, yyyy\",1,true,true,true,null,null,\"calendarMonthDefault\",\"calendarMonthTitleDefault\",\"calendarDayNameDefault\",\"calendarDayDefault\",\"calendarDayDisabledDefault\",\"calendarDaySpecialDefault\",\"calendarDayTodayDefault\",\"calendarDaySelectedDefault\");Calendar".$EntryName."1.onClientDateChanged=setStartDate;if(Calendar".$EntryName."1.c != \"2.3.0.0\")alert(\"obout Calendar DLL and oboutCalendar2.js versions do not match.\\n\\nDLL version 2.3.0.0\\noboutCalendar2.js version \" + Calendar".$EntryName."1.c);} catch(e){alert(\"There was an error initializing obout Calendar with ID Calendar".$EntryName."1.\\n\\n\" + e + \"\\n\\nPlease contact support@obout.com for help.\");}}</script>\n".
				//   "<script type=\"text/javascript\">var Calendar".$EntryName."1;initCalendar_Calendar".$EntryName."1(0);function initCalendar_Calendar2(attempts) {if(typeof(oboutCalendar) == \"undefined\"){if(attempts < 6){window.setTimeout(\"initCalendar_Calendar".$EntryName."1(\" + (attempts+1) + \")\", 500);}else{alert(\"oboutCalendar2.js cannot be found.  Please check the file's location:\\n\\n~/calendar/calendarscript/oboutCalendar2.js\");}return;}try {Calendar".$EntryName."1 = new oboutCalendar(\"Calendar".$EntryName."1\",25,175,140,5,1,1,new Date(2007,3,18),null,null,new Date(2007,3,18),\"Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь\",\"Янв,Фев,Мар,Апр,Май,Июн,Июл,Авг,Сен,Окт,Ноя,Дек\",\"Воскресенье,Понедельник,Вторник,Среда,Четверг,Пятница,Суббота\",\"Вс,Пн,Вт,Ср,Чт,Пт,Сб\",1,new Array(),new Array(),new Array(),null,null,false,0,0,\"\",\"dd.MM.yyyy\",\"MMMM, yyyy\",1,true,true,true,null,null,\"calendarMonthDefault\",\"calendarMonthTitleDefault\",\"calendarDayNameDefault\",\"calendarDayDefault\",\"calendarDayDisabledDefault\",\"calendarDaySpecialDefault\",\"calendarDayTodayDefault\",\"calendarDaySelectedDefault\");Calendar".$EntryName."1.onClientDateChanged=setEndDate;if(Calendar".$EntryName."1.c != \"2.3.0.0\")alert(\"obout Calendar DLL and oboutCalendar2.js versions do not match.\\n\\nDLL version 2.3.0.0\\noboutCalendar2.js version \" + Calendar".$EntryName."1.c);} catch(e){alert(\"There was an error initializing obout Calendar with ID Calendar".$EntryName."1.\\n\\n\" + e + \"\\n\\nPlease contact support@obout.com for help.\");}}</script>"+
				"<!--   obout inc Calendar version 2.3.0.0  http://www.obout.com   -->\n";

			return $result;
		}

		public static function GetMicroTime()
		{
		   $mtime = microtime(); 
		   $mtime = explode(" ",$mtime); 
		   $mtime = $mtime[1] + $mtime[0]; 
		   return $mtime;
		}

		function DateAdd($interval, $number, $date) {

		    $date_time_array = getdate($date);
		    $hours = $date_time_array['hours'];
		    $minutes = $date_time_array['minutes'];
		    $seconds = $date_time_array['seconds'];
		    $month = $date_time_array['mon'];
		    $day = $date_time_array['mday'];
		    $year = $date_time_array['year'];

		    switch ($interval) {
    
		        case 'yyyy':
		            $year+=$number;
		            break;
		        case 'q':
		            $year+=($number*3);
		            break;
		        case 'm':
		            $month+=$number;
		            break;
		        case 'y':
		        case 'd':
		        case 'w':
		            $day+=$number;
		            break;
		        case 'ww':
		            $day+=($number*7);
		            break;
		        case 'h':
		            $hours+=$number;
		            break;
		        case 'n':
		            $minutes+=$number;
		            break;
		        case 's':
		            $seconds+=$number; 
		            break;            
		    }
		       $timestamp= mktime($hours,$minutes,$seconds,$month,$day,$year);
		    return $timestamp;
		}


	public static function GetInputLine($name, $value, $description)
	{
	   return "<tr><td valign=\"Top\">".$description.":</td><td><input type=text name=".$name." value='".$value."' size=40></td></tr>";
	}

	public static function GetSaveButtons()
	{
	  return "<tr>	<td vAlign=\"middle\" align=\"center\" colSpan=\"2\">
					<input type=\"submit\" name=\"SaveButton\" value=\"Сохранить\" id=\"SaveButton\" />
						&nbsp;
						<input type=\"submit\" name=\"CancelButton\" value=\"Отменить\" id=\"CancelButton\" />
					</td>
				</tr>";

	}

	public static function GetSelectListO($selectname, $table, $valuefield, $namefield, $order, $curvalue, $dblink, $empvalue = "", $selargs="")
	{
	 $slist = "<select id=\"$selectname\" name=\"$selectname\" ".$selargs."><option value=\"\">".$empvalue."</option>";
	$query = "SELECT DISTINCT $valuefield, $namefield FROM $table".($order!=""?(" ORDER BY ".$order):"");
	
	if($_REQUEST['debug']==1)
		echo $query."<br>";

		if($dblink==0)
			$result = mysql_query($query);
		else		
			$result = mysql_query($query, $dblink);

		if(@mysql_num_rows($result)==0)
		  return "";
		while($rows = @mysql_fetch_array($result, MYSQL_NUM ))
		{
		  $slist .= "<option value=\"".$rows[0]."\"".($rows[0]==$curvalue?" selected":"").">".$rows[1]."</option>";
		}
		$slist.="</select>";		
	// $slist.="SELECT $valuefield, $namefield FROM $table";
	return $slist;
	}

	public static function GetSelectList($selectname, $table, $valuefield, $namefield, $curvalue, $dblink)
	{
	return Engine::GetSelectListO($selectname, $table, $valuefield, $namefield, "", $curvalue, $dblink);
	}


	public static function GetSelectListSource($selectname, $data, $curvalue, $empvalue = "")
	{
	 $slist = "<select name=\"$selectname\"><option value=\"\">".$empvalue."</option>";

	foreach($data as $value)
		{
		  $slist .= "<option value=\"".$value."\"".($value==$curvalue?" selected":"").">".$value."</option>";
		}
		$slist.="</select>\n";		

	return $slist;
	}


	public static function GetSqlDate($hdate=0)
	{
	if($hdate==0)
	{
	 return date("Y-m-d H:i");
	}

		 $pattern = '/(\d+).(\d+).(\d+)/i';
		 $replacement = '$3-$2-$1';
	 return preg_replace($pattern, $replacement, $hdate);

	}

	public static function GetDateTime($hdate)
	{
		 $pattern = '/(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/i';
		 $replacement = '$3.$2.$1 $4:$5';
	 return preg_replace($pattern, $replacement, $hdate);

	}

	public static function GetDate($hdate)
	{
		 $pattern = '/(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)/i';
		 $replacement = '$3.$2.$1';
	 $result = preg_replace($pattern, $replacement, $hdate);
	 if($result!=$hdate)
		return $result;

		 $pattern = '/(\d+)-(\d+)-(\d+)/i';
		 $replacement = '$3.$2.$1';
	 return preg_replace($pattern, $replacement, $hdate);

	}


	public static function date_ru($formatum, $timestamp=0) {
	  if (($timestamp <= -1) || !is_numeric($timestamp)) return '';
	  $q['д'] = array(-1 => 'w', 'воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота');
	  $q['Д'] = array(-1 => 'w', 'Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота');
	  $q['к'] = array(-1 => 'w', 'вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб');
	  $q['К'] = array(-1 => 'w', 'Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб');
	  $q['м'] = array(-1 => 'n', '', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь');
	  $q['М'] = array(-1 => 'n', '', 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
	  $q['р'] = array(-1 => 'n', '', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	  $q['н'] = array(-1 => 'n', '', 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек');
	  $q['Н'] = array(-1 => 'n', '', 'Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек');
	
	  if ($timestamp == 0)
	    $timestamp = time();
	  $temp = '';
	  $i = 0;
	  while ( (strpos($formatum, 'д', $i) !== FALSE) || (strpos($formatum, 'Д', $i) !== FALSE) || 
	          (strpos($formatum, 'к', $i) !== FALSE) || (strpos($formatum, 'К', $i) !== FALSE) || 
	          (strpos($formatum, 'м', $i) !== FALSE) || (strpos($formatum, 'М', $i) !== FALSE) || 
	          (strpos($formatum, 'н', $i) !== FALSE) || (strpos($formatum, 'Н', $i) !== FALSE) || (strpos($formatum, 'р', $i) !== FALSE)) {
	    $ch['д']=strpos($formatum, 'д', $i);
	    $ch['Д']=strpos($formatum, 'Д', $i);
	    $ch['к']=strpos($formatum, 'к', $i);
	    $ch['К']=strpos($formatum, 'К', $i);
	    $ch['м']=strpos($formatum, 'м', $i);
	    $ch['М']=strpos($formatum, 'М', $i);
	    $ch['н']=strpos($formatum, 'н', $i);
	    $ch['Н']=strpos($formatum, 'Н', $i);
	    $ch['р']=strpos($formatum, 'р', $i);
	    foreach ($ch as $k=>$v)
	      if ($v === FALSE)
	        unset($ch[$k]);
	    $a = min($ch);
	    $temp .= date(substr($formatum, $i, $a-$i), $timestamp) . $q[$formatum[$a]][date($q[$formatum[$a]][-1], $timestamp)];
	    $i = $a+1;
	  }
	  $temp .= date(substr($formatum, $i), $timestamp);
	  return $temp;
	}


	}




?>