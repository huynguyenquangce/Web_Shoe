<?php
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
$delete_category = $category->delete_category($category_id);
?>