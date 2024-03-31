<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Core\Validation;
use App\Core\Sessions;
use App\Models\UserModel;

class LoginController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    public function LoginController()
    {
        $this->LoginPage();

    }

    public function LoginPage()
    {
        $this->_renderBase->renderLogin();
    }

    public function handleLogin()
    {
        if (isset($_POST['login'])) {

            $username = $_POST["username"];
            $password = $_POST['password'];

            
            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field.";
                } else {
                    if ($field === 'password' && !Validation::ValidationPassword($value)) {
                        $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường, số và ký tự đặc biệt.";
                    }
                    else{
                        if (Validation::CheckEmtpy($username)) {
                            $errors['username'] = "Vui lòng nhập username.";
                        } else if (!Validation::ValidationUsername($username)) {
                            $errors['username'] = "Username phải từ 6-12 ký tự và chỉ chứa chữ cái và số.";
                        }
                    }
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=LoginController/LoginPage");
            }

            $usermodel = new UserModel;
            $user = $usermodel->checkLogin($_POST["username"]);
            if (!$user) {
                echo '<script>alert("Người dùng không tồn tại")</script>';
                $this->LoginPage();
            } else {
                
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    header("Location: " . ROOT_URL . "/?url=HomeController/homePage");
                    echo '<script>alert("Đăng nhập thành công")</script>';
                } else {
                    // Hiển thị form đăng nhập với thông báo lỗi
                    echo '<script>alert("Đăng nhập không thành công")</script>';
                    $this->LoginPage();
                }
            }

        }
    }



    public function logout()
    {
        session_destroy();
        header("Location: " . ROOT_URL . "/");
    }

}