<?php
include "connect.php";

session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

?>


<html>
<h1>helllo user</h1>

<a href="logout.php">
    <button type="submit" name="logout">
        Logout
    </button>
</a>

<form method="POST">
    <input type="text" name="noidung">
    <button type="submit" name="btn">Tìm kiếm</button>
</form>

<?php
if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];
} else {
    echo "Không có nội dung tìm kiếm!";
}
?>

<?php
include 'connect.php';

$sql = "SELECT * FROM products WHERE name LIKE '%$noidung%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo $row['name'];
    echo "<br>";
}
?>

</html>