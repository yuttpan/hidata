<?php
ob_start();
include_once "config.php";

if (sql_delete("hi", "Hi_id")) {
    header("location: hi_form.php");
} else {
    echo sql_error();
}
?>
