<?
 include_once("../config.php");

 $login = str_replace("'","''",$_REQUEST["UserName"]);
 $password = str_replace("'","''",$_REQUEST['UserPassword']);
 $logout = str_replace("'","''",$_REQUEST['logout']);

 if($logout=='1')
  {
	session_start();
	$_SESSION['registered'] = false;
	header('Location: /');
  }

 if($login==ROOTLOGIN && $password==ROOTPASSWORD)
   {
	session_start();
	$_SESSION['registered'] = true;
	//echo $_SESSION['registered'];
	header('Location: index.php');
   }

?>