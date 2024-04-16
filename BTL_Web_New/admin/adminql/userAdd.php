<?php
include "headers.php";
include "left_sidebar.php";
include '../class/user_class.php';
?>
<?php
$user = new User();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_password = $_POST['user_password'];
    $user_phonenumber = $_POST['user_phonenumber'];
    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay không
    $existing_user = $user->get_user_by_email($email);
    if ($existing_user) {
        echo "Email đã tồn tại. Vui lòng chọn một email khác.";
    } else {
        $insert_user = $user->insert_user($first_name, $last_name, $email, $user_password, $user_phonenumber);
    }
}
?>
<div class="col py-3">
    <form action="" method="post">
        <div class="form-group">
            <div class="h2 text-primary p-4 row">Add Category</div>
            <label for="first_name" class="fw-bold">Nhập tên:</label>
            <input required type="text" class="form-control mt-2" id="first_name" placeholder="Nhập tên người dùng"
                name="first_name">
            <label for="last_name" class="fw-bold">Nhập họ:</label>
            <input required type="text" class="form-control mt-2" id="last_name" placeholder="Nhập họ người dùng"
                name="last_name">
            <label for="email" class="fw-bold">Nhập Email:</label>
            <input required type="email" class="form-control mt-2" id="email" placeholder="Nhập email" name="email">
            <label for="user_password" class="fw-bold">Nhập password:</label>
            <input required type="password" class="form-control mt-2" id="user_password" placeholder="Nhập password"
                name="user_password">
            <label for="user_phonenumber" class="fw-bold">Nhập số điện thoại:</label>
            <input required type="number" class="form-control mt-2" id="user_phonenumber"
                placeholder="Nhập số điện thoại" name="user_phonenumber">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add User</button>
    </form>
</div>
</div>
</div>
</main>
</body>

</html>