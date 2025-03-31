<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();
    include 'connect.php';
    $error = "";

    if (isset($_SESSION['email'])) {
        header('location:index.php');
        exit();
    }

    if (isset($_POST['dangnhap'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error = "❌ Email hoặc password không được để trống";
        } else {
            $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            if ($user && $password == $user['password']) {
                $_SESSION['email'] = $email;
                $_SESSION['role']  = $user['role'];

                //Điều hướng theo role
                if ($user['role'] == 1) {
                    header('location:index.php');
                } else {
                    header('location:index.php');
                }
            }
        }
    }


    ?>


    <form action="login.php" method="POST">

        <div class="flex-label">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <br>
        <label>Password</label>
        <input type="password" name="password">
        <br>
        <button type="submit" name="dangnhap">
            Login
        </button>
        <button type="submit" name="resect">
            Reload
        </button>

        <div class="if-you-dont-have-an-account">
            Nếu bạn chưa có tk > <a href="register.php"> register</a>
        </div>

    </form>
</body>

</html>