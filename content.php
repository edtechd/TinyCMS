<?
require_once("config.php");
require_once("engine/engine.php");

Templating::SetMasterPage("templates/template2_new.php");

 $alias = $_REQUEST['alias'];

 $res = mysql_query("SELECT * FROM content WHERE alias='".addslashes($alias)."'");
 $row = mysql_fetch_array($res);
 
 $title = $row['Caption'];
 $content = str_replace("&not;","",$row['Content']);

?>
<div class="content">
<?=$content?>
</div>
<?
Templating::Render($dblink, array_diff(get_defined_vars(), array(array())));
?>
