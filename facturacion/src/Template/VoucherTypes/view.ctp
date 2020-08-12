<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherType $voucherType
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
        .nav-scroller.bg-white.shadow-sm{
            margin-top: 10px;
        }
        
    </style>

    <div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                   <li><?= $this->Html->link(__('Edit Voucher Type'), ['action' => 'edit', $voucherType->id]) ?> </li>
                    <li><?= $this->Form->postLink(__('Delete Voucher Type'), ['action' => 'delete', $voucherType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherType->id)]) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Types'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Voucher Type'), ['action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?> </li>
                </ul>
    </div>
</br>


<div class="well">
    <h3><?= h($voucherType->name) ?></h3>
    <table class='table table-bordered table-hover'>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($voucherType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($voucherType->id) ?></td>
        </tr>
    </table>

    <div class="well">
        <h4><?= __('Related Voucher Headers') ?></h4>
        <?php if (!empty($voucherType->voucher_headers)): ?>
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
            <?php foreach ($voucherType->voucher_headers as $voucherHeaders): ?>
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
