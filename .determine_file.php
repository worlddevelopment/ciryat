<?php
	// SWITCH => PAGE TO LOAD
	if (!isset($_GET['id']))
	{
		$_GET['id'] = isset($_SESSION['id']) ? $_SESSION['id'] : '';
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
	if (empty($_GET['id']))
	{
		$lang = getLang();
		if ($lang == 'de')
			$filename = $startDE;
		else
			$filename = $startEN;
		//echo '<div style="position:fixed;top:1px;left:1px;">filename: ' . $filename . '</div>';
	}
			// TODO somehow use the above to translate and retranslate
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
	$file = $filename;
	if (!file_exists($file))
		$file = $directory.$filename;
	$lang = getLang();
	if (!file_exists($file))
		$file = './'.$directory.$lang.'__'.$filename.$loggedInAddition.'.php';
	if (!file_exists($file))
		$file = './'.$directory.$filename.$loggedInAddition.'.php';
	if (!file_exists($file))
	{
		if (strpos('.', $filename) !== 0)
		{
			// tried hidden file, toggle (add dot)
			$file = './'.$directory.'.'.$filename.$loggedInAddition.'.php';
		}
		else
		{
			// toggle (remove dot)
			$file = './'.$directory.'.'.substr($filename, 1).$loggedInAddition.'.php';
		}
		if (!file_exists($file))
		{
			// Is it a directory?
			if (is_dir($filename))
			{
				$directory = $filename . '/';
				$filename = "index";
			}
			// TODO Check for more file endings (see DynamicMenu).
			$file = './'.$directory.'/'.$filename.$loggedInAddition.'.php';
			// This is in harmony with what is done in DynamicMenu that creates type=&id=. It's a bonus.
			// TODO Not forget side effect that filename.php and filename/ no longer can both appear in the menu?

			if (!file_exists($file))
			{
				$file = './error404.php';
			}
		}
	}
?>
