<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("location:CRUDproduct.php");
} else {
  echo "Error deleting record: " . $mysqli->error;
}


$mysqli->close();