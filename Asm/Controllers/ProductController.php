<?php

namespace App\Controllers;

use App\Core\RenderBase;

class ProductController extends BaseController
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

    function ProductController()
    {
        $this->CreateProductPage();
    }
    
    function CreateProductPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderProduct();
        $this->_renderBase->renderAdminFooter();
    }

    function ListProductPage(){
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListProduct();
        $this->_renderBase->renderAdminFooter();
    }

  
}