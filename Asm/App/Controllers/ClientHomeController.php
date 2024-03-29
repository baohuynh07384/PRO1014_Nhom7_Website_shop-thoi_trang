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

    function ClientProductPage()
    {
        $this->_renderBase->renderProductPage();
    }

    function ClientHomeController()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                header("Location: /?url=HomeController/homePage");
                exit();
            } else if ($_SESSION['user']['role'] == 0) {
                header("Location: /?url=ClientHomeController/ClientHomePage");
                exit();
            }
        }
        $this->ClientHomePage();
    }

    function ClientHomePage()
    {
        $this->_renderBase->renderClientHeader();
        $this->_renderBase->renderClientHome();
        $this->_renderBase->renderClientFooter();
    }



    function ClientCheckoutPage()
    {
        $this->_renderBase->renderCheckoutPage();
    }

    function ClientBlogsPage()
    {
        $this->_renderBase->renderBlogsPage();
    }

    function ClientContactPage()
    {
        $this->_renderBase->renderContactPage();
    }
    function ClientCartPage()
    {
        $this->_renderBase->renderCartPage();
    }






}