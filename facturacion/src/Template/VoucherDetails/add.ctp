<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherDetail $voucherDetail
 */
?>


<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                    <li><?= $this->Html->link(__('List Voucher Details'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?></li>
                </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($voucherDetail) ?>
        <fieldset>
            <legend><?= __('Add Voucher Detail') ?></legend>
            <?php
                echo $this->Form->control('quantity');
                echo $this->Form->control('price');
                echo $this->Form->control('product_id', ['options' => $products]);
                echo $this->Form->control('voucher_header_id', ['options' => $voucherHeaders]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

