<?php

include "config.php";
   if( $_GET["ip"] && $_GET["port"] && $_GET["community"] ){
      $ip = $_GET["ip"];
      $port = $_GET["port"];
      $community = $_GET["community"];
   $cmd = <<<EOF
         CREATE TABLE IF NOT EXISTS db (
id INTEGER PRIMARY KEY AUTOINCREMENT,
IP BLOB  NOT NULL,
PORT INT NOT NULL,
COMMUNITY CHAR(10)   NOT NULL
);
EOF;

 $ret = $db->exec($cmd);

$ins = <<<EOF
         INSERT INTO db (IP,PORT,COMMUNITY)
          VALUES ('$ip',$port,'$community');
EOF;

 $ret = $db->exec($ins);
      print "OK";
   
$db->close();
unset($db);

   }
   else 
      print "FALSE"  

   
      

?>

