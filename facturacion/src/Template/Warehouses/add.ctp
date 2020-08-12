<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Warehouse $warehouse
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                <li class="nav-item"><?= $this->Html->link(__('List Warehouses'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($warehouse) ?>
        <fieldset>
            <legend><?= __('Add Warehouse') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('status', ['type' => 'checkbox']);
                echo $this->Form->control('products._ids', ['options' => $products]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
