<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Core\Validation;
use App\Core\Sessions;
use App\Models\BlogModel;
use App\Models\CategoriesModel;
use App\Models\ImagesModel;
use App\Models\OrderModel;
use App\Models\CommentsModel;
use App\Models\CartsModel;

class ClientHomeController extends BaseController
{

    private $_renderBase;

    private $_user;

    private $_blog;

    private $_product;

    private $_category;

    private $_image;
    private $_order;

    private $_comment;



    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_user = new UserModel();
        $this->_blog = new BlogModel();
        $this->_product = new ProductModel();
        $this->_category = new CategoriesModel();
        $this->_image = new ImagesModel();
        $this->_order = new OrderModel();
        $this->_comment = new CommentsModel();
    }



    public function ClientCategoriesPage()
    {
        
        $products = $this->_product->getProduct();   
        $images = $this->_image->getImages();
        $categories = $this->_category->getCateClient();
        $data = [
            'images' => $images,
            'products' => $products,
            'categories' => $categories,
        ];
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/store', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function ClientCategoriesPageID($id)
    {
        $images = $this->_image->getImages();
        $products = $this->_product->getProductCate($id);


        $categories = $this->_category->getCateClient();
        $data = [
            'images' => $images,
            'products' => $products,
            'categories' => $categories
        ];

        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/categories', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function ClientProductPage($id)
    {
        $products = $this->_product->getDetailProduct($id);
        $comments = $this->_comment->getAllComments($id);
        $data = [
            'comments' => $comments,
            'products' => $products
        ];

        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/product', $data);
        $this->_renderBase->renderClientFooter();

    }

    public function ClientHomeController()
    {
        $this->ClientHomePage();
    }

    public function ClientHomePage()
    {
        $images = $this->_image->getImages();
        $products = $this->_product->getProduct();
        
        $categories = $this->_category->getCateClient();
        $data = [
            'images' => $images,
            'products' => $products,
            'categories' => $categories
        ];

        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/home', $data);
        $this->_renderBase->renderClientFooter();
    }


    public function ClientCartPage()
    {
        $id = $_SESSION['user']['id'];
        $orders = $this->_order->getCart($id);
        $images = $this->_image->getImages();
        $data = [
            'images' => $images,
            'orders' => $orders,
        ];
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/cart', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function addComment()
    {
        if (isset($_POST['submit'])) {
            $user_id = $_POST['userid'];
            $pro_id = $_POST['proid'];
            $content = $_POST['content'];
            $comment = new CommentsModel();
            if (Validation::CheckEmtpy($content)) {
                Sessions::addSession("content", "Vui lòng nhập bình luận");
                return $this->redirect("?url=ClientHomeController/ClientProductPage/" . $pro_id);
            }
            $comment->create(['user_id' => $user_id, 'product_id' => $pro_id, 'content' => $content]);
            $_SESSION['success'] = 'Thêm bình luận thành công';
            header("Location: ?url=ClientHomeController/ClientProductPage/" . $pro_id);


        }
    }

    public function deleteComment($id)
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['delete'];
            $pro_id = $_POST['proid'];
            $comment = new CommentsModel();
            $resultDelete = $comment->deleteComment($id);
            if (!$resultDelete) {
                die("Không thể xóa dữ liệu!");
            }
            $_SESSION['success'] = 'Xóa bình luận thành công';
            header("Location: ?url=ClientHomeController/ClientProductPage/" . $pro_id);
        }
    }
    public function updateComment($id)
    {
        $pro_id = $_POST['proid'];
        $products = $this->_product->getDetailProduct($pro_id);
        $comments = $this->_comment->getAllComments($pro_id);
        $updatecomments = $this->_comment->getComment($id);
        $data = [
            'updatecomments' => $updatecomments,
            'comments' => $comments,
            'products' => $products
        ];
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/product', $data);
        $this->_renderBase->renderClientFooter();
    }
    public function editComment($id)
    {
        if (isset($_POST['submit'])) {
            $user_id = $_POST['userid'];
            $pro_id = $_POST['proid'];
            $content = $_POST['content'];
            $comment = new CommentsModel();
            if (Validation::CheckEmtpy($content)) {
                Sessions::addSession("content", "Vui lòng nhập bình luận");
                return $this->redirect("?url=ClientHomeController/updateComment/" . $id);
            }
            $comment->updateComment(['user_id' => $user_id, 'product_id' => $pro_id, 'content' => $content], $id);
            $_SESSION['success'] = "Cập nhập bình luận thành công";
            header("Location: " . ROOT_URL . "?url=ClientHomeController/ClientProductPage/" . $pro_id);

        }
    }
    public function addCart()
    {
        if (isset($_POST['submit'])) {
            $user_id = $_POST['userid'];
            $pro_id = $_POST['proid'];
            $price = $_POST['price'];
            $size = $_POST['size'];
            $qty = $_POST['qty'];
            $cart = new CartsModel();
            $check = $cart->checkcart($pro_id, $size);

            if ($check) {
                $new_qty = $check['quantity'] + $qty;
                $cart->updatecart(['quantity' => $new_qty], $pro_id, $size);
                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
            } else {
                $cart->create(['product_id' => $pro_id, 'user_id' => $user_id, 'price' => $price, 'size' => $size, 'quantity' => $qty]);
                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công';
            }
            header('Location: /?url=ClientHomeController/ClientCartPage');


        }
    }

    public function ClientCheckoutPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->_renderBase->renderCheckoutPage();
        $this->_renderBase->renderClientFooter();
    }

    public function ClientBlogsPage()
    {
        $data = $this->_blog->getAllBlogClient();
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/blogs', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function ClientBlogDetailPage($id)
    {
        $data = $this->_blog->getwithid($id);
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/blog_detail', $data);
        $this->_renderBase->renderClientFooter();
    }

    function ClientContactPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->_renderBase->renderContactPage();
        $this->_renderBase->renderClientFooter();
    }


    //Phần này là của Account client

    public function showAccount()
    {
        $userData = $_SESSION['user'];
        $data = $this->_user->getOneUser($userData['id']);
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/account', $data);
        $this->_renderBase->renderClientFooter();
    }

    public function showUpdateAccount()
    {

        $userData = $_SESSION['user'];
        $data = $this->_user->getOneUser($userData['id']);
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/update_account', $data);
        $this->_renderBase->renderClientFooter();

    }

    public function updateAccount()
    {
        if (isset($_POST['save'])) {
            $user_id = $_POST['user_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['image_old'];

            if ($new_image != '') {
                $update_image = $new_image;
                if (file_exists(UPLOAD_PATH . basename($_FILES["image"]["name"]))) {
                    $_SESSION['error'] = "Ảnh đã tồn tại";
                    header("Location:" . ROOT_URL . "/?url=ClientHomeController/showUpdateAccount");
                    exit();
                } else {
                    $update_image = $new_image;
                }
            } else {
                $update_image = $old_image;
            }
            $userModel = $this->_user;
            $updateResult = $userModel->updateUser(['name' => $name, 'email' => $email, 'address' => $address, 'phone' => $phone, 'image' => $update_image], $user_id);
            if ($updateResult) {
                if ($new_image != '') {
                    $target_path = UPLOAD_PATH . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                    unlink(UPLOAD_PATH . $old_image);
                }
                $_SESSION['success'] = "Cập nhật thành công";
                header("Location: " . ROOT_URL . "/?url=ClientHomeController/showAccount");
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật người dùng.";
            }
        }
    }



    public function changePassAccount()
    {
        $this->_renderBase->renderClientHeader();
        $this->_renderBase->renderChangePass();
        $this->_renderBase->renderClientFooter();
    }

    public function changePass()
    {
        if (isset($_POST['save'])) {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $repass = $_POST['repass'];

            $data = [
                'mật khẩu cũ' => $_POST['old_pass'],
                'mật khẩu mới' => $_POST['new_pass'],
                'xác nhận mật khẩu' => $_POST['repass'],
            ];


            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field";
                } else {
                    if ($field === 'mật khẩu mới' && !Validation::ValidationPassword($new_pass)) {
                        $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường và số.";
                    }
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=ClientHomeController/changePassAccount");
            }
            $userData = $_SESSION['user']['password'];

            $password_verify = password_verify($old_pass, $userData);

            if ($password_verify === false) {
                $_SESSION['error'] = "Mật khẩu cũ không đúng";
                header('Location: ?url=ClientHomeController/changePassAccount');
                exit;
            } elseif ($new_pass !== $repass) {
                $_SESSION['error'] = "Mật khẩu mới và Xác nhận mật khẩu phải giống nhau";
                header('Location: ?url=ClientHomeController/changePassAccount');
                exit;
            } else {
                $userModel = $this->_user;
                $updateResult = $userModel->updateUser(['password' => password_hash($new_pass, PASSWORD_DEFAULT)], $_SESSION['user']['id']);
                if ($updateResult) {
                    $_SESSION['success'] = "Đổi mật khẩu thành công";
                    header('Location: ?url=ClientHomeController/showAccount');
                    exit;
                } else {
                    $_SESSION['error'] = "Đổi mật khẩu thất bại";
                    header('Location: ?url=ClientHomeController/changePassAccount');
                    exit;
                }
            }



        }
    }

    public function orderPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/order_page');
        $this->_renderBase->renderClientFooter();
    }

    public function blogPage()
    {
        $this->_renderBase->renderClientHeader();
        $this->load->render('layouts/client/blog_detail');
        $this->_renderBase->renderClientFooter();
    }
}