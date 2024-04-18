<?php
include '../class/shoe_class.php';
?>
<?php
$shoe = new Shoe();
if(!isset($_GET['shoe_id']) || $_GET['shoe_id'] == '')
{
    echo "<script>window.location = 'shoeList.php'</script>";
}
else
{
    $shoe_id = $_GET['shoe_id'];
}
$delete_shoe = $shoe->delete_shoe($shoe_id);
?>