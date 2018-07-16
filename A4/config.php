<?php
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('anm.db');
      }
   }

 $db = new MyDB();

?>
