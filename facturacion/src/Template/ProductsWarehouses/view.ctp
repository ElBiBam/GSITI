<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsWarehouse $productsWarehouse
 */
?>
<style>
        .page-header{   
        margin-top: 10px;
       
        }
        .btn.btn-sm.btn-primary{
        float: right;
        position: relative;
        margin-top: 5px;
        margin-bottom: 15px;
        }
       
        
    </style>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              
                    <li><?= $this->Html->link(__('Edit Products Warehouse'), ['action' => 'edit', $productsWarehouse->id]) ?> </li>
                    <li><?= $this->Form->postLink(__('Delete Products Warehouse'), ['action' => 'delete', $productsWarehouse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsWarehouse->id)]) ?> </li>
                    <li><?= $this->Html->link(__('List Products Warehouses'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Products Warehouse'), ['action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
            </ul>
    </div>
</br>

<div class="well">
    <h3><?= h($productsWarehouse->id) ?></h3>
    <table class='table table-bordered table-hover'>
        <tr>
            <th scope="row"><?= __('Warehouse') ?></th>
            <td><?= $productsWarehouse->has('warehouse') ? $this->Html->link($productsWarehouse->warehouse->name, ['controller' => 'Warehouses', 'action' => 'view', $productsWarehouse->warehouse->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsWarehouse->has('product') ? $this->Html->link($productsWarehouse->product->id, ['controller' => 'Products', 'action' => 'view', $productsWarehouse->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsWarehouse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $this->Number->format($productsWarehouse->stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($productsWarehouse->date) ?></td>
        </tr>
    </table>    
</div>
