<?php

class MySympleBlogModuleblogModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        // Pobranie wiadomości bloga
        $customHtmlContent = Configuration::get('BLOG_CONFIG');

        // Przykład: Ustawienie zmiennej smarty z treścią dla szablonu
        $this->context->smarty->assign('content', $customHtmlContent);

        // Wyświetl szablon
        $this->setTemplate('module:mysympleblogmodule/views/templates/front/blog.tpl');
    }
}