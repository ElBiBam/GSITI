<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>


<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
            
                <li><?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Voucher Details'), ['controller' => 'VoucherDetails', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Voucher Detail'), ['controller' => 'VoucherDetails', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            
            </ul>
</div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($product) ?>
        <fieldset>
            <legend><?= __('Add Product') ?></legend>
            <?php
                echo $this->Form->control('description');
                echo $this->Form->control('quantity');
                echo $this->Form->control('product_type_id', ['options' => $productTypes, 'empty' => true]);
                echo $this->Form->control('status', ['type' => 'checkbox']);
                echo $this->Form->control('providers._ids', ['options' => $providers]);
                echo $this->Form->control('warehouses._ids', ['options' => $warehouses]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
