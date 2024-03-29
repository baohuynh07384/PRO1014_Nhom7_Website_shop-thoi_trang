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
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                header("Location: /?url=HomeController/homePage");
                exit();
            } else if ($_SESSION['user']['role'] == 0) {
                header("Location: /?url=ClientHomeController/ClientHomePage");
                exit();
            }
        }
        $this->LoginPage();
    }

    public function LoginPage()
    {
        $this->_renderBase->renderLogin();
    }

    public function handleLogin()
    {
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
                echo '<script>alert("Người dùng không tồn tại")</script>';
                $this->LoginPage();
            } else {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                        echo '<script>alert("Đăng nhập thành công")</script>';
                        header("Location: " . ROOT_URL . "/?url=HomeController/homePage");
                        exit();
                    } else {
                        echo '<script>alert("Đăng nhập thành công")</script>';
                        header("Location: " . ROOT_URL . "/?url=ClientHomeController/ClientHomePage");
                        exit();
                    }

                } else {
                    // Hiển thị form đăng nhập với thông báo lỗi
                    echo '<script>alert("Đăng nhập không thành công")</script>';
                    $this->LoginPage();
                }
            }
        }
    }

    // public function handleLogin()
    // {

    //     if (isset($_POST['submit'])) {

    //         $email = $_POST["email"];
    //         $password = $_POST['password'];

    //         // Validation
    //         if (Validation::CheckEmtpy($email) && Validation::CheckEmtpy($password)) {
    //             Sessions::addSession("email", "Vui lòng nhập email");
    //             Sessions::addSession("password", "Mật khẩu không được bỏ trống");
    //             return $this->redirect("/?url=LoginController/LoginPage");
    //         }

    //         // Sử dụng hàm kiểm tra email
    //         if (!Validation::ValidationEmail($email) && !Validation::CheckEmtpy($email)) {
    //             Sessions::addSession("email", "Email không đúng định dạng");
    //             return $this->redirect("/?url=LoginController/LoginPage");
    //         }


    //         $usermodel = new UserModel;
    //         $user = $usermodel->checkLogin($_POST["email"], $_POST["password"]);;

    //         if (Validation::ValidationPassword($password)) {
    //             Sessions::addSession("password", "Mật khẩu không được bỏ trống");
    //             return $this->redirect("/?url=LoginController/LoginPage");
    //         } elseif (!$user) {
    //             echo '<script>alert("Người dùng không tồn tại")</script>';
    //             $this->LoginPage();
    //         } else {
    //             // $password_hash = password_hash($user['password'], PASSWORD_DEFAULT);
    //             if (password_verify($password, $user['password'])) {
    //                 $_SESSION['user'] = $user;
    //                 echo '<script>alert("Đăng nhập thành công")</script>';
    //                 header("Location: " . ROOT_URL . "/?url=HomeController/homePage");
    //                 exit();
    //             } else {
    //                 // Hiển thị form đăng nhập với thông báo lỗi
    //                 echo '<script>alert("Đăng nhập không thành công")</script>';
    //                 $this->LoginPage();
    //             }
    //         }

    //     }

    // }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: " . ROOT_URL . "/?url=ClientHomeController/ClientHomePage");
    }

}