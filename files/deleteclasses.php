<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 16-11-2016
 * Time: 14:13
 */
include 'connection.php';
$id = $_GET['name'];
$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms2"),
    "UPDATE classrooms  SET status = '0'  WHERE name = '$id' ");
if ($q) {

    header("Location:allotclasses.php");

} else {
    echo 'Error';
}