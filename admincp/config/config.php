<?php
$mysqli = new mysqli("localhost","root","123456","web_mysqli");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Kết nối MYSQLi lỗi: " . $mysqli -> connect_error;
  exit();
}

?>