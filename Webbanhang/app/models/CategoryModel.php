<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy danh sách tất cả các category
    public function getCategories()
    {
        $query = "SELECT id, name, description FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    // Thêm một category mới
    public function addCategory($name, $description)
    {
        // Chuẩn bị câu lệnh SQL để thêm category
        $query = "INSERT INTO " . $this->table_name . " (name, description) VALUES (:name, :description)";
        $stmt = $this->conn->prepare($query);

        // Gắn giá trị vào các tham số
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
}
?>
