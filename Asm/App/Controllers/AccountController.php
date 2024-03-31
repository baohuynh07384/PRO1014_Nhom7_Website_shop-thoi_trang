<?php

namespace App\Controllers;

use App\Core\RenderBase;

class AccountController extends BaseController
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

    function AccountController()
    {
        $this->CreateAccountPage();
    }
    
    function CreateAccountPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderAccount();
        $this->_renderBase->renderAdminFooter();
    }
    
    
}