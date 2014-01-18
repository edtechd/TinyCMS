<?

class updater
{
	private $_table;
	private $_condition;
	private $_firstRun = true;
	private $_insert = false;
	
	private $_method = 0;
	
	private $fields;
	private $insertfields;
	
	private $values;
	private $insertvalues;
	
	private $_dbh;

	public function __construct($table, $condition, $method, $dbh)
	{
		if($dbh==null)
		{
//		$dsn = "mysql:host=".UTMDBHOST.";dbname=techtomil";
//		$dbh = new PDO($dsn,UTMDBUSER,UTMDBPASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'cp1251\''));
//		$dsn = "mysql:host=".$UTMDB_HOST.";dbname=tech";
//		$dbh = new PDO($dsn,$ROOT_LOGIN,$ROOT_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'cp1251\''));
		}

		$this->_table = $table;
		$this->_condition = $condition;
		$this->_method = $method;
		$this->_dbh = $dbh;		
	}
						
	public function AddParameter($pname, $pvalue)
	{
		$this->fields[$pname]=$pvalue;
		//$this->values[$pname]=$pvalue;
	}

	public function AddInsertParameter()
	{
		$this->insertfields[$pname]=$pvalue;
	}
	
	protected function GetQuery()
	{
		$sqlquery = $this->_insert ? ("INSERT INTO ".$this->_table." ("):("UPDATE ".$this->_table." SET ");
		$insquery="";
		$first = true;

		foreach($this->fields as $field => $value)
		{
			if($this->_insert)
			{
				$sqlquery.= ($first ? "" : ", ").$field;
				$insquery .= ($first ? "" : ", ").":".$field;
			}
			else 
				$sqlquery .= ($first ? "" : ", ").$field."=:".$field;
				
				$first = false;
		}
		
		if($this->_insert)
		{
			if(count($this->insertfields)>0)
				foreach($this->insertfields as $field => $value)
				{
				$sqlquery.= ($first ? "" : ", ").$field;
				$insquery .= ($first ? "" : ", ").":".$field;
				}
			
				/*if($this->_firstRun)
					$values[":".$field] = $this->insertvalues[$field]; */			
			$sqlquery .= ") VALUES (".$insquery.")";	
		}
		else 
			$sqlquery .= " WHERE ".$this->_condition;
		
		return $sqlquery;		
		 
	}
	
	protected function DefineQueryMethod()
	{
		switch($this->_method)
		{
			case 0: // для вставки данных
				$this->_insert = true; break;
			case 1: // для обновления
				$this->_insert = false; break;
			case 2: //
				/*$res = mysql_query("SELECT COUNT(*) FROM ".$this->_table." WHERE ".$this->_condition,$dblink);
				$row = mysql_fetch_array($res);*/
				try {

				$query = "SELECT COUNT(*) FROM ".$this->_table." WHERE ".$this->_condition;
				$res = $this->_dbh->query($query);

				if($res!=null)
				{
					$row=$res->fetch();
					$this->_insert = $row[0]==0;
				}
				else 
					throw new Exception("Ошибка в Check-запросе  $query "); 
				
		} catch(Exception $e)
		{	
			echo $e;
			//123
		}
				
				break;
		}	
	}
	
	public function Run()
	{
		if(count($this->fields)==0)
			return 0;
			
		$this->DefineQueryMethod();
		$query = $this->GetQuery();
		
		if(DEBUG==2)
		{
			echo $query."\n";
			print_r($this->fields);
			return;
		}     
		try {
		$sth = $this->_dbh->prepare($query);
		$sth->execute($this->fields);
		} catch(Exception $e) { 
		echo "Exception: ";
		print_r($e); 
		}


		if( $sth->errorCode()!="00000" )
		{
			echo "Error info: <br>";
			echo $query."<br>";
			print_r($sth->errorInfo());
			print_r($_REQUEST);
			die();
		}


		if($this->_insert)
			$this->_firstRun=false;
			
		return $this->_insert?0:1;
	}
	
	public function RunInsert()
	{
		
	}
	
	public function Table()
	{
	}
	
	public function UpdMethod()
	{
		
	}
}


?>