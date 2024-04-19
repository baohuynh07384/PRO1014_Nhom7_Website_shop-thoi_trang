<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\CommentsModel;
use App\Models\ImagesModel;

class CommentsController extends BaseController
{

    private $_renderBase;

    private $_comments;

    private $_images;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
    */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_comments = new CommentsModel();
        $this->_images = new ImagesModel();
    }

    public function listComments()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
       
        $comment = $this->_comments->getAll();
        $images = $this->_images->getImages();
        $data = [
            'images' => $images,
            'comments' => $comment
        ];
        $this->load->render('layouts/admin/list-comments', $data);
        $this->_renderBase->renderAdminFooter();
    }

    public function listDetailComments($id){
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();     
        $comment = $this->_comments->getCommentByID($id);
        $data = [
            'comments' => $comment
        ];
        $this->load->render('layouts/admin/list-detail-comments', $data);
        $this->_renderBase->renderAdminFooter();
    }
    public function delete($id)
    {
        if (isset($_POST['deleteComment'])) {
            $id = $_POST['delete_id'];
            $resultDelete = $this->_comments->deleteComment($id);

            if (!$resultDelete) {
                die("Không thể xóa dữ liệu!");
            }
            $_SESSION['success'] = 'Xóa bình luận thành công';
            header("Location:" . ROOT_URL . "/?url=CommentsController/listComments");
        }
    }

   

   

  
}