<?php
include "connect.php";

$error_message = "";

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $price = $_POST['price'];
    $priceGoc = $_POST['priceGoc'];
    $baoHanh = $_POST['baoHanh'];

    if (empty($name) || empty($image) || empty($price) || empty($priceGoc) || empty($baoHanh)) {
        $error_message = "⚠️ Vui lòng điền đầy đủ thông tin trước khi gửi!";
    } else {

        $sql = "INSERT INTO products (name, image, price, priceGoc, baoHanh)
    value('$name', '$image', '$price', '$priceGoc', '$baoHanh');";
        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($image_tmp_name, 'img/products/' . $image);
            header('location:products.php');
            exit();
        } else {
            $error_message = "❌ Lỗi khi thêm sản phẩm: " . mysqli_error($conn);
        }
    }
}
?>
<html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 350px;
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    input[type="file"] {
        border: none;
    }

    button {
        margin-top: 15px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button[name="btn"] {
        background-color: #28a745;
        color: white;
    }

    button[name="btn"]:hover {
        background-color: #218838;
    }

    button[name="resect"] {
        background-color: #dc3545;
        color: white;
    }

    button[name="resect"]:hover {
        background-color: #c82333;
    }
</style>

<body>
    <div class="container">

        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <?php if (!empty($error_message)): ?>
                <div class="alert error"><?= $error_message ?></div>
            <?php endif; ?>
            <label>Name</label>
            <input type="text" name="name">

            <label>Image</label>
            <input type="file" name="image">

            <label>Price</label>
            <input type="text" name="price">

            <label>Price Goc</label>
            <input type="text" name="priceGoc">

            <label>Bao hanh</label>
            <input type="text" name="baoHanh">

            <button type="submit" name="btn">Submit</button>
            <button type="button" name="resect" onclick="window.location.href='add_product.php'">
                Reload
            </button>


        </form>
    </div>
</body>

</html>