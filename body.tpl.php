<?php
	// SWITCH => PAGE TO LOAD
	if (!isset($_GET['id']))
	{
		$_GET['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : '';
	}
	//
	if (isset($_POST['task']) && $_POST['task'] != 'logout'
		|| isset($_SESSION['usr']))
	{
		?>
			<!-- MESSAGE -->
			<div id="message" class="">
			</div>
		<?php
	}

	// Check for desired (or home|index) page or fall back to error 404
	$loggedInAddition = isset($_SESSION['usr']) ? '.in' : '';

	// Determine folder
	$directory = '';
	if (isset($_GET['dir']))
	{
		$directory = $_GET['dir'];
	}
	else if (isset($_GET['type']))
	{
		$directory = $_GET['type'];
	}
	// Reduce risk by limiting possible characters as a file path is built from it.
	$directory = preg_replace('/[^-A-Za-z_.]/', '', $directory) . '/';

	// Determine filename
	$filename = 'home';
	if (!empty($_GET['id']))
	{
		$filename = preg_replace('/[^-A-Za-z_.]/', '', $_GET['id']);
		//$ending = '.php'; convention to use only .php renders this code obsolete
		//if (!endsWith($file, $ending)
		//{
		//	$filename .= $ending;
		//}
	}
	// Determine file
	$file = './'.$directory.$filename.$loggedInAddition.'.php';
	if (!file_exists($file))
	{
		if (strpos('.', $filename) !== 0)
		{
			$file = './'.$directory.'.'.$filename.$loggedInAddition.'.php';
		}
		else
		{
			$filename = substr($filename, 1);
		}
		if (!file_exists($file))
		{
			$file = './error404.php';
		}
	}


	// Escape unreliable input for HTM as it is put out as heading.
?>
	<!-- PAGE CONTENT -->
	<div id="content" class="limitImageSize <?php echo htmlspecialchars($filename) ?>">
	<?php
	if ($_GET['id'] != 'home' && $_GET['id'] != '.home' && $_GET['id'] != '#home')
	{
		?>
			<h1 class="title">
				<?php echo toFairy($_GET['id']) ?>
			</h1>
		<?php
	}

	// Load
	require($file);

?>
	</div>
