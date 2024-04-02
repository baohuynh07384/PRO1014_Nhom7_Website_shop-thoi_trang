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

    function create()
    {
        if (isset($_POST['upload'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $images = array();
            for ($index = 0; $index < sizeof($_FILES['image']['name']); $index++) {
                $arrayItem = array(
                    "name" => $_FILES['image']['name'][$index],
                    "type" => $_FILES['image']['type'][$index],
                    "tmp_name" => $_FILES['image']['tmp_name'][$index],
                    "error" => $_FILES['image']['error'][$index],
                    "size" => $_FILES['image']['size'][$index],
                );
                array_push($images, $arrayItem);
            }
            $error = $_FILES['image']['error'];

            $ProductModel = new ProductModel();

            // Thêm sản phẩm vào cơ sở dữ liệu và lấy ID của sản phẩm vừa thêm
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
                    for ($index = 0; $index < sizeof($images); $index++) {
                        $file = $images[$index]['name'];
                        $error = $images[$index]['error'];
                        if ($error === 0) {
                            $imageModel = new ImagesModel();

                            $imageModel->create(['path' => $file, 'product_id' => $idpro]);
                        }
                    }
                }
                // $idpro = $ProductModel->product_id;
                // $imageModel = new ImagesModel();

                // $imageModel->create(['path' => $_FILES['image']['name'], 'product_id' => $idpro]);


            
            // $errors = [];
            // $data = [
            //     'tên sản phẩm' => $name,
            //     'ảnh' => $image,
            //     'giá' => $price,
            //     'số lượng' => $quantity,
            //     'danh mục'  => $category,
            //     'mô tả' => $description,
            //     'trạng thái' => $status,

            // ];
            // foreach ($data as $field => $value) {
            //     if (Validation::CheckEmtpy($value)) {
            //         $errors[$field] = "Vui lòng nhập $field.";
            //     }
            //     if (Validation::CheckEmtpy($value == $image)) {
            //         Sessions::addSession('ảnh', 'Vui lòng tải ảnh.');
            //     }
            // }
            // if (!empty($errors)) {
            //     foreach ($errors as $key => $error) {
            //         Sessions::addSession($key, $error);
            //     }
            //     return $this->redirect("/?url=ProductController/CreateProductPage");
            // } else {

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


            // Rest of your code

            // header("Location: " . ROOT_URL . "/?url=ProductController/ListProductPage");
        }

    }
}


