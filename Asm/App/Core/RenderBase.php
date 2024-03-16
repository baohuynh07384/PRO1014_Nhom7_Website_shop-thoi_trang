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
}