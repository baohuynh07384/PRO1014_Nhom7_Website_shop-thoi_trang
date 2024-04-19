<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\CategoriesModel;
use App\Models\CommentsModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\BlogModel;

class HomeController extends BaseController
{

    private $_renderBase;

    private $_categories;

    private $_users;

    private $_blogs;

    private $_products;

    private $_comments;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_categories = new CategoriesModel();
        $this->_users = new UserModel();
        $this->_blogs = new BlogModel();
        $this->_products = new ProductModel();
        $this->_comments = new CommentsModel();
    }

    function HomeController()
    {
        $this->homePage();
    }


    function homePage()
    {
        $data = [
            'categories' =>  $this->_categories->countCategories(),
            'users' => $this->_users->countUsers(),
            'blogs' => $this->_blogs->countBlogs(),
            'products' => $this->_products->countProducts(),
            'comments' => $this->_comments->countComment()
        ];
        
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/dashboard', $data);
        $this->_renderBase->renderAdminFooter();
    }

  

   

}
