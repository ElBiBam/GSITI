<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

//namespace BootstrapUI\View;


use BootstrapUI\View\UIViewTrait;
use Cake\View\View;
//use BootstrapUI\View\UIView;


/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{
    use UIViewTrait;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */   
     
    public function initialize()
    {
        //$this->initializeUI();
        //$this->initializeUI('layout');
        $this->initializeUI(['layout' => false]);

        //$this->extend('../Layout/TwitterBootstrap/dashboard');
        $this->loadHelper('BootsCake.BootsCakeFlash');
        $this->loadHelper('BootsCake.BootsCakeForm');
        //$this->loadHelper('BootsCake.BootsCakeModal');
        $this->loadHelper('BootsCake.BootsCakePaginator');

        
    }

}
