<?php

namespace App\Controllers;

use App\Core\RenderBase;

class ListaccountController extends BaseController
{

    private $_renderBase;

    /**
     * Thuốc trị đau lưng
     * Copy lại là hết đau lưng
     * 
    */
    public function __construct()
    {
        parent::__construct();
        $this->_renderBase = new RenderBase();
    }

    public function ListaccountController()
    {
        $this->ListaccountPage();
    }
    
    public function ListaccountPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListaccount();
        $this->_renderBase->renderAdminFooter();
    }
    
  
}