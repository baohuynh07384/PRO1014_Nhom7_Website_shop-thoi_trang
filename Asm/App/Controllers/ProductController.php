<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Core\Sessions;
use App\Core\Validation;
use App\Models\ProductModel;
<<<<<<< HEAD
use App\Models\CategoriesModel;
use App\Models\ImagesModel;
=======
>>>>>>> db94819a99d81f6b2b4d5d6c1bb71fe1a4bb91f5

class ProductController extends BaseController
{

    private $_renderBase;
<<<<<<< HEAD
    private $_categories;
    private $_product;
=======
    private $_categories
>>>>>>> db94819a99d81f6b2b4d5d6c1bb71fe1a4bb91f5
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
        $this->_product = new ProductModel();
    }

    function ProductController()
    {
        $this->CreateProductPage();
    }

    function CreateProductPage()
    {
        $data = $this->_categories->getListCate();
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/createproduct', $data);
        $this->_renderBase->renderAdminFooter();
    }

    function ListProductPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListProduct();
        $this->_renderBase->renderAdminFooter();
    }
    public function create() {
        if (isset($_POST['upload'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $image = $_FILES['image']['name'];
            
            $ProductModel = new ProductModel();
            
            // Thêm sản phẩm vào cơ sở dữ liệu và lấy ID của sản phẩm vừa thêm
           $r= $ProductModel->create([
                'name' => $name,
                'price' => $price,
                'status' => $status,
                'quantity' => $quantity,
                'description' => $description,
                'categories_id' => $category
            ]);
                // $idpro = $ProductModel->product_id;
            var_dump($r);
                // $imageModel = new ImagesModel();

                // $imageModel->create(['path' => $_FILES['image']['name'], 'product_id' => $idpro]);


            }
            // Kiểm tra xem đã có ID của sản phẩm hay chưa
            // if ($productId) {
           
            //     // Thêm dữ liệu hình ảnh vào cơ sở dữ liệu với product_id là ID của sản phẩm vừa thêm
                

            }
        }
    // function create()
    // {
    //     if (isset($_POST['upload'])) {
    //         $name = $_POST['name'];
    //         $price = $_POST['price'];
    //         $quantity = $_POST['qty'];
    //         $category = $_POST['category'];
    //         $description = $_POST['description'];
    //         $status = $_POST['status'];
    //         $image = $_FILES['image']['name'];
    //         // $errors = [];
    //         // $data = [
    //         //     'tên sản phẩm' => $name,
    //         //     'ảnh' => $image,
    //         //     'giá' => $price,
    //         //     'số lượng' => $quantity,
    //         //     'danh mục'  => $category,
    //         //     'mô tả' => $description,
    //         //     'trạng thái' => $status,

    //         // ];
    //         // foreach ($data as $field => $value) {
    //         //     if (Validation::CheckEmtpy($value)) {
    //         //         $errors[$field] = "Vui lòng nhập $field.";
    //         //     }
    //         //     if (Validation::CheckEmtpy($value == $image)) {
    //         //         Sessions::addSession('ảnh', 'Vui lòng tải ảnh.');
    //         //     }
    //         // }
    //         // if (!empty($errors)) {
    //         //     foreach ($errors as $key => $error) {
    //         //         Sessions::addSession($key, $error);
    //         //     }
    //         //     return $this->redirect("/?url=ProductController/CreateProductPage");
    //         // } else {
    //             $ProductModel = new ProductModel();
    //             // $listthumbnail = $BlogModel->checkimageexit($_FILES['image']['name']);
    //             // if ($listthumbnail) {
    //             //     $imagename = basename($_FILES['image']['name']);
    //             //     $i = 1;
    //             //     $newImageName = $imagename;
    //             //     $info = pathinfo($imagename);
    //             //     while (file_exists(UPLOAD_URL . $newImageName)) {
    //             //         $newImageName = $info['filename'] . "($i)." . $info['extension'];
    //             //         $i++;
    //             //     }

    //             //     move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_URL . $newImageName);
    //             //     $BlogModel->create(['title' => $name, 'thumbnail' => basename($newImageName), 'author' => $author, 'new_type' => $new_type, 'status' => $status, 'content' => $content]);
    //             //     header("Location: " . ROOT_URL . "/?url=BlogController/ListBlogPage");
    //             // } else {
    //             // move_uploaded_file($_FILES['image']['tmp_name'], $image);
    //             $productid = $ProductModel->create(['name' => $name, 'price' => $price, 'status' => $status, 'quantity' => $quantity, 'description' => $description, 'categories_id' => $category]);
    //             $idpro = $ProductModel->getidpro();
    //             foreach($idpro as $items){
    //                 if($productid){
    //                     $imageModel = new ImagesModel();
    //                     $imageModel->create(['path' => $image, 'product_id' => $items]);
    //                 }
    //             }
                
    //                 // Rest of your code
           
    //             // header("Location: " . ROOT_URL . "/?url=ProductController/ListProductPage");
    //         }
    //     }
    
