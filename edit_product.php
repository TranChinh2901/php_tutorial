<?php

include 'connect.php';
$this_id = $_GET['this_id'];
$sql = "SELECT * FROM products WHERE id='$this_id'";
$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query);


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $price = $_POST['price'];
    $priceGoc = $_POST['priceGoc'];
    $baoHanh = $_POST['baoHanh'];

    // Nếu không có ảnh mới, giữ ảnh cũ
    if (empty($image)) {
        $image = $row['image'];
    }

    $sql = "UPDATE products SET name='$name', image='$image', price='$price', priceGoc='$priceGoc', baoHanh='$baoHanh' WHERE id='$this_id'";
    mysqli_query($conn, $sql);
    move_uploaded_file($image_tmp_name, 'img/products/' . $image);
    header('location:products.php');
}
?>

<html>

<body>

    <div class="container">
        <h1>Edit Product</h1>
        <!-- Show message day -->

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">
            <p>
                <label>Tên:</label>
                <input type="text" name="name" value="<?php echo ($row['name']); ?>">
            </p>
            <p>
                <label>Ảnh:</label>
                <span>
                    <img src="img/products/<?php echo ($row['image']); ?>" alt="" width="60" height="70">
                </span>
                <input type="file" name="image">
            </p>
            <p>
                <label>Giá:</label>
                <input type="text" name="price" value="<?php echo ($row['price']); ?>">
            </p>
            <p>
                <label>Giá gốc:</label>
                <input type="text" name="priceGoc" value="<?php echo ($row['priceGoc']); ?>">
            </p>
            <p>
                <label>Bảo hành:</label>
                <input type="text" name="baoHanh" value="<?php echo ($row['baoHanh']); ?>">
            </p>
            <button type="submit" name="update">Cập nhật</button>
            <a href="products.php">Quay lại</a>
        </form>
    </div>

</body>

</html>