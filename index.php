<?
require_once("config.php");
require_once("engine/engine.php");

Templating::SetMasterPage("templates/template_main.php");

$title="";
$alias="/";

?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Welcome to Tiny CMS</h1>
        <p>This is very simple cms, but it contains complete set of the management tools.</p>
		<p>We can use Twitter Bootstrap to create sites faster.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="/admin" role="button">View management panel &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->

<?
Templating::Render($dblink,array_diff(get_defined_vars(), array(array())));
?>
