<?php
include "../module/database.php";
?>
<?php
class Shoe
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY category_id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.category_name FROM tbl_product INNER JOIN tbl_category ON tbl_product.category_id = tbl_category.category_id 
        ORDER BY tbl_product.product_id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_shoe($shoe_name, $shoe_brand, $shoe_price, $shoe_price_discount, $category_name, $product_name, $shoe_details, $shoe_img, $shoe_img_extra)
    {
        // Path to save extra_shoe_img
        $projectRoot = $_SERVER['DOCUMENT_ROOT'] . '/BTL_WEB_NEW/';
        $uploadDirect = $projectRoot . 'img/shoe_extra/';

        $query = "INSERT INTO tbl_shoe (shoe_name,shoe_brand,shoe_price,shoe_price_discount,category_id,product_id,shoe_details,shoe_img) VALUES ('$shoe_name', '$shoe_brand', '$shoe_price','$shoe_price_discount','$category_name', '$product_name','$shoe_details','$shoe_img' )";
        $result = $this->db->insert($query);
        if ($result) {
            $query = "SELECT * FROM tbl_shoe ORDER BY shoe_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $shoe_id = $result['shoe_id'];
            $filename = $_FILES['shoe-img-extra']['name'];
            $filetmp = $_FILES['shoe-img-extra']['tmp_name'];
            foreach ($filename as $key => $value) {
                move_uploaded_file($filetmp[$key], $uploadDirect . $value);
                $query = "INSERT INTO tbl_shoe_img_extra (shoe_id,shoe_img_extra) VALUES ('$shoe_id', '$value')";
                $result = $this->db->insert($query);
            }
            echo "<script>window.location.href='shoeList.php';</script>";
        }
        return $result;
    }

    public function show_product_ajax($category_id)
    {
        $query = "SELECT * FROM tbl_product WHERE category_id = '$category_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_shoe()
    {
        $query = "SELECT tbl_shoe.*, tbl_category.category_name, tbl_product.product_name 
        FROM tbl_shoe 
        INNER JOIN tbl_category ON tbl_shoe.category_id = tbl_category.category_id 
        INNER JOIN tbl_product ON tbl_shoe.product_id = tbl_product.product_id 
        ORDER BY tbl_shoe.shoe_id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_shoe($shoe_id)
    {
        $query = "DELETE FROM tbl_shoe WHERE shoe_id = '$shoe_id'";
        $result = $this->db->delete($query);
        if ($result) {
            echo "<script>window.location.href='shoeList.php';</script>";
        }
        return $result;
    }

    public function get_shoe($shoe_id)
    {
        $query = "SELECT * FROM tbl_shoe WHERE shoe_id = '$shoe_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_shoe($shoe_id, $shoe_name, $shoe_brand, $shoe_price, $shoe_price_discount, $category_id, $product_id, $shoe_details, $shoe_img)
    {
        $query = "UPDATE tbl_shoe SET shoe_name = '$shoe_name', shoe_brand = '$shoe_brand', shoe_price = '$shoe_price',shoe_price_discount = '$shoe_price_discount',category_id = '$category_id',product_id = '$product_id', shoe_details = '$shoe_details', shoe_img = '$shoe_img' WHERE shoe_id = '$shoe_id'";
        $result = $this->db->update($query);
        if ($result) {
            echo "<script>window.location.href='shoeList.php';</script>";
        }
        return $result;
    }









































}
?>