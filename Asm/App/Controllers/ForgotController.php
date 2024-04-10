<?php

namespace App\Controllers;

use App\Helpers\Mail\Mailer;
use App\Core\Validation;
use App\Core\Sessions;
use App\Models\UserModel;
use App\Controllers\LoginController;
use App\Core\RenderBase;

class ForgotController extends BaseController
{


    private $_renderBase;


    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    public function loadPageForgot()
    {
        $this->_renderBase->renderPageForgotPass();
    }

    public function loadPageConfirm(){
        $this ->_renderBase -> renderPageConfirm();
    }

    public function loadPageChangePass(){
        $this ->_renderBase -> renderPageChangePass();
    }

    public function forgotPass()
    {
        if (isset($_POST['forgot'])) {
            $email = $_POST['email'];

            $data = [
                'email' => $_POST['email']
            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field";
                } else {
                    if (Validation::CheckEmtpy($email)) {
                        $errors['email'] = "Vui lòng nhập email.";
                    } else if (!Validation::ValidationEmail($email)) {
                        $errors['email'] = "Email không đúng định dạng.";
                    }
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=ForgotController/loadPageForgot");
            }

            $user = new UserModel();
            $result = $user->checkUserExist($email);
            if (!$result) {
                echo '<script>alert("Người dùng không tồn tại")</script>';
                header("Location: " . ROOT_URL . "/?url=ForgotController/loadPageForgot");
            } else {
                $code = substr(rand(0, 999999), 0, 6);
                $title = "Quên mật khẩu";
                $content = "Mã xác nhận của bạn là:  <span style='color: green'>" . $code . "</span>";

                $mail = new Mailer;
                $mail->sendMail($title, $content, $email);

                $_SESSION['mail'] = $email;
                $_SESSION['code'] = $code;
                header("Location: " . ROOT_URL . "/?url=ForgotController/loadPageConfirm");
            }

        }
    }

    

    public function confirmVerification()
    {

        if (isset($_POST['confirm'])) {
            if ($_POST['text'] != $_SESSION['code']) {
                Sessions::addSession("text", "Mã xác nhận không hợp lệ !");
                return $this->redirect("/?url=ForgotController/loadPageConfirm");
            } else {
                header("Location: " . ROOT_URL . "/?url=ForgotController/loadPageChangePass");
            }
        }

    }

    public function changePass()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'newpass' => $_POST['newpass'],
                'repass' => $_POST['repass']
            ];
            foreach ($data as $field => $value){
                if(Validation::CheckEmtpy($value)){
                    $errors[$field] = "Vui lòng nhập $field";
                }else {
                    if($field === 'newpass' && !Validation::ValidationPassword($value)){
                        $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường và số.";
                    }else if($field === 'repass' && !Validation::ValidationPassword($value)){
                        $errors[$field] = "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ cái viết hoa, chữ cái viết thường và số.";
                }
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=ForgotController/loadPageChangePass");
            }
            if ($_POST['repass'] != $_POST['newpass']) {
                Sessions::addSession("fail", "Nhập lại mật khẩu không khớp !");
                return $this->redirect("/?url=ForgotController/loadPageChangePass");
            } else {
                $newpass = $_POST['newpass'];
                $user = new UserModel;
                $hash_password = password_hash($newpass, PASSWORD_DEFAULT);
                $result = $user->changePass(['password' => $hash_password], $_SESSION['mail']);
                if ($result) {
                    echo '<script>alert("Đổi mật khẩu thành công")</script>';
                    return $this->redirect("/?url=LoginController/LoginPage");
                } else {
                    echo 'Lỗi';
                }
            }
        }
    }
}