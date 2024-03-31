<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Core\Sessions;
use App\Core\Validation;
use App\Models\ProductModel;

class ProductController extends BaseController
{

    private $_renderBase;
    private $_categories
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

    function ProductController()
    {
        $this->CreateProductPage();
    }

    function CreateProductPage()
    {

        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderProduct();
        $this->_renderBase->renderAdminFooter();
    }

    function ListProductPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListProduct();
        $this->_renderBase->renderAdminFooter();
    }
    function create()
    {
        if (isset($_POST['upload'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image = $_FILES['image']['name'];
            $errors = [];
            $data = [
                'tên sản phẩm' => $name,
                'ảnh' => $image,
                'giá' => $price,
                'số lượng' => $quantity,
                'danh mục'  => $category,
                'mô tả' => $description,
                'trạng thái' => $status,

            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field.";
                }
                if (Validation::CheckEmtpy($value == $image)) {
                    Sessions::addSession('ảnh', 'Vui lòng tải ảnh.');
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=ProductController/CreateProductPage");
            } else {
                $ProductModel = new ProductModel();
                // $listthumbnail = $BlogModel->checkimageexit($_FILES['image']['name']);
                // if ($listthumbnail) {
                //     $imagename = basename($_FILES['image']['name']);
                //     $i = 1;
                //     $newImageName = $imagename;
                //     $info = pathinfo($imagename);
                //     while (file_exists(UPLOAD_URL . $newImageName)) {
                //         $newImageName = $info['filename'] . "($i)." . $info['extension'];
                //         $i++;
                //     }

                //     move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_URL . $newImageName);
                //     $BlogModel->create(['title' => $name, 'thumbnail' => basename($newImageName), 'author' => $author, 'new_type' => $new_type, 'status' => $status, 'content' => $content]);
                //     header("Location: " . ROOT_URL . "/?url=BlogController/ListBlogPage");
                // } else {
                // move_uploaded_file($_FILES['image']['tmp_name'], $image);
                $ProductModel->create(['name' => $name, 'price' => $price, 'status' => $status, 'quantity' => $quantity, 'description' => $description]);
                // header("Location: " . ROOT_URL . "/?url=ProductController/ListProductPage");
            }
        }
    }
}
