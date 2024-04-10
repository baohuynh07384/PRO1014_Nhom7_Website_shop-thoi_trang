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
        if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
            header("Location: /?url=HomeController/homePage");
        } else if ($_SESSION['role']== 0){
            header("Location: /?url=ClientHomeController/ClientHomePage");
        } else{
            $this->RegristerPage();
        }

    }

    function RegristerPage()
    {
        $this->_renderBase->renderRegrister();

    }
    function handleRegister()
    {
        if (isset($_POST['submit'])) {

            $errors = [];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $username = strstr($email, '@', true);
            $password = $_POST['password'];
            $data = [
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field.";
                } else {
                    if ($field === 'email' && !Validation::ValidationEmail($value)) {
                        $errors[$field] = "Email không đúng định dạng.";
                    } else if ($field === 'password' && !Validation::ValidationPassword($value)) {
                        $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường và số.";
                    } else {
                        if (Validation::CheckEmtpy($phone)) {
                            $errors['phone'] = "Vui lòng nhập số điện thoại.";
                        } else if (!Validation::ValidationPhone($phone)) {
                            $errors['phone'] = "số điện thoại phải là số.";
                        }
                    }
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=RegristerController/RegristerPage");
            }
            $userModel = new UserModel();
            $user = $userModel->checkUserExist($email);
            if ($user) {
                echo '<script>alert("Tài khoản đã tồn tại!"); window.location.href = "' . ROOT_URL . '/?url=RegristerController/RegristerPage";</script>';
            } else {
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $userModel->registerUser(['email' => $email, 'password' => $hash_password, 'address' => '', 'name' => $username, 'phone' => $phone, 'status' => '1','role' => '0','image' => '' ]);
                echo '<script>alert("Đăng kí thành công"); window.location.href = "' . ROOT_URL . '/?url=RegristerController/RegristerPage";</script>';
            }
        }
    }
}