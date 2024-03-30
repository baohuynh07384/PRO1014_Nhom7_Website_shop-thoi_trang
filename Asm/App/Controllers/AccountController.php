<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;

class AccountController extends BaseController
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

    function AccountController()
    {
        $this->CreateAccountPage();
    }
    
    function CreateAccountPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderAccount();
        $this->_renderBase->renderAdminFooter();
    }

    public function listAccount(){
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListAccount();
        $this->_renderBase->renderAdminFooter();
    }

    public function edit($id){
        $users = new UserModel();
        $user = $users->getOneUser($id);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/updateaccount', $user);
        $this->_renderBase->renderAdminFooter();
    }

    public function editAccount($id)
    {
           
        if (isset($_POST['updateAccount'])) {
            $username = $_POST['username'] ?? "";
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
            $address = $_POST['address'] ?? "";
            $phone = $_POST['phone'] ?? "";
            $status = $_POST['option'] ?? "";
            $role = $_POST['role'] ?? "";
            $new_image = $_FILES['image']['name'];
            $old_image = $_POST['image_old'];
        
            if ($new_image != '') {
                $update_image = $new_image;
                if (file_exists(UPLOAD_URL . basename($_FILES["image"]["name"]))) {
                    echo '<script>alert("Ảnh đã tồn tại")</script>';
                    header("Location:" . ROOT_URL . "/?url=AccountController/listAccount");
                    exit();
                } else {
                    $update_image = $new_image;
                }
            } else {
                $update_image = $old_image;
            }
        
            $userModel = new UserModel;
            $updateResult = $userModel -> updateUser(['username' => $username, 'email' => $email, 'password' => $password,
            'address' => $address, 'phone' => $phone, 'status' => $status , 'role' => $role, 'image' => $update_image], $id);
            if ($updateResult) {
                if ($new_image != '') {
                    $target_path = UPLOAD_URL . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                    unlink(UPLOAD_URL . $old_image);
                }
                $_SESSION['success'] = "Chỉnh sửa thành công";
                header("Location: " . ROOT_URL . "/?url=AccountController/listAccount");
                exit();
               
            } else {
                echo "Có lỗi xảy ra khi cập nhật người dùng.";
            }
            
        }
        
    }

    public function delete($id)
    {
        if (isset($_POST['deleteAccount'])) {
            $users = new UserModel;
            $getRole = $users -> getOneUser($id);
            if ($getRole['role'] == '2') {
                $_SESSION['success'] = 'Không thể xóa người dùng admin';
                header("Location:" . ROOT_URL . "/?url=AccountController/listAccount");
                exit();
            }
            $resultDelete = $users->deleteUser($id);

            if (!$resultDelete) {
                die("Không thể xóa dữ liệu!");
            }
            header("Location:" . ROOT_URL . "/?url=AccountController/listAccount");
        }
    }

  
}