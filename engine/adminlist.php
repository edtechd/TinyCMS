<?

require_once("adminedit.php");

class AdminList
 {


   public $title;
   public $table;
   public $fields;
   public $captions;
   public $attribs;
   public $indexfield;

   public $where;
   public $order;

   public $dbh;
   public $mode;

   public $edit_table;
   public $edit_indexfield;
   public $edit_fields;
   public $edit_captions;
   public $edit_attribs;
   public $edit_returnlink;
   public $edit_title;

   public $action;

	public function __construct($action, $dbh, $mode)
	{
		$this->action = $action;
		$this->dbh = $dbh;
		$this->mode = $mode;
	}

  public function Run()
	{
	   if($this->mode=="edit")
		{
		$a = new AdminEdit();
		
		$a->dbh = $this->dbh;

		$a->table = $this->edit_table!="" ? $this->edit_table : $this->table;
		$a->indexfield = $this->edit_indexfield!="" ? $this->edit_indexfield : $this->indexfield;
		$a->fields = $this->edit_fields!="" ? $this->edit_fields : $this->fields;
		$a->captions = $this->edit_captions != "" ? $this->edit_captions : $this->captions;
		$a->title = $this->edit_title != "" ? $this->edit_title : $this->title;
		$a->attribs = $this->edit_attribs;

		/* $a->attribs["bannertype"]["type"]="list";
		$a->attribs["bannertype"]["list"]="img,swf"; */

		$a->returnlink = $this->edit_returnlink;
		
		return $a->Run($_REQUEST['ID']);

		}
	   else
	 	return $this->Show();
	}


  public function Show()
	{

	$fieldsArray = explode(",",$this->fields);
	$captionsArray = explode(",",$this->captions);

	$query = "SELECT ".$this->fields." FROM ".$this->table;
	// echo $query;

	if($this->where!="")
	  $query .= " WHERE ".$this->where;

	if($this->order!="")
	  $query .= " ORDER BY ".$this->order;


	$res = $this->dbh->query($query);

	if(! $res)
		{
		  echo "error ".$query;
		  die();
		 
		}

	$hash=md5($table.$fields.$captions);

	/* $result.="<form method=post name=".$hash.">
	<input type=hidden name=adminedit value=0>
	<input type=hidden name=returnlink value=\"".$_SERVER['REQUEST_URI'] ."\">";
	</form>
	<script language=javascript>
	</script>"; */

	$width = $this->attribs["width"]>0?$this->attribs["width"]:800;

	$result.="<center><h3>".$this->title."</h3></center>
	<div class=\"addlink\" style=\"\">
	<a href=\"?mode=edit&ID=0\">Добавить запись</a>
	</div>
	<table width=$width cellpadding=5 class=\"adminlist\">
		<tr  style=\"background-color: #EFEFEF; font-weight: bold;\">";

	foreach($captionsArray as $v)
	 {
	   $result .="<td><b>".$v."</b></td>";
	 }

	$result .="</tr>";

	while(	$row=$res->fetch(PDO::FETCH_NUM))
	 {
	   $result.="<tr>";
	   $idvalue="";
	   $i=0;

	    foreach($row as $key => $v)
		{
		  $i++;
		  if($key==$this->indexfield)
		    $idvalue=$v;

		$ctext=$v;

		$k_attribs = ($this->attribs[$fieldsArray[$key]]);

		if(!$k_attribs["nolink"])
		 {
		  $linkstart="<a href=\"?mode=edit&ID={ID}\">";
		  $linkend="</a>";
		 }
		else
		{
		  $linkstart="";
		  $linkend="";
		}

		 switch($k_attribs["format"])
		  {
			case "date":
			  $ctext = Engine::GetDate($v);
			 break;
			case "datetime":
			  $ctext = Engine::GetDateTime($v);
			 break;
			case "bool":
			  $ctext = "<img src=\"/img/".($v==1?"true":"false").".png\" border=0>";		
			 break;
			case "null":
			  if($ctext==0)
			   $ctext="";
			break;
		  }


		  $result.="<td>".$linkstart.$ctext.$linkend."</td>";

		}

	  $result = str_replace("{ID}",$idvalue,$result);

	  $result.="</tr>";
	 }

	$result .="</table>";

	return $result;

	}
    

 }


?>