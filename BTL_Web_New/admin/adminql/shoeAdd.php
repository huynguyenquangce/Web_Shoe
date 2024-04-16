<?php
include "headers.php";
include "left_sidebar.php";
include '../class/shoe_class.php';
?>
<?php
$projectRoot = $_SERVER['DOCUMENT_ROOT'] . '/BTL_WEB_NEW/';
$uploadDir = $projectRoot . 'img/shoe/';
$shoe = new Shoe();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shoe_name = $_POST['shoe_name'];
    $shoe_brand = $_POST['shoe_brand'];
    $shoe_price = $_POST['shoe_price'];
    $shoe_price_discount = $_POST['shoe_price_discount'];
    $category_id = $_POST['category_id'];
    $product_id = $_POST['product_id'];
    $shoe_details = $_POST['shoe-details'];
    $shoe_img = $_FILES['shoe-img']['name'];
    $file_img_target = basename($_FILES['shoe-img']['name']);
    $file_img_type = strtolower(pathinfo($shoe_img, PATHINFO_EXTENSION));
    $fize_img_size = $_FILES['shoe-img']['size'];
    if (file_exists($uploadDir . $file_img_target)) {
        echo "File đã tồn tại";
    } else {
        if ($file_img_type != "jpg" && $file_img_type != "png" && $file_img_type != "jpeg") {
            echo "File không đúng định dạng";
        } else {
            if($fize_img_size>1000000)
            {
                echo "File quá 1MB, vui lòng chọn lại file";
            }
            else
            {
            $shoe_img_extra = $_FILES['shoe-img-extra']['name'];
            move_uploaded_file($_FILES['shoe-img']['tmp_name'], $uploadDir . $_FILES['shoe-img']['name']);
            $insert_shoe = $shoe->insert_shoe($shoe_name, $shoe_brand, $shoe_price, $shoe_price_discount, $category_id, $product_id, $shoe_details, $shoe_img, $shoe_img_extra);
        }
        }
    }
}
?>
<style>
    .tall-input {
        height: 200px;
        /* Điều chỉnh chiều cao theo ý muốn của bạn */
    }
</style>
<div class="col py-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Add Shoe Details</div>
            <label for="add-shoe-name" class="fw-bold">Tên sản phẩm:</label>
            <input required type="text" class="form-control mt-2" id="add-shoe-name" placeholder="Nhập tên sản phẩm"
                name="shoe_name">
            <label for="category_name" class="mt-2 fw-bold">Chọn loại danh mục</label>
            <select class="form-select mt-2" aria-label="Default select example" name="category_id" id="category_name">
                <option selected>-- Select Category</option>
                <?php $show_category = $shoe->show_category();
                if ($show_category) {
                    while ($result = $show_category->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category_name']; ?></option>
                    <?php }
                } ?>
            </select>
            <label for="product_name" class="mt-2 fw-bold">Chọn loại sản phẩm</label>
            <select class="form-select" aria-label="Default select example" name="product_id" id="product_name">
                <option selected>-- Select type of Product</option>

            </select>
            <label for="shoe-brand" class="mt-2 fw-bold">Thương hiệu:</label>
            <input required type="text" class="form-control mt-2" id="shoe-brand"
                placeholder="Nhập thương hiệu sản phẩm" name="shoe_brand">
            <label for="shoe-price" class="mt-2 fw-bold">Giá sản phẩm:</label>
            <input required type="text" class="form-control mt-2" id="shoe-price" placeholder="Nhập giá sản phẩm"
                name="shoe_price">
            <label for="shoe-price" class="mt-2 fw-bold">Giá sản phẩm khuyến mãi:</label>
            <input required type="text" class="form-control mt-2" id="shoe-price_discount"
                placeholder="Nhập giá khuyến mãi sản phẩm" name="shoe_price_discount">
            <label for="shoe-details" class="mt-2 fw-bold">Mô tả sản phẩm:</label>
            <br>
            <div id="shoe-details">
                <textarea name="shoe-details" id="editor" cols="200" rows="10" class="mt-2"
                    placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>
            <br>
            <label for="shoe-img" class="fw-bold">Ảnh sản phẩm:</label>
            <input required type="file" class="form-control mt-2" id="shoe-img" name="shoe-img">
            <label for="shoe-img-extra" class="mt-2 fw-bold">Ảnh mô tả sản phẩm:</label>
            <input required multiple type="file" class="form-control mt-2" id="shoe-img-extra" name="shoe-img-extra[]">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
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