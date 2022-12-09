<?php
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();
$sql = "DELETE FROM subagiya WHERE id=?";
$paramType = 'i';
$paramValue = array(
    $_GET["id"]
);
$database->delete($sql, $paramType, $paramValue);
header("Location:index.php");
exit();
?>
