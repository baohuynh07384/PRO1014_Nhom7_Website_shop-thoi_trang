<?php

namespace App\Controllers;

use App\Core\RenderBase;

class CartController extends BaseController
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

    public function CartPage(){
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderCart();
        $this->_renderBase->renderAdminFooter();
    }

   

  
}