<?php
include "headers.php";
include "left_sidebar.php";
include '../class/category_class.php';
?>
<?php
$category = new Category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $insert_category = $category->insert_category($category_name);
}
?>
<div class="col py-3">
    <form action="" method="post">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Add Category</div>
            <input required type="text" class="form-control mt-2" id="add-category" placeholder="Nhập tên danh mục"
                name="category_name">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>
</div>
</div>
</div>
</main>
</body>
</html>