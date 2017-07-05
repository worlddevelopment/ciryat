<?php
/*-----------------------------------------*
 | CopyRight (C) FairyTale Productions GbR |
 | Babyglueck - functions.inc.php          |
 *-----------------------------------------*/




//--------------------------------------------------------------------------//
//GET TO POST
function getToPost() {
    $numArgs = func_num_args();             //preparation
    if ($numArgs > 0) {                     //isArray is certain, but if there
        $args = func_get_args();            //.. are any arguments is not
        foreach ($args as $arg) {           //go through arguments
            if (isset($_GET[$arg])) {
                $_POST[$arg] = (string)($_GET[$arg]);
            }
        }
    }
    else {                                  //called without arguments
        User::$message  = getDiv('','nosuccess pAbs t0 l50 w300px mL-150px z999');
        User::$message .= 'GetToPost without argument is not possible!'.__LINE__;
        User::$message .= getDivE();         //this needs tags.inc.php!
    }
}


//VALID EMAIL
function validEmail($em) {
    //
    if (strpos($em, "'") !== FALSE) {
        return false;
    }
    if (!preg_match('/[a-zA-Z0-9.+%_-]+[@][a-zA-Z0-9.-]+[.][a-zA-Z]{2,4}/', $em)) {

        echo 'reached: '.$em;
        return false;
    }
    //
    return true;
}
//VALID PW
function validPw($pw) {
    //
    if (strpos($pw, "'") !== FALSE) {
        return false;
    }
    if (!preg_match('/[a-zA-Z0-9.+_=-]+/', $pw)) {
        return false;
    }
    //
    return true;
}
//PW SCORE
function pwScore($pw) {
    //
    $scoreL = 0;
    //
    $pwL = strlen($pw);
    if ($pwL < 3) {
        $scoreL += 0;
    }
    else if ($pwL < 5) {
        $scoreL += 1;
    }
    else if ($pwL < 7) {
        $scoreL += 2;
    }
    else if ($pwL < 9) {
        $scoreL += 4;
    }
    else if ($pwL < 10) {
        $scoreL += 5;
    }
    else if ($pwL < 12) {
        $scoreL += 7;
    }
    else if ($pwL < 14) {
        $scoreL += 10;
    }
    else if ($pwL < 20) {
        $scoreL += 15;
    }
    else if ($pwL >= 20) {
        $scoreL += 20;
    }
    //
    $scoreChars = 0;
    if (preg_match('/[a-z]+/', $pw) || preg_match('/[A-Z]+/', $pw)) {
        $scoreChars += 1;
    }
    else if (preg_match('/[a-zA-Z]+/', $pw)) {
        $scoreChars += 5;
    }
    else if (preg_match('/[a-z_.+*:-;&]+/', $pw) || preg_match('/[A-Z_.+*:-;&]+/', $pw)) {
        $scoreChars += 10;
    }
    else if (preg_match('/[a-zA-Z_.+*:-;&]+/', $pw)) {
        $scoreChars += 15;
    }
    else if (preg_match('/[a-z0-9]+/', $pw) || preg_match('/[A-Z0-9]+/', $pw)) {
        $scoreChars += 15;
    }
    else if (preg_match('/[a-zA-Z0-9]+/', $pw)) {
        $scoreChars += 20;
    }
    else if (preg_match('/[a-z0-9_.+*:-;&]+/', $pw)
     || preg_match('/[A-Z0-9_.+*:-;&]+/', $pw)) {
        $scoreChars += 30;
    }
    else if (preg_match('/[a-zA-Z0-9_.+*:-;&]+/', $pw)) {
        $scoreChars += 40;
    }
    //
    return $scoreL + 2 * $scoreChars;
}

//PW STRENGTH
function pwStrength($pw) {
    $score = pwScore($pw);
    //
    if ($score == 0) {
        return 'absolutely nothing';
    }
    else if ($score < 2) {
        return 'hardly useful';
    }
    else if ($score < 3) {
        return 'very very weak';
    }
    else if ($score < 5) {
        return 'very weak';
    }
    else if ($score < 7) {
        return 'weak';
    }
    else if ($score < 10) {
        return 'could be better';
    }
    else if ($score < 13) {
        return 'okay';
    }
    else if ($score < 15) {
        return 'middle';
    }
    else if ($score < 20) {
        return 'nearly good';
    }
    else if ($score < 40) {
        return 'good';
    }
    else if ($score < 50) {
        return 'very good';
    }
    else if ($score < 80) {
        return 'excellent';
    }
    else if ($score >= 80) {
        return 'nearly perfect';
    }
    else if ($score == 100) {
        return 'perfect';
    }
}



