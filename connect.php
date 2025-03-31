<?php
$server = '';
$user = 'root';
$pass = '';
$database = 'first_project_php';


$conn = new mysqli($server, $user, $pass, $database);

if ($conn) {
    // echo "connect database thành công";
} else {
    echo "connect database thất bại";
}
