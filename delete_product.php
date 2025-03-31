<?php
include "connect.php";
$this_id = $_GET['this_id'];

$sql = "DELETE FROM products  WHERE id_product='$this_id'";

mysqli_query($conn, $sql);
header('location:products.php');
