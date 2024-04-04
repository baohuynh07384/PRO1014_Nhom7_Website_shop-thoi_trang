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
        if (!isset($_SESSION['user'])) {
            if (isset($_POST['submit'])) {

                $email = $_POST["email"];
                $password = $_POST['password'];
                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                ];
                foreach ($data as $field => $value) {
                    if (Validation::CheckEmtpy($value)) {
                        $errors[$field] = "Vui lòng nhập $field.";
                    } else {
                        if ($field === 'password' && !Validation::ValidationPassword($password)) {
                            $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường và số.";
                        } else {
                            if (Validation::CheckEmtpy($email)) {
                                $errors['email'] = "Vui lòng nhập email.";
                            } else if (!Validation::ValidationEmail($email)) {
                                $errors['email'] = "email không đúng định dạng.";
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
                $user = $usermodel->checkLogin($email, 'password');


                if (!$user) {
                    $_SESSION['success'] = 'Người dùng không tồn tại';
                    $this->LoginPage();
                } else {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user'] = $user;
                        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                            $_SESSION['success'] = 'Đăng nhập thành công';
                            header("Location: " . ROOT_URL . "/?url=HomeController/homePage");
                            exit();
                        } else {
                            $_SESSION['success'] = 'Đăng nhập thành công';
                            header("Location: " . ROOT_URL . "/?url=ClientHomeController/ClientHomePage");
                            exit();
                        }

                    } else {
                        // Hiển thị form đăng nhập với thông báo lỗi
                        $_SESSION['success'] = 'Đăng nhập không thành công';
                        $this->LoginPage();
                    }
                }
            }
        }else if
             ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                header("Location: " . ROOT_URL . "/?url=HomeController/homePage");
                exit();
            } else {
                header("Location: " . ROOT_URL . "/?url=ClientHomeController/ClientHomePage");
                exit();
            }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: " . ROOT_URL . "/?url=ClientHomeController/ClientHomePage");
    }

}