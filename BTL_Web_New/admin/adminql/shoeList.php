<?php
include "headers.php";
include "left_sidebar.php";
include '../class/shoe_class.php';
?>
<?php
$shoe = new Shoe();
$showshoe = $shoe->show_shoe();
$i = 0;
?>
<div class="admin_content_right container-fluid">
    <div class="admin_content_right_category_list">
        <div class="h2 text-primary p-4 row">Table of Shoe</div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">Product_ID</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                    <th scope="col">Price Discount</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($showshoe) {
                    $i = 0;
                    while ($result = $showshoe->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['product_name']; ?></td>
                            <td><?php echo $result['category_name']; ?></td>
                            <td><?php echo $result['shoe_name']; ?></td>
                            <td><?php echo $result['shoe_brand']; ?></td>
                            <td><?php echo $result['shoe_price']; ?></td>
                            <td><?php echo $result['shoe_price_discount']; ?></td>
                            <td><?php echo $result['shoe_img']; ?></td>
                            <td>
                                <a href="shoe_edit.php?shoe_id=<?php echo $result['shoe_id']; ?>"
                                    class="btn btn-primary mx-2">View</a>
                                <a href="shoe_delete.php?shoe_id=<?php echo $result['shoe_id']; ?>"
                                    class="btn btn-danger mx-2">Delete</a>
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