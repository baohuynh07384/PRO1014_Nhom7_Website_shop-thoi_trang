<?php

namespace App\Controllers;

use App\Core\RenderBase;

class CategoriesController extends BaseController
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

    function CategoriesController()
    {
        $this->CreateCategoresPage();
    }
    
    function CreateCategoresPage()
    {
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderCategories();
        $this->_renderBase->renderAdminFooter();
    }

    function ListCatPage(){
        $this->_renderBase->renderAdminHeader();
        $this->_renderBase->renderSilder();
        $this->_renderBase->renderListCat();
        $this->_renderBase->renderAdminFooter();
    }

  
}