//QUERY
function query($sql, $line = false) {
    global $mysqli;
    //
    if (!$line) {
        $line = ' no line given :/';//__LINE__;
    }
    $res = $mysqli->query($sql)
        or die($mysqli->error.' #'.$line."\n".'<br />'.$sql.'<br />');
    //
    /*
    if (!$res) {
        die('No result. '.$mysqli->error.' #'.$line);
    }
    */
    //
    return $res;
}


//PREP DB
function prepDb($toPrep) {
    global $mysqli;
    return $mysqli->real_escape_string($toPrep);
}




  /**
   * rmFromQSandAdd
   * Entfernt 1 GET Parameter und fuegt 1 GET Parameter hinzu, bzw. ersetzt !
   * @param $nameToRemove -- Variablen-Name des zu entfernenden Parameters
   * @param $name         -- Variablen-Name des zu setzenden Parameters
   * @param $val          -- Variablen-Wert des zu setzenden GET-Parameters
   */
  function rmFromQSandAdd($nameToRemove, $name = false, $val = false, $qs = false) {
      if (!$qs) {
        $qs = $_SERVER['QUERY_STRING'];
      }
      //remove if set parameter $nameToRemove
      $valueRegex = '[a-zA-Z0-9+-_%.]+([.]?[a-zA-Z]+)*';
      $qs = preg_replace('/'.$nameToRemove.'='.$valueRegex.'[&]?/', '', $qs);

      //
      if (!$name) {
          return '?'.$qs;
      }
      //
      $qs = preg_replace('/[&]$/', '', addToQS($name, $val, $qs));
      return preg_replace('/([?]([&]|[?]))/', '?', $qs);
  }


  /*----------------
   * addToQS       *
   *---------------*/
  function addToQS($param, $value, $qs = false) {
    if ($qs) {
        $qs = str_replace('?', '', $qs); //das ? am Anfang des Strings entfernen
    }
    elseif (!$qs) {
        $qs = $_SERVER['QUERY_STRING'];
    }

    //
    if (strlen($qs) == 0) {
      return '?'.$param.'='.$value;
    }
    else if (strpos($qs, $param) === FALSE) {
      return '?'.$qs.'&'.$param.'='.$value;
    }
    else {
      $valueRegex = '[a-zA-Z0-9+-_%.]*([.]{0,1}[a-zA-Z]+)*';
      return preg_replace('/'.$param.'='.$valueRegex.'/i',
                          $param.'='.$value, '?'.$qs);
    }
  }

/**
 * now
 * @param $key  -- index to access, i.e. year, .. compare to php.net/getDate
 * @return $now -- array with time in millis at position 0
 */
function now($key) {
    $now = getDate(time());                         //now timedate object
    return $now[$key];
}


/*----------------
 * toFairy       *
 *---------------*/
