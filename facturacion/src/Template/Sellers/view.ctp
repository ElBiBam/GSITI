<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seller $seller
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
                    <li><?= $this->Html->link(__('Edit Seller'), ['action' => 'edit', $seller->id]) ?> </li>
                    <li><?= $this->Form->postLink(__('Delete Seller'), ['action' => 'delete', $seller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seller->id)]) ?> </li>
                    <li><?= $this->Html->link(__('List Sellers'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Seller'), ['action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?> </li>
    </div>
</br>
<div class="well">
    <h3><?= h($seller->id) ?></h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $seller->has('person') ? $this->Html->link($seller->person->name, ['controller' => 'Persons', 'action' => 'view', $seller->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seller->id) ?></td>
        </tr>
    </table>
    <div class="well">
        <h4><?= __('Related Voucher Headers') ?></h4>
        <?php if (!empty($seller->voucher_headers)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Issue Date') ?></th>
                <th scope="col"><?= __('Voucher Type Id') ?></th>
                <th scope="col"><?= __('Seller Id') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($seller->voucher_headers as $voucherHeaders): ?>
            <tr>
                <td><?= h($voucherHeaders->id) ?></td>
                <td><?= h($voucherHeaders->issue_date) ?></td>
                <td><?= h($voucherHeaders->voucher_type_id) ?></td>
                <td><?= h($voucherHeaders->seller_id) ?></td>
                <td><?= h($voucherHeaders->client_id) ?></td>
                <td><?= h($voucherHeaders->status) ?></td>
                <td><?= h($voucherHeaders->created) ?></td>
                <td><?= h($voucherHeaders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VoucherHeaders', 'action' => 'view', $voucherHeaders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VoucherHeaders', 'action' => 'edit', $voucherHeaders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VoucherHeaders', 'action' => 'delete', $voucherHeaders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherHeaders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

