<html>


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
        include "connect.php";

        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td>
                    <img width="50" height="55" src="img/products/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
                </td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['priceGoc'] ?></td>
                <td><?php echo $row['baoHanh'] ?></td>
                <td style="gap: 10px;">

                    <span style="color: green; border: 1px solid grey; padding: 5px 10px; cursor: pointer;">
                        <a href="edit_product.php?this_id=<?php echo $row['id'] ?>" style="color: green; text-decoration: none;">
                            Sửa
                        </a>
                    </span>

                    <span style="color: red;border: 1px solid grey; padding: 5px 10px; margin-left: 8px; cursor: pointer;">
                        <a href="delete_product.php?this_id=<?php echo $row['id'] ?>" style="color: red; text-decoration: none;">Xóa</a>
                    </span>
                </td>
            </tr>
        <?php } ?>


    </table>
</body>

</html>