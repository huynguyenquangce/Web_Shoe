<?php
include "headers.php";
include "left_sidebar.php";
include '../class/shoe_class.php';
?>
<?php
$shoe = new Shoe();
if (!isset($_GET['shoe_id']) || $_GET['shoe_id'] == '') {
    echo "<script>window.location = 'shoeList.php'</script>";
} else {
    $shoe_id = $_GET['shoe_id'];
}
$get_shoe = $shoe->get_shoe($shoe_id);
if ($get_shoe) {
    $row = $get_shoe->fetch_assoc();
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shoe_name = $_POST['shoe_name'];
    $shoe_brand = $_POST['shoe_brand'];
    $shoe_price = $_POST['shoe_price'];
    $shoe_price_discount = $_POST['shoe_price_discount'];
    $category_id = $_POST['category_id'];
    $product_id = $_POST['product_id'];
    $shoe_details = $_POST['shoe-details'];
    $shoe_img = $_FILES['shoe-img']['name'];
    $shoe_img_extra = $_FILES['shoe-img-extra']['name'];
    $update_shoe = $shoe->update_shoe($shoe_id, $shoe_name, $shoe_brand, $shoe_price, $shoe_price_discount, $category_id, $product_id, $shoe_details, $shoe_img, $shoe_img_extra);
}
?>
<div class="col py-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Shoe Details</div>
            <label for="add-shoe-name" class="fw-bold">Tên sản phẩm:</label>
            <input required type="text" class="form-control mt-2" id="add-shoe-name" placeholder="Nhập tên sản phẩm"
                name="shoe_name" value="<?php echo $row['shoe_name']; ?>">
            <label for="category_name" class="mt-2 fw-bold">Chọn loại danh mục</label>
            <select class="form-select mt-2" aria-label="Default select example" name="category_id" id="category_name"
                value="<?php echo $row['category_id']; ?>">
                <option selected>-- Select Category</option>
                <?php $show_category = $shoe->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['category_id']; ?>" <?php if ($result['category_id'] == $row['category_id'])
                               echo 'selected="selected"'; ?>>
                            <?php echo $result['category_name']; ?>
                        </option>
                    <?php }
                } ?>
            </select>
            <label for="product_name" class="mt-2 fw-bold">Chọn loại sản phẩm</label>
            <select class="form-select" aria-label="Default select example" name="product_id" id="product_name">
                <option selected>-- Select type of Product</option>
            </select>
            <label for="shoe-brand" class="mt-2 fw-bold">Thương hiệu:</label>
            <input required type="text" class="form-control mt-2" id="shoe-brand"
                placeholder="Nhập thương hiệu sản phẩm" name="shoe_brand" value="<?php echo $row['shoe_brand']; ?>">
            <label for="shoe-price" class="mt-2 fw-bold">Giá sản phẩm:</label>
            <input required type="text" class="form-control mt-2" id="shoe-price" placeholder="Nhập giá sản phẩm"
                name="shoe_price" value="<?php echo $row['shoe_price']; ?>">
            <label for="shoe-price" class="mt-2 fw-bold">Giá sản phẩm khuyến mãi:</label>
            <input required type="text" class="form-control mt-2" id="shoe-price_discount"
                placeholder="Nhập giá khuyến mãi sản phẩm" name="shoe_price_discount"
                value="<?php echo $row['shoe_price_discount']; ?>">
            <label for="shoe-details" class="mt-2 fw-bold">Mô tả sản phẩm:</label>
            <br>
            <div id="shoe-details">
                <textarea name="shoe-details" id="editor" cols="200" rows="10" class="mt-2"
                    placeholder="Nhập mô tả sản phẩm"><?php echo $row['shoe_details']; ?></textarea>
            </div>
            <br>
            <label for="shoe-img" class="fw-bold">Ảnh sản phẩm:</label>
            <input required type="file" class="form-control mt-2" id="shoe-img" name="shoe-img"
                value="<?php echo $row['shoe_img']; ?>">
            <?php if (!empty($row['shoe_img'])): ?>
                <img src="../../img/shoe/<?php echo $row['shoe_img']; ?>" alt="Ảnh sản phẩm" style="max-width: 200px;"
                    class="mt-2">
            <?php endif; ?>
            <br>
            <label for="shoe-img-extra" class="mt-2 fw-bold">Ảnh mô tả sản phẩm:</label>
            <input required multiple type="file" class="form-control mt-2" id="shoe-img-extra" name="shoe-img-extra[]">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
</div>
</div>
</div>
</main>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function () {
        $("#category_name").change(function () {
            var x = $(this).val();
            $.get("shoeAdd_Ajax.php", { category_id: x }, function (data) {
                $("#product_name").html(data);
            });
        })
    })
</script>
</body>

</html>