function toFairy($string) {
    if (empty($string))
        return $string;
    if (!is_string($string))
        ''.$string.'';
    $string .= ' ';
    // Check if starting or ending with a space (which might be desired to retain).
    // Allow one preceding and succeeding space respectively:
    $prepend = '';
    if (strpos($string, '_') === 0)
    {
	$string = substr($string, 1);
        $prepend = ' ';
    }
    $append = '';
    if (substr($string, count($string) - 1, 1) == '_')
        $append = ' ';

    // remove leading . (as it might have been a hidden file e.g. .home.php)
    while ($string[0] == '.')
    {
        #echo $string;
        $string = substr($string, 1);
        if (empty($string))
            return '';
    }
    $vP = explode('.',substr($string,1,strlen($string)-1));// vor punkt
    $oL = explode('_',$vP[0]);                            // only last
    $fairy = strtoupper($string[0]).$oL[0];
    //print_r($oL);
    for ($i = 1; $i < sizeOf($oL); $i++) {
        if (empty($oL[$i]))
            continue;
        $fairy .= ' '.strtoupper($oL[$i][0]).substr($oL[$i].' ',1,strlen($oL[$i])-1);
    }
    return $prepend . trim($fairy) . $append;
}


    /**
     * @changelog: JRIBW: Now this function no is static. Furthermore now a generic method for
     * encoding is utilized, so that other planet programs can decode automatically/dynamically.
     * /
    private static final int[] unicode = new int[] {
          0x00E4, 0x00C4
        , 0x00F6, 0x00D6
        , 0x00DF
        , 0x00FC, 0x00DC
        //, ' ' <-- we handle this separately because 0x0020 instead of _ will be too long a filepath.
    };
//  private static final String[] replacement = new String[]    {
//            "0ae", "0Ae"
//          , "0oe", "0Oe"
//          , "0sz"
//          , "0ue", "0Ue",
//          "_"/*PREVIOUSLY THIS WAS replaced by empty""* //* Now replacement is dynamically derived. * /
//  };



c static String encodeUmlauts(String str) {
        //str = str.toLowerCase();//<-- this has destroyed information

        /* Leading 0 (zero) was introduced to avoid confusion:
        e.g. 'Puerto' became P\u00DCrto and Bauer Ba\u00DCr, now this can happen no more. * /

        if(str.contains(File.separator)){
            //-- is category splitter (because single - might be used in the text itself).
            /* / is replaced by triple - (---) .. hence an empty category will be --<empty>--==----
              and will not be matched by the ---.
            * /
            str = str.replaceAll(File.separator, "---"); /*ATTENTION CHANGED HERE!
                    TODO KEEP TRACK OF POTENTIAL CONSEQUENCES IF THIS WAS USED SOMEWHERE!
                    PREVIOUSLY A SLASH (/) WAS REPLACED BY UNDERSCORE (_)* /
        }
        if(str.contains(" ")){
            str = str.replaceAll(" ", "_");
        }
        String search;
        String replacement;
        for (int i = 0; i < unicode.length; i++) {
            search = String.valueOf(Character.toChars(unicode[i]));
            search = String.valueOf((char) unicode[i]);
            //replacement = unicode[i].replaceFirst("\\\\", "");//<--omitting the slash\ is a more generic solution.
            replacement = "u" + toHexString(unicode[i], 4);//<-- without the u what will happen if üö is to be replaced?-> it will break when decoding.
            str = str.replaceAll(search, replacement);
        }
        return str;
    }

public static String toHexString(long l) {
        return toHexString(l, 0);
    }
    public static String toHexString(long l, int minimum_digit_count) {
        String hexString = Long.toHexString(l);
        //fill with leading zeroes
        while (hexString.length() < minimum_digit_count) {//<-- examined every loop cycle
            hexString = "0" + hexString;
        }
        return hexString.toUpperCase();
    }
    //
    public static String decodeUmlauts(String str) {
        if (str == null) {
            System.out.println("DecodeUmlauts: Was given " + str);
            return null;
        }
        //str = str.toLowerCase();
        if(str.contains("---")){
            str = str.replaceAll("---", File.separator);
        }
        if(str.contains("_")){
            str = str.replaceAll("_", " ");
        }
        String search;
        String replacement;
        for (int i = 0; i < unicode.length; i++) {
            //without u multiple chars in a row will break!
            search = "u" + toHexString(unicode[i], 4).toUpperCase();
            //leading \?
//          if (!str.contains("\\\\u")) {
//              search = unicode[i].replaceFirst("\\\\", "");
//
//          }
            //Long.parseLong(<hex_string>, 16);
            replacement = String.valueOf((char) unicode[i]);
            str = str.replaceAll("(?i)" + search, replacement);/*Enable case insensitiveness to replace
                    both 00e4 and 00E4 as an example.* /
        }

        return str;
    }
*/


/**
 * fuehrt alle Unterarrays in ein gesamtes Feld ueber
 */
function arrayFusion($entPairs) {
    $zwerg = array();
    foreach($entPairs as $riese) {
        $zwerg = array_merge($zwerg, $riese);
    }
    return $zwerg;
}
function arrayJoin($entPairs) {
    return arrayFusion($entPairs);
}

/**
 * nennt aufrufende Funktion & Klasse
 */
