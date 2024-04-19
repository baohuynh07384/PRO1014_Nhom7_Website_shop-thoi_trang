<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\CategoriesModel;
use App\Core\Validation;
use App\Core\Sessions;

class CategoriesController extends BaseController
{

    private $_renderBase;

    private $_categories;



    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_categories = new CategoriesModel();
    }

    function CategoriesController()
    {
        $this->CreateCategoresPage();
    }

    function CreateCategoresPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderCategories();
        $this->_renderBase->renderAdminFooter();
    }

    public function ListCatPage()
    {
        $data = $this->_categories->getListCate();
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/list-categories', $data);
        $this->_renderBase->renderAdminFooter();
    }



    public function addCategory()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $option = $_POST['option'];
            $target_file = UPLOAD_PATH . basename($_FILES["image"]["name"]);

            $data = [
                'name' => $_POST['name'],
                'option' => $_POST['option'],
                'image' => $_FILES["image"]["name"],
            ];

            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field";
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=CategoriesController/CreateCategoresPage");
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $category = new CategoriesModel();
                $category->createCate(['name' => $name, 'status' => $option, 'image' => basename($_FILES["image"]["name"])]);
                $_SESSION['success'] = 'Thêm danh mục thành công';
                header('Location: /?url=CategoriesController/ListCatPage');
                exit;
            } else {
                echo "Xin lỗi, có lỗi khi tải lên tệp của bạn.";
            }
        }
    }

    public function delete($id)
    {
        if (isset($_POST['deleteCate'])) {
            $id = $_POST['delete_id'];
            $category = new CategoriesModel;
            $resultDelete = $category->deleteCate($id);

            if (!$resultDelete) {
                die("Không thể xóa dữ liệu!");
            }
            $_SESSION['success'] = 'Xóa danh mục thành công';
            header("Location:" . ROOT_URL . "/?url=CategoriesController/ListCatPage");
        }
    }

    public function edit($id)
    {

        $category = new CategoriesModel;
        $cateOne = $category->getOneCate($id);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/updatecategory', $cateOne);
        $this->_renderBase->renderAdminFooter();
    }
    public function editCate($id)
    {

        if (isset($_POST['updateCate'])) {
            $name = $_POST['name'] ?? "";
            $status = $_POST['option'] ?? "";
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['image_old'];

            if ($new_image != '') {
                $update_image = $_FILES['image']['name'];
            } else {
                $update_image = $old_image;
            }
            if (file_exists(UPLOAD_PATH . $_FILES["image"]["name"])) {
                echo '<script>alert("Ảnh đã tồn tại")</script>';
                header("Location:" . ROOT_URL . "/?url=CategoriesController/ListCatPage");
                exit();
            } else {
                $cateModel = new CategoriesModel;
                $updateResult = $cateModel->updateCate(['name' => $name, 'status' => $status, 'image' => $update_image], $id);

                if ($updateResult) {
                    if ($_FILES['image']['name'] != '') {
                        unlink(UPLOAD_PATH . $old_image);
                        move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_PATH . $_FILES["image"]["name"]);
                        
                    }
                    $_SESSION['success'] = "Chỉnh sửa thành công";
                    header("Location: " . ROOT_URL . "/?url=CategoriesController/ListCatPage");
                    exit();
                } else {
                    echo "Có lỗi xảy ra khi cập nhật danh mục.";
                }
            }
        }
    }
}
