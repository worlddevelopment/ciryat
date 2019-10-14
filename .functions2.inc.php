<?php



 // IS IN DB ?
 function isInDb($val, $col, $table = 'accountdaten') {
   // DB-Abfrage vorbereiten
   $sql  = "SELECT *";
   $sql .= " FROM `".$table."`";
   $sql .= " WHERE `".$col."` = '".$val."'";
   $resZ = mysql_query($sql) or die (mysql_error().'Complicated'); // durchfuehren
   $anzR = mysql_num_rows($resZ);
   if ($anzR == 0) return false;
   return true;   // Urspruenglich geplant:
                  // gibt entweder den Zeiger zurueck oder aber false
                  // falls nicht false, also ein Ergebnis, laesst sich
                  // dieses mit einer while-Schleife auslesen ...
  }
  

 // IN DB ?  -multi
 function inDb($table,$col,$val) {
   // DB-Abfrage vorbereiten
   $sql  = "SELECT `".$col."`"; // performance
   $sql .= " FROM `".$table."`";
   $sql .= " WHERE `".$col."` IN('".$val."'";
   for ($i = 3; $i < sizeOf($arguments); $i++) $sql .= ",'".$arguments[$i]."'";
   $sql .= ")";
   $resZ = mysql_query($sql) or die (mysql_error().'inDb'); // durchfuehren
   $anzR = mysql_num_rows($resZ);
   if ($anzR == 0) return false;
   return true;   // Urspruenglich geplant:
                  // gibt entweder den Zeiger zurueck oder aber false
                  // falls nicht false, also ein Ergebnis, laesst sich
                  // dieses mit einer while-Schleife auslesen ...
  }
  
  
  /** -------------------------------------------- *
   * INCREASE 1 -e.g. Attribute, Faehigkeiten, ...
   **
   * @return:  true    -- falls erfolgreich
   *           false   -- falls nicht erfolgreich
   ** -------------------------------------------- */
  // INC
  function inc($attr,$costs,$delta = 1,$table = 'accountdaten') {
      // vorbereiten ..
      $sql  = "UPDATE `".$table."`"
                  ." SET"
                  ." `".$attr."` = `".$attr."` + ".$delta.","
                  ." `Gold` = `Gold` - ".$costs
                  ." WHERE `Nutzer` = '".$_SESSION['usr']."'";
     // durchführen ...
     $resZ = mysql_query($sql) or die (mysql_error().'#functions#inc');
     if (!$resZ) return false;
     return true;
  }
  // INC1
  function inc1($attr,$costs,$table = 'accountdaten') {
      // vorbereiten ..
      $sql  = "UPDATE `".$table."`"
                  ." SET"
                  ." `".$attr."` = `".$attr."` + 1,"
                  ." `Gold` = `Gold` - ".$costs
                  ." WHERE `Nutzer` = '".$_SESSION['usr']."'";
     // durchführen ...
     $resZ = mysql_query($sql) or die (mysql_error().'#functions#inc1');
     if (!$resZ) return false;
     return true;
  }
  
  
  // INC_FAE
  function inc_fae($fae,$delta = 1, $table = 'accountdaten') {
      // delta = bei inc1 = 1, bei dec1 = -1
      $sql  = "UPDATE `".$table."`"
                  ." SET"
                  ." `".$fae."` = `".$fae."` + ".$delta.","
                  ." `skillpoints` = `skillpoints` - ".$delta
                  ." WHERE `Nutzer` = '".$_SESSION['usr']."'";
      $resZ = mysql_query($sql) or die (mysql_error().'#functions#inc_fae');
      if (!$resZ) return false;
      return true;
  }
  // INC1_FAE
  function inc1_fae($fae,$table = 'accountdaten') {
      // delta = bei inc1 = 1, bei dec1 = -1
      $sql  = "UPDATE `".$table."`"
                  ." SET"
                  ." `".$fae."` = `".$fae."` + 1,"
                  ." `skillpoints` = `skillpoints` - 1"
                  ." WHERE `Nutzer` = '".$_SESSION['usr']."'";
      $resZ = mysql_query($sql) or die (mysql_error().'#functions#inc1_fae');
      if (!$resZ) return false;
      return true;
      // $_POST['inc1_fae'] wurde um eins erhoeht(eingeleitet durch input.name.value)
  }
  // DEC1_FAE
  function dec1_fae($fae,$table = 'accountdaten') {
      // delta = bei inc1 = 1, bei dec1 = -1
      $sql  = "UPDATE `".$table."`"
                  ." SET"
                  ." `".$fae."` = `".$fae."` - 1,"
                  ." `skillpoints` = `skillpoints` + 1"
                  ." WHERE `Nutzer` = '".$_SESSION['usr']."'";
      $resZ = mysql_query($sql) or die (mysql_error().'#functions#dec1_fae');
      if (!$resZ) return false;
      return true;
      // $_POST['inc1_fae'] wurde um eins erniedrigt
  }
  /********************* FUNKTIONEN INC -E */
  
  function owl($recip, $betreff, $botschaft, $from = '[unknown]') {
    //
    $sql  = "INSERT INTO `nachrichten`";
    $sql .= " (`to`,`from`,`betreff`,`txt`,`read`,`when`)";
    $sql .= " VALUES("
              ."'".$recip."', '".$from
              ."', '".$betreff."', '"
              .mysql_real_escape_string($botschaft)
              ."', '0', '".$jetzt[0]."')";
    // durchfuehren
    $resZ = mysql_query($sql) or die(mysql_error().'#functions2.inc_owl');
    if ($resZ != false) $owlMessage = '<span class="success">'
                             .'Eule angekommen.</span>';
    else $owlMessage = '<span class="nosuccess">'
                             .'Die Eule hat Ihr Ziel verfehlt.</span>';
    return $owlMessage;
                             
   }
   
   // GOT BOT - BEKAM BOTSCHAFT ?
   function gotBot($who, $from = false) {
     $sql  = "SELECT `from`";
     $sql .= " FROM `nachrichten`";
     $sql .= " WHERE `to` = '".$who."'";
     $sql .= " AND `read` = '0'";
     $resZ = mysql_query($sql) or die(mysql_error().'#functions_gotBot');
     $anzRows = mysql_num_rows($resZ);

     if ($anzRows < 1 || !$anzRows) return false;
     else return $anzRows;
   }
  

?>