<?php
include '../class/user_class.php';
?>
<?php
$user = new User();
if(!isset($_GET['user_id']) || $_GET['user_id'] == '')
{
    echo "<script>window.location = 'userList.php'</script>";
}
else
{
    $user_id = $_GET['user_id'];
}
$delete_user = $user->delete_user($user_id);
?>