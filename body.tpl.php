<?php
	// SWITCH => PAGE TO LOAD
	require('./.determine_file.php');


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
	require('footer.php');
?>
	</footer>

