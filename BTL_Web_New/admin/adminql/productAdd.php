<?php
include "headers.php";
include "left_sidebar.php";
include '../class/product_class.php';
?>
<?php
$product = new Product();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $insert_product = $product->insert_product($category_id, $product_name);
}
?>
<div class="col py-3">
    <form action="" method="post">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Add type of Product</div>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>-- Select type of Product</option>
                <?php
                $show_category = $product->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <input required type="text" class="form-control mt-2" id="add-category" placeholder="Nhập tên loại sản phẩm"
                name="product_name">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>
</div>
</div>
</div>
</main>
</body>

</html>