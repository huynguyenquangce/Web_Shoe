<?php
include "headers.php";
include "left_sidebar.php";
include '../class/category_class.php';
?>
<?php
$category = new Category();
if(!isset($_GET['category_id']) || $_GET['category_id'] == '')
{
    echo "<script>window.location = 'categoryList.php'</script>";
}
else
{
    $category_id = $_GET['category_id'];
}
$get_category = $category->get_category($category_id);
if($get_category)
{
    $row = $get_category->fetch_assoc();
}
?>

<!-- Update -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
    $update_category = $category->update_category($category_name,$category_id);
}
?>
<div class="col py-3">
    <form action="" method="post">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Edit Category</div>
            <input required type="text" class="form-control mt-2" id="add-category" placeholder="Nhập tên danh mục"
                name="category_name" value = "<?php echo $row['category_name'];?>">
        </div>
        <button type="submit" class="btn btn-primary mt-3" id="btn-edit">Edit</button>
    </form>
</div>
</div>
</div>
</main>
</body>

</html>