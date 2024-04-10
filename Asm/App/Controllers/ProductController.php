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
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListProduct();
        $this->_renderBase->renderAdminFooter();
    }

    public function create()
    {
        if (isset($_POST['upload'])) {
            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //     if (isset($_FILES['files'])) {
            //         $files = $_FILES['files'];
            //     } else {
            //         echo 'FilePond không tải dữ liệu lên.';
            //     }
            // }
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

                            $imageModel = new ImagesModel();

                            $imageModel->create(['path' => $file, 'product_id' => $idpro]);
                        }
                    }
                }
                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                header('Location: /?url=ProductController/ListProductPage');
                exit;
            }
        }
    }
}
