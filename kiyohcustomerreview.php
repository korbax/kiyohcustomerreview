<?php
/**
* 2014-2015 Interactivated.me
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    Interactivated <contact@interactivated.me>
*  @copyright 2014-2015 Interactivated.me
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
    exit;

class KiyohCustomerReview extends Module {

    private $html = '';
    private $query = '';
    private $query_group_by = '';
    private $option = '';
    private $id_country = '';
    private $config = null;

    public function __construct() 
    {
        $this->name = 'kiyohcustomerreview';
        $this->tab = 'advertising_marketing';
        $this->version = '1.0';
        $this->author = 'Interactivated.me';
        $this->need_instance = 0;
        $this->module_key = '5f10179e3d17156a29ba692b6dd640da';

        parent::__construct();

        $this->getPsVersion();

        $this->displayName = $this->l('KiyOh Customer Review');
        $this->description = $this->l('KiyOh.nl users can use this plug-in automatically collect customer reviews');
        $this->ps_versions_compliancy = array('min' => '1.4', 'max' => _PS_VERSION_);
        $this->config = unserialize(Configuration::get('KIYOH_SETTINGS'));
        if (!extension_loaded('curl'))
            $this->warning = $this->l('cURL extension must be enabled on your server to use this module.');

        if (isset($this->config['WARNING']) && $this->config['WARNING'])
            $this->warning = $this->config['WARNING'];
        if (_PS_VERSION_ < '1.5')
            require(_PS_MODULE_DIR_ . $this->name . '/backward_compatibility/backward.php');
    }

}
