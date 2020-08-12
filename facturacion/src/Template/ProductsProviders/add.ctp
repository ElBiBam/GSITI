<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsProvider $productsProvider
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              
             <li><?= $this->Html->link(__('List Products Providers'), ['action' => 'index']) ?></li>
                 <li>   <?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
            </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($productsProvider) ?>
        <fieldset>
            <legend><?= __('Add Products Provider') ?></legend>
            <?php
                echo $this->Form->control('product_id', ['options' => $products]);
                echo $this->Form->control('provider_id', ['options' => $providers]);
                echo $this->Form->control('stock');
                echo $this->Form->control('price');
                echo $this->Form->control('date', ['empty' => true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
