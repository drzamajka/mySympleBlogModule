<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class mysympleblogmodule extends Module
{
    public function __construct()
    {
        $this->name = 'mysympleblogmodule';
        $this->tab = 'social_networks';
        $this->version = '1.0.0';
        $this->author = 'Rafał Pęczek';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6.0',
            'max' => '1.7.9',
        ];
        $this->bootstrap = true;
        $this->controllers = ['blog'];

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
        return parent::install();
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

    // protected function hookModuleRoutes()
    // {
    //     return [
    //         'module-mysympleblogmodule' => [
    //             'rute' => 'blog',
    //         ],
    //         'controller' => 'blog',
    //         'params' => [
    //             'fc' => 'module',
    //             'module' => 'mysympleblogmodule'
    //         ]
    //     ];
    // }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/mysympleblogmodule.css', 'all');
        $this->context->controller->addJS($this->_path.'views/js/mysympleblogmodule.js');
    }


}