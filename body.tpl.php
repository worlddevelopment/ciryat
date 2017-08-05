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

		<ul id="links">
			<li>
				<a class="header-logo-invertocat" href="https://github.com/worlddevelopment" data-hotkey="g d" aria-label="Github" data-ga-click="Header, go to dashboard, icon:logo" style="color:white;">
					<svg aria-hidden="true" fill="white" class="octicon octicon-mark-github" height="28" version="1.1" viewBox="0 0 16 16" width="28">
						<path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z">
						</path>
					</svg>
				</a>
			</li>
		</ul>

	</div>
