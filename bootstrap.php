<?php
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "unitickets");
define("UPLOAD_DIR", "./upload/")
?>