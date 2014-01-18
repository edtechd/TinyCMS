<?

        $dblink=mysql_connect(DBHOST, DBUSER, DBPASS);
	mysql_select_db(DBNAME, $dblink);
	mysql_query("SET NAMES cp1251", $dblink);

	function ReturnOnceValue($dblink, $query)
	{
	// echo $query;
		$result = mysql_query($query, $dblink);

		if($rows = mysql_fetch_array($result, MYSQL_NUM))
			 $v = $rows[0];
		else
			$v="";
		return $v;

	}

	function ReturnRowset($dblink, $query)
	{
	 //echo $query;
	 //echo $dblink;
		$result = mysql_query($query, $dblink);

		if($rows = mysql_fetch_array($result, MYSQL_NUM))
		{
			//mysql_free_result($result);
			//echo $rows[0];
			 return $rows;
		}
		else
		{
			//mysql_free_result($result);
			//echo "1";
			return null;
		}

	}

	function GetConnection()
	{
	$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME;
	$dbh = new PDO($dsn,DBUSER,DBPASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'cp1251\''));
	return $dbh;
	}

?>