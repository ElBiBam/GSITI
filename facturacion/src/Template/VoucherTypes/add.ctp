<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherType $voucherType
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                    <li class="nav-item"><?= $this->Html->link(__('List Voucher Types'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($voucherType) ?>
        <fieldset>
            <legend><?= __('Add Voucher Type') ?></legend>
            <?php
                echo $this->Form->control('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

