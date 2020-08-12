<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherHeader $voucherHeader
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
<div class="row">    
    <div class="col-md-12">
        <div class="nav-scroller bg-white shadow-sm">
            <nav class="nav nav-underline">                                
                <li class="nav-item">
                    <a class='navbar-brand'><?= __('Actions') ?></a>
                    <?= $this->Html->link(__('Edit Voucher Header'), ['action' => 'edit', $voucherHeader->id]) ?> 
                    <?= $this->Form->postLink(__('Delete Voucher Header'), ['action' => 'delete', $voucherHeader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherHeader->id)]) ?> 
                    <?= $this->Html->link(__('List Voucher Headers'), ['action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Voucher Header'), ['action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Voucher Types'), ['controller' => 'VoucherTypes', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Voucher Type'), ['controller' => 'VoucherTypes', 'action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> 
                    <?= $this->Html->link(__('List Voucher Details'), ['controller' => 'VoucherDetails', 'action' => 'index']) ?> 
                    <?= $this->Html->link(__('New Voucher Detail'), ['controller' => 'VoucherDetails', 'action' => 'add']) ?> 
                </li>                                      
            </nav>
        </div>
    </div>
</div>
<div class="well">
    <h3><?= h($voucherHeader->id) ?></h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th scope="row"><?= __('Voucher Type') ?></th>
            <td><?= $voucherHeader->has('voucher_type') ? $this->Html->link($voucherHeader->voucher_type->name, ['controller' => 'VoucherTypes', 'action' => 'view', $voucherHeader->voucher_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= $voucherHeader->has('seller') ? $this->Html->link($voucherHeader->seller->person->name, ['controller' => 'Sellers', 'action' => 'view', $voucherHeader->seller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $voucherHeader->has('client') ? $this->Html->link($voucherHeader->client->person->name, ['controller' => 'Clients', 'action' => 'view', $voucherHeader->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($voucherHeader->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($voucherHeader->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Issue Date') ?></th>
            <td><?= h($voucherHeader->issue_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($voucherHeader->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($voucherHeader->modified) ?></td>
        </tr>
    </table>
    <div class="well">
        <h4><?= __('Related Voucher Details') ?></h4>
        <?php if (!empty($voucherHeader->voucher_details)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Stock') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Voucher Header Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($voucherHeader->voucher_details as $voucherDetails): ?>
            <tr>
                <td><?= h($voucherDetails->id) ?></td>
                <td><?= h($voucherDetails->stock) ?></td>
                <td><?= h($voucherDetails->price) ?></td>
                <td><?= h($voucherDetails->product->description) ?></td>
                <td><?= h($voucherDetails->voucher_header_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'VoucherDetails', 'action' => 'view', $voucherDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'VoucherDetails', 'action' => 'edit', $voucherDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VoucherDetails', 'action' => 'delete', $voucherDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
