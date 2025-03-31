<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'connect.php';

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $role = isset($_POST['role']) ? $_POST['role'] : 0;

        $sql = "INSERT INTO users (username, email, password, address, gender, role) 
        VALUES ('$username', '$email' ,'$password', '$address', '$gender', '$role')";
        mysqli_query($conn, $sql);
        header('location:login.php');
    }
    ?>


    <form action="register.php" method="POST">

        <label>Tên:</label>
        <input type="text" name="username" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mật khẩu:</label>
        <input type="password" name="password" required><br>

        <label>Địa chỉ:</label>
        <input type="text" name="address" required><br>

        <label>Giới tính:</label>
        <input type="text" name="gender" required><br>
        <label>Chọn Role:</label>
        <select name="role" class="role">
            <option value="0">User</option>
            <option value="1">Admin</option>
            <option value="2">Manager</option>
        </select><br>
        <button type="submit" name="register">Đăng Ký</button>
    </form>
</body>

</html>