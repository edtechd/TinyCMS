<?

class Templating
{

public static $masterpage;
public static $dblink;

public static function SetMasterPage($file)
{
	ob_start();
	self::$masterpage = $file;
}

// в переменной $vars передаются переменные из основного пространства имен
public static function Render($dblink, $vars)
{

	$PageContent = ob_get_contents();
	ob_end_clean();

	$title = $vars['title'];

	include(self::$masterpage);	
}


}

?>