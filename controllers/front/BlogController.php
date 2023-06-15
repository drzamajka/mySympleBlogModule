<?php

class BlogController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        // Przykład: Ustawienie zmiennej smarty z treścią dla szablonu
        $this->context->smarty->assign('content', 'Witaj na stronie bloga!');

        // Wyświetl szablon
        $this->setTemplate('module:mySympleBlogModule/views/templates/front/blog.tpl');
    }
}