<?php
include "../module/database.php";
?>
<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_product($category_id, $product_name)
    {
        $query = "INSERT INTO tbl_product (category_id, product_name) VALUES ('$category_id','$product_name')";
        $result = $this->db->insert($query);
        if ($result) {
            echo "<script>window.location.href='productList.php';</script>";
        }
        return $result;
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

    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($category_id, $product_name,$product_id)
    {
        $query = "UPDATE tbl_product SET product_name = '$product_name', category_id = '$category_id' WHERE product_id = '$product_id'";
        $result = $this->db->update($query);
        if ($result) {
            echo "<script>window.location.href='productList.php';</script>";
        }
        return $result;
    }

    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->delete($query);
        if ($result) {
            echo "<script>window.location.href='productList.php';</script>";
        }
        return $result;
    }
}
?>