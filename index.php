<?php
//echo __FILE__;
$target = dirname(__FILE__);
if (is_link(__FILE__))
	$target = readlink(__FILE__);
//echo $target;
include_once($target . "/.functions.inc.php");
include_once($target . "/dynamic_menu/dynamicmenu.config.php");
include_once("./dynamicmenu.config.php");
include("./.site.php");
?>
