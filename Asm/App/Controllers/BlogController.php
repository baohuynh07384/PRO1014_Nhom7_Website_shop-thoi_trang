<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\BlogModel;
use App\Core\Sessions;
use App\Core\Validation;

class BlogController extends BaseController
{

    private $_renderBase;
    private $_Blog;
    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_Blog = new BlogModel();
    }

    function BlogController()
    {
        $this->CreateBlogPage();
    }

    function CreateBlogPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderCreateBlog();
        $this->_renderBase->renderAdminFooter();
    }

    function ListBlogPage()
    {
        $datablog = $this->_Blog->getlistblog();
        $data = ['datablog' => $datablog];
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/list_blog', $data);
        $this->_renderBase->renderAdminFooter();
    }
    function detailblog($id)
    {
        $datablogdetail = $this->_Blog->getwithid($id);
        $data = ['datablog' => $datablogdetail];
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/detail_blog', $data);
        $this->_renderBase->renderAdminFooter();
    }


    function create()
    {
        if (isset($_POST['upload'])) {
            $name = $_POST['name'];
            $image = UPLOAD_PATH . basename($_FILES['image']['name']);
            $author = $_POST['author'];
            $new_type = $_POST['new_type'];
            $status = $_POST['status'];
            $content = $_POST['content'];
            $errors = [];
            $data = [
                'tiêu đề' => $name,
                'ảnh' => $image,
                'tác giả' => $author,
                'thể loại' => $new_type,
                'nội dung' => $content,
            ];
            foreach ($data as $field => $value) {
                if (Validation::CheckEmtpy($value)) {
                    $errors[$field] = "Vui lòng nhập $field.";
                }
                if (Validation::CheckEmtpy($_FILES['image']['name'])) {
                    Sessions::addSession('ảnh', 'Vui lòng tải ảnh.');
                }
            }
            if (!empty($errors)) {
                foreach ($errors as $key => $error) {
                    Sessions::addSession($key, $error);
                }
                return $this->redirect("/?url=BlogController/CreateBlogPage");
            } 
            $BlogModel = new BlogModel();
            $checkname = $BlogModel->checkTitle($name);
            $checkcontent = $BlogModel->checkContent($content);
            $checkimage = $BlogModel->checkImage($_FILES['image']['name']);
            if($checkname || $checkcontent || $checkimage){
                $_SESSION['success'] = 'Bài viết đã tồn tại';
                header('Location: /?url=BlogController/CreateBlogPage');
                die;
            }
                $BlogModel = new BlogModel();
                $listthumbnail = $BlogModel->checkimageexit($_FILES['image']['name']);
                if ($listthumbnail) {
                    $imagename = basename($_FILES['image']['name']);
                    $i = 1;
                    $newImageName = $imagename;
                    $info = pathinfo($imagename);
                    while (file_exists(UPLOAD_PATH . $newImageName)) {
                        $newImageName = $info['filename'] . "($i)." . $info['extension'];
                        $i++;
                    }

                    move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_PATH . $newImageName);
                    $BlogModel->create(['title' => $name, 'thumbnail' => basename($newImageName), 'author' => $author, 'new_type' => $new_type, 'status' => $status, 'content' => $content]);
                    $_SESSION['success'] = "Tạo bài viết thành công";
                    header("Location: " . ROOT_URL . "/?url=BlogController/ListBlogPage");
                } else {
                    move_uploaded_file($_FILES['image']['tmp_name'], $image);
                    $BlogModel->create(['title' => $name, 'thumbnail' => basename($_FILES['image']['name']), 'author' => $author, 'new_type' => $new_type, 'status' => $status, 'content' => $content]);
                    $_SESSION['success'] = "Tạo bài viết thành công";
                    header("Location: " . ROOT_URL . "/?url=BlogController/ListBlogPage");
                }
            
        }
    }
    function update($id)
    {
        if (isset($_POST['edit'])) {
            $title = $_POST['name'];
            $author = $_POST['author'];
            $new_type = $_POST['new_type'];
            $status = $_POST['status'];
            $content = $_POST['content'];
            $new_image = $_FILES['thumbnail']['name'];
            $old_image = $_POST['thumbnail_old'];

            if ($new_image != '') {
                $update_image = $new_image;
                if (file_exists(UPLOAD_PATH . basename($_FILES["thumbnail"]["name"]))) {
                    echo '<script>alert("Ảnh đã tồn tại")</script>';
                    header("Location:" . ROOT_URL . "/?url=BlogController/ListBlogPage");
                    exit();
                } else {
                    $update_image = $new_image;
                    var_dump($update_image);

                }
            } else {
                $update_image = $old_image;
            }
        }

        $blogs = new BlogModel;
        $updateResult = $blogs->edit([
            'title' => $title,
            'author' => $author,
            'new_type' => $new_type,
            'status' => $status,
            'content' => $content,
            'thumbnail' => $update_image
        ], $id);

        if ($updateResult) {
            if ($new_image != '') {
                $target_path = UPLOAD_PATH . basename($_FILES["thumbnail"]["name"]);
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_path);
                unlink(UPLOAD_PATH . $old_image);
            }
            $_SESSION['success'] = "Chỉnh sửa thành công";
            header("Location: " . ROOT_URL . "/?url=BlogController/ListBlogPage");
            exit();

        } else {
            echo "Có lỗi xảy ra khi cập nhật danh mục.";
        }
    }
    public function delete($id)
    {
        if (isset($_POST['deleteBlog'])) {
            $id = $_POST['delete_blog_id'];

            $blog = new BlogModel;
            $resultDelete = $blog->deleteBlog($id);
            if (!$resultDelete) {
                die("Không thể xóa dữ liệu!");
            }
            $_SESSION['success'] = 'Xóa bài viết thành công';
            header("Location:" . ROOT_URL . "/?url=BlogController/ListBlogPage");
        }
    }
}



