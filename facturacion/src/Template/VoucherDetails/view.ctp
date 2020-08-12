<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherDetail $voucherDetail
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
                    <li><?= $this->Html->link(__('Edit Voucher Detail'), ['action' => 'edit', $voucherDetail->id]) ?> </li>
                    <li><?= $this->Form->postLink(__('Delete Voucher Detail'), ['action' => 'delete', $voucherDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherDetail->id)]) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Details'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Voucher Detail'), ['action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Headers'), ['controller' => 'VoucherHeaders', 'action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Voucher Header'), ['controller' => 'VoucherHeaders', 'action' => 'add']) ?> </li>
                </ul>
    </div>
</br>

<div class="well">
    <h3><?= h($voucherDetail->id) ?></h3>
    <table class='table table-bordered table-hover'>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $voucherDetail->has('product') ? $this->Html->link($voucherDetail->product->id, ['controller' => 'Products', 'action' => 'view', $voucherDetail->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher Header') ?></th>
            <td><?= $voucherDetail->has('voucher_header') ? $this->Html->link($voucherDetail->voucher_header->id, ['controller' => 'VoucherHeaders', 'action' => 'view', $voucherDetail->voucher_header->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($voucherDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $this->Number->format($voucherDetail->stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($voucherDetail->price) ?></td>
        </tr>
    </table>    
</div>
