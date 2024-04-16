<?php
include '../class/shoe_class.php';
$shoe = new Shoe();
$category_id = $_GET['category_id'];
?>

<?php 
$show_product_ajax = $shoe->show_product_ajax($category_id);
if ($show_product_ajax) {
    while ($row = $show_product_ajax->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></option>
    <?php }
} ?>