<?php

namespace App\Controllers;

use App\Core\RenderBase;
use App\Models\CategoriesModel;
use App\Models\UserModel;
use App\Models\BlogModel;

class HomeController extends BaseController
{

    private $_renderBase;

    private $_categories;

    private $_users;

    private $_blogs;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_categories = new CategoriesModel();
        $this->_users = new UserModel();
        $this->_blogs = new BlogModel();
    }

    public function HomeController()
    {
        $this->homePage();
    }


    public function homePage()
    {
        $data = [
            'categories' =>  $this->_categories->countCategories(),
            'users' => $this->_users->countUsers(),
            'blogs' => $this->_blogs->countBlog(),
        ];
        
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->load->render('layouts/admin/dashboard', $data);
        $this->_renderBase->renderAdminFooter();
    }

  

   

}
