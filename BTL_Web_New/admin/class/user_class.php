<?php
include "../module/database.php";
?>
<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function show_user()
    {
        $query = "SELECT * FROM account ORDER BY id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_user($user_id)
    {
        $query = "DELETE FROM account WHERE id = '$user_id'";
        $result = $this->db->delete($query);
        if ($result) {
            echo "<script>window.location.href='userList.php';</script>";
        }
        return $result;
    }

    public function insert_user($first_name,$last_name,$email,$user_password,$user_phonenumber)
    {
        $query = "INSERT INTO account (first_name,last_name,email,phone_number,password) VALUES ('$first_name','$last_name','$email','$user_phonenumber','$user_password')";
        $result = $this->db->insert($query);
        if ($result) {
            echo "<script>window.location.href='userList.php';</script>";
        }
        return $result;
    }

    public function get_user_by_email($email)
    {
        $query = "SELECT * FROM account WHERE email = '$email'";
        $result = $this->db->select($query);
        return $result;
    }

















    public function update_category($category_name, $category_id)
    {
        $query = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$category_id'";
        $result = $this->db->update($query);
        if ($result) {
            echo "<script>window.location.href='categoryList.php';</script>";
        }
        return $result;
    }


}
?>