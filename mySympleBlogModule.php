<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class mySympleBlogModule extends Module
{
    public function __construct()
    {
        $this->name = 'mySympleBlogModule';
        $this->tab = 'social_networks';
        $this->version = '1.0.0';
        $this->author = 'Rafał Pęczek';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6.0',
            'max' => '1.7.9',
        ];
        $this->bootstrap = true;
        $this->controllers = ['BlogController'];

        parent::__construct();

        $this->displayName = $this->l('My symple blog module');
        $this->description = $this->l('this modul show blog mesage under \blog site.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }

    public function install()
    {
        return parent::install() && $this->registerHook('moduleRoutes');
    //     if (Shop::isFeatureActive()) {
    //         Shop::setContext(Shop::CONTEXT_ALL);
    //     }

    // return (
    //         parent::install() 
    //         && $this->registerHook('moduleRoutes')
    //         // Rejestracja elementu w nagłówku css js
    //         && $this->registerHook('displayHeader')
    //         && Configuration::updateValue('MYMODULE_NAME', 'my symple blog module')
    //     ); 
    }


    public function uninstall()
    {
        return (
            parent::uninstall() 
            && Configuration::deleteByName('MYMODULE_NAME')
        );
    }

    protected function hookModuleRoutes()
    {
        return [
            'module-mySympleBlogModule' => [
                'rute' => 'blog',
            ],
            'controller' => 'BlogController',
            'params' => [
                'fc' => 'module',
                'module' => 'mySympleBlogModule'
            ]
        ];
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/mySympleBlogModule.css', 'all');
        $this->context->controller->addJS($this->_path.'views/js/mySympleBlogModule.js');
    }


}