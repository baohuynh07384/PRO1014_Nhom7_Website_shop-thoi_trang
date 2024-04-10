<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\UserModel;
use App\Core\Validation;
use App\Core\Sessions;

class AccountController extends BaseController
{

    private $_renderBase;
    private $_account;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_account = new UserModel();
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


    public function listAccount()
    {
        $account = $this->_account->getUsers($_SESSION['user']['id']);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/list_account', $account);
        $this->_renderBase->renderAdminFooter();
    }

    public function addAccount()
    {
        if ($_SESSION['user']['role'] == 1) {
            if (isset($_POST['submit'])) {
                $errors = [];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $status = $_POST['option'];
                $role = $_POST['role'];
                $target_file = UPLOAD_URL . basename($_FILES["image"]["name"]);

                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'address' => $_POST['address'],
                    'phone' => $_POST['phone'],
                    'status' => $_POST['option'],
                    'role' => $_POST['role'],
                    'image' => $_FILES["image"]["name"],
                ];

                foreach ($data as $field => $value) {
                    if (Validation::CheckEmtpy($value)) {
                        $errors[$field] = "Vui lòng nhập $field";
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
                    return $this->redirect("/?url=AccountController/CreateAccountPage");
                }
                $userModel = new UserModel();
                $user = $userModel->checkUserExist($email);
                if ($user) {
                    echo '<script>alert("Tài khoản đã tồn tại!"); window.location.href = "' . ROOT_URL . '/?url=RegristerController/RegristerPage";</script>';
                } else if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);
                    $userModel->createUser(['name' => $name, 'email' => $email, 'password' => $hash_password, 'address' => $address, 'phone' => $phone, 'status' => $status, 'role' => $role, 'image' => basename($_FILES["image"]["name"])]);
                    $_SESSION['success'] = 'Thêm tài khoản thành công';
                    header('Location: /?url=AccountController/listAccount');
                    exit;
                } else {
                    echo "Xin lỗi, có lỗi khi tải lên tệp của bạn.";
                }
            }
        } else {
            $_SESSION['success'] = 'Bạn không có quyền quản lý';
            header("Location:" . ROOT_URL . "/?url=HomeController/homePage");
            exit();
        }
    }

    public function edit($id)
    {
        $users = new UserModel();
        $user = $users->getOneUser($id);
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/updateaccount', $user);
        $this->_renderBase->renderAdminFooter();
    }

    public function editAccount($id)
    {
        if ($_SESSION['user']['role'] == 1) {
            if (isset($_POST['updateAccount'])) {
                $name = $_POST['name'] ?? "";
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
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $updateResult = $userModel->updateUser([
                    'name' => $name,
                    'email' => $email,
                    'password' => $hash_password,
                    'address' => $address,
                    'phone' => $phone,
                    'status' => $status,
                    'role' => $role,
                    'image' => $update_image
                ], $id);
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
        }else{
            $_SESSION['success'] = 'Bạn không có quyền quản lý';
            header("Location:" . ROOT_URL . "/?url=HomeController/homePage");
            exit();
        }

    }

    public function delete($id)
    {
        if ($_SESSION['user']['role'] == 1) {
            if (isset($_POST['deleteAccount'])) {
                $users = new UserModel;
                $resultDelete = $users->deleteUser($id);

                if (!$resultDelete) {
                    die("Không thể xóa dữ liệu!");
                }
                header("Location:" . ROOT_URL . "/?url=AccountController/listAccount");
            }
        } else {
            $_SESSION['success'] = 'Bạn không có quyền quản lý';
            header("Location:" . ROOT_URL . "/?url=HomeController/homePage");
            exit();
        }
    }


}