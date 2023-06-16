<?php

class MySympleBlogModuleblogModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();

        if ($this->isXmlHttpRequest()) {
            // To jest asynchroniczne zapytanie POST
            // Pobranie wiadomości bloga
            $customHtmlContent = Configuration::get('BLOG_CONFIG');

            // Przykład: Zwróć dane jako JSON
            $response = array(
                'rendered_template' => '<p>'.$customHtmlContent.'</p>',
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            // To jest standardowe zapytanie GET
            $this->setTemplate('module:mysympleblogmodule/views/templates/front/blog.tpl');
        }

    }

    public function setMedia()
    {
        parent::setMedia();
        // Rejestracja elementu w nagłówku css js
        $this->addCSS(_MODULE_DIR_ . $this->module->name . '/views/css/mysympleblogmodule.css');
        $this->addJS(_MODULE_DIR_ . $this->module->name . '/views/js/asyncBlog.js');
    }


}