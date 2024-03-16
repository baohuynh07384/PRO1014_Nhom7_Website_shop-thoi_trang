<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;
use App\Core\Sessions;
use App\Core\Validation;

class RegristerController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    function RegristerController()
    {
        $this->RegristerPage();

    }

    function RegristerPage()
    {
        $this->_renderBase->renderRegrister();

    }
    // function handleRegister()
    // {
    //     if (isset($_POST['register'])) {

    //         $errors = [];
    //         $username = $_POST['username'];
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];
    //         $data = [
    //             'username' => $_POST['username'],
    //             'email' => $_POST['email'],
    //             'password' => $_POST['password'],
    //         ];
    //         foreach ($data as $field => $value) {
    //             if (Validation::CheckEmtpy($value)) {
    //                 $errors[$field] = "Vui lòng nhập $field.";
    //             } else {
    //                 if ($field === 'email' && !Validation::ValidationEmail($value)) {
    //                     $errors[$field] = "Định dạng email không đúng.";
    //                 } else if ($field === 'password' && !Validation::ValidationPassword($value)) {
    //                     $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường, số và ký tự đặc biệt.";
    //                 } else {
    //                     if (Validation::CheckEmtpy($username)) {
    //                         $errors['username'] = "Vui lòng nhập username.";
    //                     } else if (!Validation::ValidationUsername($username)) {
    //                         $errors['username'] = "Username phải từ 6-12 ký tự và chỉ chứa chữ cái và số.";
    //                     }
    //                 }
    //             }
    //         }
    //         if (!empty($errors)) {
    //             foreach ($errors as $key => $error) {
    //                 Sessions::addSession($key, $error);
    //             }
    //             return $this->redirect("/?url=RegristerController/RegristerPage");
    //         }
    //         $userModel = new UserModel();
    //         $user = $userModel->checkUserExist($_POST["username"], $_POST["email"]);
    //         if ($user) {
    //             echo '<script>alert("Tài khoản đã tồn tại!"); window.location.href = "' . ROOT_URL . '/?url=RegristerController/RegristerPage";</script>';
    //         } else {
    //             $hash_password = password_hash($password, PASSWORD_DEFAULT);
    //             $userModel->registerUser(['username' => $username, 'email' => $email, 'password' => $hash_password, 'role' => 0, 'status' => 1, 'image' => '', 'address' => '', 'phone' => (int) '', 'create_at' => date('Y-m-d')]);
    //             echo '<script>alert("Đăng kí thành công"); window.location.href = "' . ROOT_URL . '/?url=RegristerController/RegristerPage";</script>';
    //         }
            
    //     }
    // }
}