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

    function ClientHomeController()
    {
        $this->ClientHomePage();
    }

    function ClientHomePage()
    {
        $this->_renderBase->renderClientHeader();
        $this->_renderBase->renderClientHome();
        $this->_renderBase->renderClientFooter();
    }

   

    function ClientCartPage(){
        $this->_renderBase->renderCartPage();
    }

  
   

   

}