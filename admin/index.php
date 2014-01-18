<?

session_start();

	if(!$_SESSION['registered'])
	  header('Location: login.html');

?>

<html>
<head>
<LINK href="main.css" type="text/css" rel="stylesheet">
</head>
<body>



	<table width="90%" cellspacing=0 cellpadding=0 border=0 class="adm">
	<tr>
	<td class="adm" width="50%" style="BACKGROUND:url(img/head1.gif) repeat-x">
<span class="NewHead">Site content</span></td>
	<td class="adm" width=5>&nbsp;</td>
	<td class="adm" style="BACKGROUND:url(img/head1.gif) repeat-x">
&nbsp;</td>
	</tr><tr><td class="adm" style="BACKGROUND: url(img/block_back.gif) repeat-x 50% bottom">    
    						<ul class="admlinks">
 <li><a href="content.php">Site content</a>
 <li><a href="#">Menu management</a>
 <li><a href="#">News</a>
 <li><a href="#">Additional items</a>
</ul>
</td><td class="adm">&nbsp;</td><td class="adm" style="BACKGROUND: url(img/block_back.gif) repeat-x 50% bottom" valign=top>
&nbsp;
	</td></tr></table>

	<table width="90%" cellspacing=0 cellpadding=0 border=0 class="adm">
	<tr>
	<td class="adm" width="50%" style="BACKGROUND:url(img/head1.gif) repeat-x">
<span class="NewHead">&nbsp;</span></td>
	<td class="adm" width=5>&nbsp;</td>
	<td class="adm" style="BACKGROUND:url(img/head1.gif) repeat-x">
<span class="NewHead">&nbsp;</span></td>
	</tr><tr><td class="adm" style="BACKGROUND: url(img/block_back.gif) repeat-x 50% bottom">    
<a href="/">Go to the site</a>	<br>
<a href="login.php?logout=1">Log out</a>
&nbsp;
</td><td class="adm">
&nbsp;</td>
<td class="adm" style="BACKGROUND: url(img/block_back.gif) repeat-x 50% bottom" valign=top>
&nbsp;
	</td></tr></table>


</body></html>
