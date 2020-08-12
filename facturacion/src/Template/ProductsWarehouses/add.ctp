<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsWarehouse $productsWarehouse
 */
?>


<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              
           <li><?= $this->Html->link(__('List Products Warehouses'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
            </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($productsWarehouse) ?>
        <fieldset>
            <legend><?= __('Add Products Warehouse') ?></legend>
            <?php
                echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
                echo $this->Form->control('product_id', ['options' => $products]);
                echo $this->Form->control('stock');
                echo $this->Form->control('date', ['empty' => true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
