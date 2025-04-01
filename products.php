<html>

<?php
include 'connect.php';

$noidung = "";
$message = "";
$result = null;

if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];

    if (empty($noidung)) {
        $message = "⚠️ Vui lòng nhập nội dung tìm kiếm";
    } else {
        //timf kiếm sản phẩm theo tên
        $sql = "SELECT * FROM products WHERE name LIKE '%$noidung%'";
        $result = mysqli_query($conn, $sql);
    }
} else {
    //Hiện toàn bộ sản phẩm nếu chưa tìm kiếm 
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
}



?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .flex_list {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .flex_list a {
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid grey;
        background-color: #ccc;
    }
</style>

<body>

    <div class="flex_head">
        <div class="flex_list">
            <h2>Danh sách sản phẩm</h2>
            <a href="add_product.php">Tạo mới sản phẩm </a>
        </div>

        <form method="POST" style="text-align: center;">
            <input type="text" name="noidung" value="<?php echo htmlspecialchars($noidung); ?>">
            <button type="submit" name="btn">Tìm kiếm</button>
            <button type="submit" name="resect">Reload</button>
            <p class="error"><?php echo $message; ?></p>
        </form>

    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Giá gốc SP</th>
            <th>Bảo hành</th>
            <th>Hành động</th>

        </tr>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id_product']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>
                        <img width="50" height="55" src="img/products/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    </td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['priceGoc']; ?></td>
                    <td><?php echo $row['baoHanh']; ?></td>
                    <td>
                        <a href="comment.php?this_id=<?php echo $row['id_product']; ?>" style="color: black; text-decoration: none;">Xem</a>
                        <a href="edit_product.php?this_id=<?php echo $row['id_product']; ?>" style="color: green; text-decoration: none; margin-left: 10px;">Sửa</a>
                        <a href="delete_product.php?this_id=<?php echo $row['id_product']; ?>" style="color: red; text-decoration: none; margin-left: 10px;">Xóa</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='7'>Không tìm thấy sản phẩm nào</td></tr>";
        }
        ?>
    </table>
</body>

</html>