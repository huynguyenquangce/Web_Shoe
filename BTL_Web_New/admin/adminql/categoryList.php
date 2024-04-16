<?php
include "headers.php";
include "left_sidebar.php";
include '../class/category_class.php';
?>
<?php
$category = new Category();
$showcategory = $category->show_category();
$i = 0;
?>
<div class="admin_content_right container-fluid">
    <div class="admin_content_right_category_list">
        <div class="h2 text-primary p-4 row">Table Category</div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($showcategory) {
                    $i = 0;
                    while ($result = $showcategory->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['category_id']; ?></td>
                            <td><?php echo $result['category_name']; ?></td>
                            <td>
                                <a href="category_edit.php?category_id=<?php echo $result['category_id'];?>" class="btn btn-info mx-2">Edit</a>
                                <a href="category_delete.php?category_id=<?php echo $result['category_id'];?>" class="btn btn-danger mx-2">Delete</a>
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