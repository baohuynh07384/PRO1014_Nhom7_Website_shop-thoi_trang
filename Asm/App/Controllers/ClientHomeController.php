<?php

namespace App\Controllers;

use App\Core\RenderBase;

class ClientHomeController extends BaseController
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

    

    function ClientCategoriesPage()
    {
        $this->_renderBase->renderCatePage();
    }

    function ClientProductPage(){
        $this->_renderBase->renderProductPage();
    }

   

    function ClientCheckoutPage(){
        $this->_renderBase->renderCheckoutPage();
    }

    function ClientBlogsPage(){
        $this->_renderBase->renderBlogsPage();
    }

    function ClientContactPage(){
        $this->_renderBase->renderContactPage();
    }

}