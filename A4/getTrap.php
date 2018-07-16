<?php

include "config.php";

$sql =<<<EOF
      SELECT * FROM db ORDER BY id DESC LIMIT 1;
EOF;

   $ret = $db->query($sql);
   if($ret){
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      print  $row['COMMUNITY']. "@" . $row['IP']. ":" . $row['PORT'] . "\n";
      }  
   }
   else 
	print "FALSE";


   $db->close();
unset($db);

?>
