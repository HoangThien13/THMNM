<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Phương thức thêm category mới
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận dữ liệu từ form gửi lên
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Kiểm tra dữ liệu
            if (empty($name)) {
                $error = 'Category name is required!';
            } else {
                // Gọi phương thức trong model để thêm category
                $result = $this->categoryModel->addCategory($name, $description);

                if ($result) {
                    // Nếu thành công, chuyển hướng về danh sách category
                    header('Location: /categories');
                    exit();
                } else {
                    $error = 'Failed to add category!';
                }
            }
        }

        // Hiển thị form thêm category
        include 'app/views/category/add.php';
    }
}
?>