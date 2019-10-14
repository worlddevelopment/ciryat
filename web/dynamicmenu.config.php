<?php

$path = './';
$circular = true;
$origin = ['39%', '46%'];
$radius = 22;
$unit = '%';

# STATIC MENU ENTRIES (e.g. http://<server>.<ending>)
$staticEntries = array(
	//'static file'=>'./.hidden_file.ending'
	'Reiterhof'=>'https://fitness-stall.de'
	,'Textb&uuml;ro'=>'https://hirschberg-text.de'
	//,'LOHTAX'=>'http://ciry.at/lohtax'
	,'Kleinanzeigen'=>'https://www.ebay-kleinanzeigen.de/s-bestandsliste.html?userId=42316594'
	,'Lighttree Anamcara'=>'http://lighttree.coach'
	,'HAMAG'=>'https://hamag-maschinenbau.de'
	//,'Amtsmodule'=>'../Amtsmodule'
	,'7Magics'=>'../SevenMagics'
	,'Pferdewirtin'=>'../dynamic_site'
	//,'Knighthood'=>'../Knighthood'
	,'Quad'=>'http://quad.mobi'
);
if (isset($language) && $language == 'en') {
	//$staticEntries = array('static entry'=>'http://server.ip/');
}


?>