function calledBy($trace = false, $all = false) {
    if (!$trace) {
        $trace = debug_backtrace();
    }
    if ($all) {
        print_r($trace);
        return;
    }
    //
    #$callee = array_shift($trace);
    $caller = $trace;
    foreach ($caller as $callee) {
        echo '(called by '.$callee['function'];
        if (isset($caller['class'])) {
            echo ' in class '.$caller['class'];
        }
        echo ')<br />';
    }
}

//--------------------------------------------------------------------------//

#FUNKTIONIERT LEIDER NOCH NICHT SO RICHTIG


	/**
     * transformUmlaut
     * @param $haystack     -- string in which to look for replacing ..ue ..
     * @param $whiteSpace   -- with which value to replace white spaces; by default:'_'
     */
    function transformUmlaut($haystack, $whiteSpace = '_', $htmlReady = false) {
        $umlaute = array('&Auml;','&auml;','&Uuml;','&uuml;','&Ouml;','&ouml;','&szlig;');
        $replace = array('Ae','ae','Ue','ue','Oe','oe','sss');
        //warum auch immer?
        #$haystack = htmlentities($haystack);
        //
        if ($htmlReady) {
            return str_replace(' ', $whiteSpace, $haystack, $keepWhiteSpace = true);
        }
        //
        for ($i = 0, $l = count($umlaute); $i < $l; $i++) {
            //nach und nach Umlaute nach Modus ersetzen
            $haystack = str_replace($umlaute[$i], $replace[$i], $haystack);
            //tried string_translate strtr ...  but somehow it also failed
        }
        //zuletzt noch die Leerzeichleins aus dem Heuhaufen fischen, kurz markieren und weiter
        if (!$keepWhiteSpace) {
			$haystack = str_replace(' ', $whiteSpace, $haystack);
		}
        return $haystack;
    }


    /**
     * retransformUmlaut
     * @param $haystack     -- string in which to look for replacing ..ue ..
     * @param $whiteSpace   -- with which value to replace white spaces; by default:'_'
     */
    function retransformUmlaut($haystack, $whiteSpace = '_', $fromHtmlCodes = false) {
        //
        if ($fromHtmlCodes) {
            return str_replace($whiteSpace, ' ', html_entity_decode($haystack));
        }
        //
        $toReplace = array('Ae','ae','Ue','ue','Oe','oe','sss');
        $replace = array('&Auml;','&auml;','&Uuml;','&uuml;','&Ouml;','&ouml;','&szlig;');
        //
        for ($i = 0, $l = count($toReplace); $i < $l; $i++) {
            //nach und nach zurueck ersetzen zu html-Umlaut-Codes
            $haystack = str_replace($toReplace[$i], $replace[$i], $haystack);
        }
        //dann zurueck uebersetzen
        #$haystack = html_entity_decode($haystack);
        //zuletzt noch die Leerzeichleins in den Heuhaufen reinpacken
        return str_replace($whiteSpace, ' ', $haystack);
    }

