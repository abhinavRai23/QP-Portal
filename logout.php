<?php
require_once 'common/connectionPDO.php';
require_once 'common/queries.php';
$obj = new Queries;
if(!isset($_SESSION))
	session_start();
session_destroy();
$value = $obj->get_counter($conn)->fetch()['value'];
$obj->update_counter_add_sub($conn,$value,"sub");
header('location:index.php');
?>