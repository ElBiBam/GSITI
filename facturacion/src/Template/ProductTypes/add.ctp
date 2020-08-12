<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductType $productType
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              
                    <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
            </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($productType) ?>
        <fieldset>
            <legend><?= __('Add Product Type') ?></legend>
            <?php
                echo $this->Form->control('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