//--------------------------------------------------------------------------//


    function getIfSet($array, $key) {
        return (isset($array[$key]) ? (string)($array[$key]) : "");
    }
    function isImage($filelink) {
        $image_file_endings = array('png', 'jpg', 'jpeg', 'gif', 'ico', 'tiff');
        //$startpos = strpos('.');
        $parts = explode('.', $filelink);
        $ending = $parts[sizeOf($parts) - 1];
        //echo $ending . ' \t';
        //if (is_numeric($startpos) and $startpos > -1 /*!== false <- working*/) {
        //    $ending = substr($filelink, $startpos + 1/*, length*/);
            return array_search($ending, /*$this->*/$image_file_endings) != false;
        //}
    }
    function filter_for_choosing_image_callback($filelink) {
        return isImage($filelink) && strpos($filelink, 'header') !== false;
    }
    function getRandomImageLinkFrom($paths_to_choose_image_from, $dirname_of_calling_file) {
        /*IMPORTANT NOTE: This assumes that the function.inc.php never is below the calling file in the filesystem tree.*/
        /*
        $relative_difference = str_replace(dirname(__FILE__), '', $dirname_of_calling_file);
        if (substr($relative_difference, 0, 1) == '/') {
            $relative_difference = substr($relative_difference, 1);
        }
        echo ' => relative difference: ' . $relative_difference;
        */
        $candidates = r($paths_to_choose_image_from, false, 'filter_for_choosing_image_callback'/*, $relative_difference*/);
        //print_r($candidates);
        return $candidates[mt_rand(0, sizeOf($candidates) - 1)];//if it's not random enough the seed can be changed using srand().
        /*
        foreach ($candidates as $candidate) {
            $
        }
        */
    }
    function r($paths, $recursion = false, $filter_condition_callback = false
            , $relative_difference = ''/*between caller and callee dirnames*/) {
        if (is_string($paths)) {
            $paths = array($paths);//array with length of 1
        }
        if (!is_array($paths)) {
            echo 'Paths argument given is not of type array even though it\'s being converted from string to array!' . __LINE__;
            return false;
        }

        //seek all images within given files
        $results = array();                         // wird befuellt und zurueckgegeben
        foreach ($paths as $path) {
            $d = dir(/*$relative_difference . '/' .*/ $path); // Directory pseudo class holen
            //echo '<br />processing path: ' . $path . '<br />';
            while (($entry = $d->read()) !== false) {
              //echo 'entry: ' . $entry . '<br />';
              if (is_dir($entry) && $recursion /*&& array_search($entry,$this->exceptions) == false*/) {
                  //recursion
                  $deeperResults = r($path.$entry, $recursion, $filter_condition_callback);
                  //join deeper level results to this level's results:
                  foreach ($deeperResults as $deeperEntry) {
                      $results[] = $deeperEntry;
                  }
              }
              else if(!is_dir($entry) && $filter_condition_callback
                    && is_callable($filter_condition_callback)
                        //PHP5.3+: && $filter_condition_callback()/* // Since $cb3 is a static method, the class "ClassName" must be loaded
                        // (autoloader will try) and it must have a static public
                        // method "someStaticMethod". http://stackoverflow.com/questions/48947/how-do-i-implement-a-callback-in-php*/
                        //General solution: _array to pass arguments by reference TODO clarify
                     && call_user_func_array(/*array('Class Or Object Name', */$filter_condition_callback/*)*/, array($entry)) /* && !array_search($entry,$this->exceptions)*/) {
                  $results[] = $path.$entry;
              }
            }

            $d->close();                                // Resource-Verbindungs beenden
        }
        return $results;
  }



    /*this function is from: Zak (php rand() documentation page)*/
    function randomAlphaNumeric($length) {
        $rangeMin = pow(36, $lenth - 1); //"smallest number to give length digits in base 36"
        $rangeMax = pow(36, $lenth) - 1; //"largest number -"- "
        $base10Rand = mt_rand($rangeMin, $rangeMax);
        return base_convert($base10Rand, 10, 36);
    }

    /**
     * getLang
     * Ermittelt die gesetzte Sprache
     */
    function getLang() {
        return (isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'de');
    }


	function getInt($string) {
		if ($string == null) {
			return -1;
		}
		$i = 0;
		$parsable = "";
		// From left to right:
		while ($i < strlen($string)) {
			$s = $string[$i];
			//echo '<br />s: ' . $s . ' intval: ' . intval($s) . '';
			$s_as_int = intval($s);
			if (!empty($s_as_int) && $s_as_int == $s || $s == '0') // to not have zeroes disappear because empty evaluates true compared to 0.
			{
				$parsable .= $s;
			}
			++$i;
		}
		if (!empty($parsable)) {
			return intval($parsable);
		}
		return -1;//Integer.MAX_VALUE;
}


// https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
function startsWith($haystack, $needle)
{
	return $haystack[0] === $needle[0]
		? strncmp($haystack, $needle, strlen($needle)) === 0
		: false;
}


function endsWith($haystack, $needle)
{
	return substr($haystack, -strlen($needle)) === $needle;
}


function startsWithNotCaseSensitive($haystack, $needle)
{
	$haystack = strtolower($haystack);
	$needle = strtolower($needle);
	return startsWith($haystack, $needle);
}


function endsWithNotCaseSensitive($haystack, $needle)
{
	$haystack = strtolower($haystack);
	$needle = strtolower($needle);
	return endsWith($haystack, $needle);
}

?>
