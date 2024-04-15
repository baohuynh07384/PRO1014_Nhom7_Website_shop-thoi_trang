<?php

namespace App\Controllers;

use App\Core\RenderBase;

use App\Core\Sessions;
use App\Core\Validation;
use App\Models\ProductModel;

use App\Models\CategoriesModel;
use App\Models\ImagesModel;



class ProductController extends BaseController
{

    private $_renderBase;




    private $_categories;
    private $_product;
    private $_image;



    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_categories = new CategoriesModel();
        $this->_product = new ProductModel();
        $this->_image = new ImagesModel();
    }

    public function ProductController()
    {
        $this->CreateProductPage();
    }

    public function CreateProductPage()
    {
        $data = $this->_categories->getListCate();
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/createproduct', $data);
        $this->_renderBase->renderAdminFooter();
    }


    public function ListProductPage()
    {
        $images = $this->_image->getImages();
        $products = $this->_product->getProduct();
        $data = [
            'images' => $images,
            'products' => $products
        ];
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/list-product', $data);
        $this->_renderBase->renderAdminFooter();
    }
    public function UpdateProductPage($id)
    {
        $pro = $this->_product->getProductID($id);
        $cate = $this->_categories->getListCate();

        $data = [
            "product" => $pro,
            "category" => $cate,
        ];
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/updateproduct', $data);
        $this->_renderBase->renderAdminFooter();
    }
    public function create()
    {
        if (isset($_POST['upload'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image = array();
            for ($index = 0; $index < sizeof($_FILES['image']['name']); $index++) {
                $arrayItem = array(
                    "name" => $_FILES['image']['name'][$index],
                    "type" => $_FILES['image']['type'][$index],
                    "tmp_name" => $_FILES['image']['tmp_name'][$index],
                    "error" => $_FILES['image']['error'][$index],
                    "size" => $_FILES['image']['size'][$index],
                );
                array_push($image, $arrayItem);
            }
            $errors = [];
            $data = [
                'tên sản phẩm' => $name,
                'ảnh' => $image,
                'giá' => $price,
                'số lượng' => $quantity,
                'danh mục' => $category,
                'mô tả' => $description,
                'trạng thái' => $status,

            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field.";
                } else {
                    if ($field == 'giá' || $field == 'số lượng') { // Chỉ kiểm tra giá và số lượng
                        if (!Validation::isNumber($value)) {
                            $errors[$field] = "$field phải là một số.";
                        }
                    }
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
                $insert = $ProductModel->create([
                    'name' => $name,
                    'price' => $price,
                    'status' => $status,
                    'quantity' => $quantity,
                    'description' => $description,
                    'categories_id' => $category
                ]);


                if ($insert) {
                    $idpro = $ProductModel->product_id;
                    for ($index = 0; $index < sizeof($image); $index++) {
                        $file = $image[$index]['name'];
                        $error = $image[$index]['error'];
                        if ($error === 0) {
                            $uploadDir = UPLOAD_PATH . basename($file = $image[$index]['name']);
                            $imageModel = new ImagesModel();
                            move_uploaded_file($image[$index]['tmp_name'], $uploadDir);
                            $imageModel->create(['path' => $file, 'product_id' => $idpro]);
                            echo '<script>alert("Thêm sản phẩm thành công"); window.location.href = "' . ROOT_URL . '/?url=ProductController/ListProductPage";</script>';
                        }
                    }
                }
            }
        }
    }
    public function update($id)
    {
        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $idimg = $_POST['idimg'];
            $changedImageIndexes = [];
            for ($index = 0; $index < sizeof($_FILES['image']['name']); $index++) {

                if (!empty($_FILES['image']['name'][$index])) {

                    $changedImageIndexes[] = $index;
                }
            }
            $ProductModel = new ProductModel();
            $insert = $ProductModel->edit([
                'name' => $name,
                'price' => $price,
                'status' => $status,
                'quantity' => $quantity,
                'description' => trim($description),
                'categories_id' => $category
            ], $id);
            if ($insert) {
                foreach ($changedImageIndexes as $changedIndex) {
                    $file = $_FILES['image']['name'][$changedIndex];
                    $error = $_FILES['image']['error'][$changedIndex];
                    $id = $idimg[$changedIndex];
                    if ($error === 0) {
                        $uploadDir = UPLOAD_PATH . basename($file);
                        $imageModel = new ImagesModel();
                        move_uploaded_file($_FILES['image']['tmp_name'][$changedIndex], $uploadDir);
                        $b = $imageModel->edit(['path' => $file], $id);
                        var_dump($b);
                        echo '<script>alert("Thêm sản phẩm thành công"); window.location.href = "' . ROOT_URL . '/?url=ProductController/ListProductPage";</script>';
                    }
                }
                for ($index = 0; $index < sizeof($idimg); $index++) {
                    if (!in_array($index, $changedImageIndexes)) {
                        $id = $idimg[$index];
                    }
                }
            }
        }
    }
}
