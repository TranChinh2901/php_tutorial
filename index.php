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

</html>