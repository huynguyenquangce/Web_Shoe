<?php
include "headers.php";
include "left_sidebar.php";
include '../class/product_class.php';
?>
<?php
$product = new Product();
if(!isset($_GET['product_id']) || $_GET['product_id'] == '')
{
    echo "<script>window.location = 'productList.php'</script>";
}
else
{
    $product_id = $_GET['product_id'];
}
$get_product = $product->get_product($product_id);
if($get_product)
{
    $row = $get_product->fetch_assoc();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $update_product = $product->update_product($category_id, $product_name,$product_id);
}
?>
<div class="col py-3">
    <form action="" method="post">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Edit type of Product</div>
            <select class="form-select" aria-label="Default select example" name ="category_id">
                <option selected>-- Select type of Product</option>
                <?php
                $show_category = $product->show_category();
                if($show_category)
                {
                    while($result = $show_category->fetch_assoc())
                    {
                ?>
                <option <?php if($row['category_id'] == $result['category_id']) {
                    echo "SELECTED";
                } ?>  value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name'];?></option>
                <?php
                                    }
                                }
                ?>
            </select>
            <input required type="text" class="form-control mt-2" id="add-category" placeholder="Nhập tên loại sản phẩm"
                name="product_name" value= "<?php echo $row['product_name']; ?>">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
</div>
</div>
</div>
</main>
</body>

</html>