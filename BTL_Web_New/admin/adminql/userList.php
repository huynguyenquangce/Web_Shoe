<?php
include "headers.php";
include "left_sidebar.php";
include '../class/user_class.php';
?>
<?php
$user = new User();
$showuser = $user->show_user();
$i = 0;
?>
<div class="admin_content_right container-fluid">
    <div class="admin_content_right_category_list">
        <div class="h2 text-primary p-4 row">User</div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Order</th>
                    <th scope="col">User_ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($showuser) {
                    $i = 0;
                    while ($result = $showuser->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['password']; ?></td>
                            <td><?php echo $result['first_name']; ?></td>
                            <td><?php echo $result['last_name']; ?></td>
                            <td><?php echo $result['phone_number']; ?></td>
                            <td>
                                <a href="user_delete.php?user_id=<?php echo $result['id'];?>" class="btn btn-danger mx-2">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>