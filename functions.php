<?php
// Get all .php files in the 'funtions' folder
$files = glob(__DIR__ . "/functions/*php");

foreach ($files as $file) {
  require $file;
}
?>
