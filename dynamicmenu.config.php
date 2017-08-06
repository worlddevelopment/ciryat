<?php
/**********************************
 | Dynamic Menu configuration
 |
 **********************************/



# START PAGE
$startEN = 'index.php'; // HACK: If home is a directory, then home/index.php is loaded and the check then is index in startPages in DynamicMenu.class.php
$startDE = 'index.php';

# EXCEPTIONS
$e = array(
	'index.php',
	'db.inc.php',
	'dynamicmenu.config.php',
	'dynamicmenu.cfg.php',
	'Archive',
	'archive',
	'impressum.html',
	'sonstiges.html',
	'other_information.html',
	'DynamicMenu.class.php',
	'error.php',
	'error404.php',
	'body.tpl.php',
	'top.tpl.php',
	'bottom.tpl.php',
	'foot.tpl.php',
	'files',
	'images',
	'README',
	'README.md',
	'LICENSE',
	'LICENSE.txt'
	,'present'
// Not related files from /var/www (because ciry.at points to this root directory for short file reference)
,'0ad'
,'Amtsmodule'
,'Anuschka'
,'Babyglueck'
,'Bewerbung_Kaserne_Altenstadt.odt'
,'Bewerbung_Polizei_Ostallgaeu.odt'
,'Blog.class.php'
,'Brice'
,'Castle'
,'CattleTool'
,'Chat'
,'Design'
,'DrawDepartment.class.php'
,'DynMenu.class.php'
,'DynamicMenu.class.php'
,'Endor'
,'Eragon'
,'FairyTale'
,'FileShark'
,'HiWi'
,'HowTo'
,'Img'
,'Installer'
,'Jean'
,'LUMIX-Videos'
,'Libellenflug'
,'Lord'
,'Modellbau'
,'NMLab'
,'Page.class.php'
,'Savoniuswindcalculator7.ods'
,'Savoniuswindcalculator7_Electrodus_ext_Radagast.ods'
,'SevenHorses'
,'SevenMagics'
,'Sokrates'
,'TaleTree'
,'Tanoth'
,'Tools'
,'Uni'
,'Unibert'
,'User.class.php'
,'_IMAGEFORMAT_sets_height.html'
,'_UNSERE_BUCHLINSE-bookmicroscope.html'
,'ai-client-html'
,'ai-typo3'
,'ai-vat'
,'aimeos-core'
,'aimeos-typo3'
,'aimeos__17_7_0'
,'aimeos_quadzz'
,'angelika_hirschberg'
,'angelika_hirschberg_site'
,'angelika_hirschberg_t3template'
,'aqi8'
,'aqi8t3'
,'astronomy'
,'aufgaben_db.war'
,'cgi-bin'
,'dynamic_menu'
,'dynamic_site'
,'dynamicmenu.config.php'
,'fairyclasses.css'
,'fairydrag.class.js'
,'fairytale.js'
,'fileshark.cfg.php'
,'filter.js'
,'fitness_stall'
,'fitness_stall.git'
,'fonts'
,'functions.inc.php'
,'functions2.inc.php'
,'functions2i.inc.php'
,'hamag'
,'hamag_maschinenbau'
,'hamag_t3template'
,'hg'
,'images'
,'img'
,'index.html'
,'js'
,'kurse'
,'lib.debug.php'
,'lohtax'
,'lohtax_t3template'
,'mediacolumn.css'
,'middleearth'
,'mods'
,'music'
,'music.git'
,'opensourceecology'
,'quadzz'
,'robots.txt'
,'shell__aimeos_release_script'
,'tags.inc.php'
,'treasury'
,'typo2_src-7.5.0'
,'typo3_src-7.6.10'
,'typo3_src-8.7.0'
,'uni'
,'web'
,'worlddevelopment'
);


$recursive  = true;
$shortIDs   = true;
$end = false;
$notEnd = array('js', 'css');
$endMode = 'l';
$path = './';
$type = 'allget'; # {all|files|dir}get <=> what to phpInclude
$circular = true;
$origin = ['38%', '48%'];
$radius = 25;
$unit = '%';

$evolved = true;
$orderBy = 'order';
$orderMode = 'asc';
$homeAlwaysAtTop = true;
$menuMap = array('Home', 'Seashark');  #Test
$translate = true;
// To get 1click-language-switch to work even with distinct file
// names per language: uncomment, map the corresponding files:
/*
$translate = array(
	'en_file'=>'de_file','english'=>'englisch','german'=>'deutsch'
);
*/



# STATIC MENU ENTRIES (e.g. http://<server>.<ending>)
$staticEntries = array(
	//'static file'=>'./.hidden_file.ending'
	'web'=>'web'
	,'treasury'=>'treasury'
);
if (isset($language) && $language == 'en') {
	//$staticEntries = array('static entry'=>'http://server.ip/');
}






/*
MODIFY WITH CAUTION if non-default behaviour is desired.
Uncomment if desired (remove '#' or '//' at line start.
*/
// One language start page set suffices
$start = false;
if (!empty($startEN) && !$startDE) {
	$start = $startEN;
}
else if (!empty($startDE) && !$startEN) {
	$start = $startDE;
}



// Handle menu map and translate separately or not:
if (isset($menuMap)
&& (!isset($translate) || !empty($translate) || $translate === true)) {
	$translate = $menuMap;
}


?>
