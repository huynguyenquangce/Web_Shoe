<?php
include "headers.php";
include "left_sidebar.php";
include '../class/product_class.php';
?>
<?php
$product = new Product();
$showproduct = $product->show_product();
$i = 0;
?>
<div class="admin_content_right container-fluid">
    <div class="admin_content_right_category_list">
        <div class="h2 text-primary p-4 row">Table type of Product</div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">Product_ID</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($showproduct) {
                    $i = 0;
                    while ($result = $showproduct->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['product_id']; ?></td>
                            <td><?php echo $result['category_name']; ?></td>
                            <td><?php echo $result['product_name']; ?></td>
                            <td>
                                <a href="product_edit.php?product_id=<?php echo $result['product_id'];?>" class="btn btn-info mx-2">Edit</a>
                                <a href="product_delete.php?product_id=<?php echo $result['product_id'];?>" class="btn btn-danger mx-2">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>