<?php

include "config.php";


$cmd = <<<EOF
         CREATE TABLE IF NOT EXISTS stat(
id INTEGER PRIMARY KEY AUTOINCREMENT,
DEV_NAME CHAR(50) NOT NULL,
STATUS   INT      NOT NULL,
TIME     CHAR(50) NOT NULL,
OLD_STATUS INT,
OLD_TIME CHAR(50)
);
EOF;

 $ret = $db->exec($cmd);
 

 $sql =<<<EOF
      SELECT * from stat;
EOF;

   $result = $db->query($sql);

$sql1 =<<<EOF
      SELECT count(DEV_NAME) FROM stat;
EOF;

$num = $db->query($sql1);
$rw = $num->fetchArray(SQLITE3_ASSOC);
$num = $rw['count(DEV_NAME)']; 


if ($num > 0) {
    while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
      print $row['DEV_NAME'] . " | ". $row['STATUS'] ." | ". $row['TIME'] ." | ". $row['OLD_STATUS']." | ". $row['OLD_TIME'] ." \n ";      
  }
} else {
    print 'FALSE';
}

  $db->close();
unset($db);
?>



