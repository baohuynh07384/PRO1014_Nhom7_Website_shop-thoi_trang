<?php

namespace App\Core;

use App\Controllers\BaseController;

class RenderBase extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * chỗ này là phương thức render của admin 
     * 
     */
    Public function renderCategories(){
        $this->load->render('layouts/admin/createcategories');
    }
    public function renderListCat(){
        $this->load->render('layouts/admin/list-categories');
    }
    public function renderAccount(){
        $this->load->render('layouts/admin/createaccount');
    }
    public function renderListaccount(){
        $this->load->render('layouts/admin/list_account');
    }
    public function renderCart(){
        $this->load->render('layouts/admin/list-cart');
    }
    public function renderAdminHeader(){
        $this->load->render('layouts/admin/header');
    }
    public function renderSilder(){
        $this->load->render('layouts/admin/slider');
    }
   
    public function renderAdminFooter(){
        $this->load->render('layouts/admin/footer');
    }   
   
    public function renderCreateProduct(){
        $this->load->render('layouts/admin/createproduct');
    }
       
    public function renderListProduct(){
        $this->load->render('layouts/admin/list-product');
    }
    
    public function renderCreateBlog(){
        $this->load->render('layouts/admin/createblog');
    }
    
    /**
     * từ chổ này là phương thức render của client 
     * 
     */
    public function renderCatePage(){
        $this->load->render('layouts/client/store');
    }

    public function renderProductPage(){
        $this->load->render('layouts/client/product');
    }

    
    public function renderCheckoutPage(){
        $this->load->render('layouts/client/checkout');
    }

    public function renderBlogsPage(){
        $this->load->render('layouts/client/blogs');
    }

    public function renderContactPage(){
        $this->load->render('layouts/client/contact');
    }
    public function renderClientHeader(){
        $this->load->render('layouts/client/header');
    }
    public function renderClientFooter(){
        $this->load->render('layouts/client/footer');
    }
    public function renderClientHome(){
        $this->load->render('layouts/client/home');
    }
    public function renderCartPage(){
        $this->load->render('layouts/client/cart');
    }
 
     /**
     * từ chổ này là phương thức render của form 
     * 
     */
    public function renderLogin(){
        $this->load->render('layouts/account/login');
    }
    public function renderRegrister(){
        $this->load->render('layouts/account/regrister');
    }

    public function renderPageForgotPass(){
        $this-> load -> render('layouts/account/forgotpass');
    }

    public function renderPageConfirm(){
        $this -> load -> render('layouts/account/confirmpass');
    }

    public function renderPageChangePass(){
        $this -> load -> render('layouts/account/changepass');
    }
}