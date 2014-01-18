<?

require_once("updater.php");

class AdminEdit
 {

   public $table;
   public $indexfield;
   public $fields;
   public $captions;
   public $attribs;

   public $dblink;
   public $id;

   public $dbh;

   public $returnlink;
   public $title;


   public function Run($id)
	{

	$this->id = $id;
	$hash = md5($table.$fields);

	if($_REQUEST['hash']==$hash)
	 return $this->Save();
	else
	  return $this->Show($hash);

	 

	}

   public function Show($hash)
	{
	  $id = addslashes($this->id);
	   $query = "SELECT ".$this->fields." FROM ".$this->table." WHERE ".$this->indexfield."=".$id;
	// echo $query;

	$fieldsArray = explode(",",str_replace(" ","",$this->fields));
	$captionsArray = explode(",",$this->captions);

	$result="";


	$res = $this->dbh->query($query);

	  // $res = mysql_query($query);
	  //if($row = @mysql_fetch_array($res))
	$row=$res->fetch();

$hiddenfields="";

//	  if()
		{

		$result.= "<center><h3>".$this->title."</h3></center>
		<form method=post><input type=hidden name=\"hash\" value=\"$hash\">
		<input type=\"hidden\" name=\"hiddenid\" value=\"".$id."\">
		<table class=\"adminlist\" cellspacing=10 cellpadding=10 width=800>	";

		
		for($i=0; $i<count($fieldsArray); $i++)
			{

			if($fieldsArray[$i]==$this->indexfield)
			  continue; // не даем возможности редактировать index field

			switch($this->attribs[$fieldsArray[$i]]["type"])
			{

			case 'list':

			  $list = explode(",",$this->attribs[$fieldsArray[$i]]["list"]);

			 $result.="<tr><td>".$captionsArray[$i]."</td><td><select name=\"".$fieldsArray[$i]."\" >";
			 foreach($list as $v)
			 {
			  $result.="<option value=\"$v\" ".($v==$row[$fieldsArray[$i]]?"selected":"").">$v</option>";
			 }
			 $result.="</select></td></tr>";
			 break;

			case 'listquery':

				$listquery = $this->attribs[$fieldsArray[$i]]["listquery"];
				$lres = $this->dbh->query($listquery);

			 $result.="<tr><td>".$captionsArray[$i]."</td><td><select name=\"".$fieldsArray[$i]."\" >";
				if($this->attribs[$fieldsArray[$i]]["allownull"])
				  $result.="<option value=\"\"></option>";
			 while($lrow=$lres->fetch())
			 {
			  $result.="<option value=\"".$lrow[0]."\" ".($lrow[0]==$row[$fieldsArray[$i]]?"selected":"").">".$lrow[1]."</option>";
			 }
			 $result.="</select></td></tr>";
			 break;

			case 'checkbox':
			    $result.="<tr><td colspan=2 align=left><input type=checkbox name=\"".$fieldsArray[$i]."\" id=\"".$fieldsArray[$i]."\" value=1 ".($row[$fieldsArray[$i]]==1?"checked":"").">
				<label for=\"".$fieldsArray[$i]."\">".$captionsArray[$i]."</label></td></tr>";
			   break;

			case 'calendar':
				 $result.="<tr><td>".$captionsArray[$i]."</td><td>";
				 $result.="<input type=text name=\"".$fieldsArray[$i]."\" value=\"".$row[$fieldsArray[$i]]."\" dojoType=\"dijit.form.DateTextBox\" required=\"false\">";
				 $result.="</td></tr>";
				break;

			case 'htmlarea':
				 $result.="<tr><td valign=top>".$captionsArray[$i]."</td><td>";
				 $result.="<textarea dojoType=\"dijit.Editor\" rows=5 cols=40 style=\"width: 500px; height: 200px;\" id=\"".$fieldsArray[$i]."\" name=\"".$fieldsArray[$i]."\" >".$row[$fieldsArray[$i]]."</textarea>";
				 $result.="</td></tr>";
				break;

			case 'UserID':
				$hiddenfields.="<input type=hidden name=\"".$fieldsArray[$i]."\" value=\"".$_SESSION['uid']."\">";
			    break;

			case 'insertdate': 
			  break; // не выводим никаких полей для этого элемента

			default:
			 $result.="<tr><td>".$captionsArray[$i]."</td><td>";
			 $result.="<input type=text name=\"".$fieldsArray[$i]."\" value=\"".$row[$fieldsArray[$i]]."\">";
			 $result.="</td></tr>";
			}

			}

		$result.="<tr><td colspan=2><input type=submit value=\"Сохранить\" name=Action>
		<input type=submit name=Action value=\"Отменить\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		if($id!=0)
			$result.="<input type=submit name=Action value=\"Удалить\" onclick=\"return confirm('Действительно хотите удалить эту запись?');\">";
		$result.="</td></tr></table>".$hiddenfields."</form>";
		 
		}
	return $result;
	}


   public function Save()
	{

	if($_POST['Action']=="Отменить")
	  {
	   header("Location: ".$this->returnlink);
	  }

	  if($_POST['Action']=="Сохранить")
	   {

	$fieldsArray = explode(",",str_replace(" ","",$this->fields));


	$id = addslashes($_POST['hiddenid']);

	$UpdateMethod = $id==0?0:1;

	 $u = new updater($this->table,$this->indexfield."=".$id,$UpdateMethod,$this->dbh);

		for($i=0; $i<count($fieldsArray); $i++)
			{
			$noadd=false;

			$pvalue=$_POST[$fieldsArray[$i]];

			if($fieldsArray[$i]==$this->indexfield)
			  continue; // не даем возможности редактировать index field

			if($this->attribs[$fieldsArray[$i]]["allownull"] && $pvalue=='')
			  $pvalue=null;

			switch($this->attribs[$fieldsArray[$i]]["type"])
			{
			   case "UserID":
			     $pvalue=$_SESSION['uid'];
			    break;
			   case "insertdate":
			     if($UpdateMethod==0)
				$pvalue=date("Y-m-d H:i");
			    else
				$noadd=true;
			   break;

			   case "checkbox":
				$pvalue=$_POST[$fieldsArray[$i]]==1?1:0;
			   break;
			}

			if(!$noadd)
			 $u->AddParameter($fieldsArray[$i],$pvalue);
			}
	 $u->Run();
	 header("Location: ".$this->returnlink);
	   }
            	  

	  if($_POST['Action']=="Удалить")
	   {

		$id = addslashes($_POST['hiddenid']);
		$this->dbh->query("DELETE FROM ".$this->table." WHERE ".$this->indexfield."='".$id."'");
		 header("Location: ".$this->returnlink);
	   }
	}

 }


?>