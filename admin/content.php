<?
session_start();

require_once("../config.php");
require_once("../engine/engine.php");
require_once("../engine/adminlist.php");

Templating::SetMasterPage("../templates/template_admin.php");

$dbh = GetConnection();

$action = preg_replace('[^a-zA-Z0-9]', '', $_REQUEST['action']);
$mode = $_REQUEST['mode'];
$a = new AdminList($action, $dbh, $mode);


$a->indexfield = "ContentID";
$a->table = "content";
$a->fields = "Caption";

$a->captions = "Caption";
//$a->pencil = true;

$a->edit_title = "Change content";
$a->title = "Content management";

$a->edit_fields = "Caption,Alias,Content";


$a->edit_attribs["Content"]["type"]="textarea";


?>
<div class="container">
<div class="row content">
<div class="col-md-12">
<? echo $a->Run(); 

if($mode!="edit") {
?>
<br/><br/>
<a href="/admin/">&laquo; Back.</a>
<? } ?>
</div>
</div>
</div>
<?
$a = null;
$dbh = null;
Templating::Render($dblink, array_diff(get_defined_vars(), array(array())));
?>
