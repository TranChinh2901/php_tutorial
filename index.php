<?php
include "connect.php";
session_start();

if (!isset($_SESSION['email'])) {
    header('location:login.php');
    exit();
}

$noidung = "";
$message = "";

if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];

    //Nếu người dùng không nhập gì mà nhán nút tìm thì hiển thị thông báo
    if (empty($noidung)) {
        $message = "⚠️ Vui lòng nhập nội dung tìm kiếm ";
    }
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
    <button type="submit" name="resect">Reload</button>
</form>

<?php
include 'connect.php';

if (!empty($message)) {
    echo "<p style='color: red;'>$message</p>";
}

if (!empty($noidung)) {
    $sql = "SELECT * FROM products WHERE name LIKE '%$noidung%'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo htmlspecialchars($row['name']);
        echo "<br>";
    }
} else {
    echo "";
}
?>

</html>