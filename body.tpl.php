<?php
	// SWITCH => PAGE TO LOAD
	//echo 'dir: ' . $dir . ' cwd: ' . getcwd() .'<br/>';
	$dir = dirname(__FILE__);
	//echo 'dir: ' . $dir;
	require($dir . '/.determine_file.php');


	// Escape unreliable input for HTM as it is put out as heading.
?>
	<!-- PAGE CONTENT -->
	<div id="content" class="limitImageSize <?php echo htmlspecialchars($filename) ?>">
<?php

	// Load
	require($file);

?>
	</div>
	<footer>
<?php
	require($dir . '/footer.php');
?>
	</footer>

