<?php
ob_start();
include_once "config.php";

if (sql_save("hi", "id")) {
    header("location: hi_form.php?url=hi_form.php");
} else {
    echo sql_error();
}
?>
