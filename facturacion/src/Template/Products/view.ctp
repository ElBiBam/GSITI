<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
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
              
             <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['class' => 'nav-link'], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
                    <li><?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('List Voucher Details'), ['controller' => 'VoucherDetails', 'action' => 'index'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('New Voucher Detail'), ['controller' => 'VoucherDetails', 'action' => 'add'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add'], ['class' => 'nav-link']) ?> </li>
                    <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index'], ['class' => 'nav-link']) ?></li> 
                    <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add'], ['class' => 'nav-link']) ?> </li>
            </ul>
    </div>
</br>

<div class="well">
    <h3><?= h($product->id) ?></h3>
    <table class='table table-bordered table-hover'>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($product->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($product->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="well">
        <h4><?= __('Related Warehouses') ?></h4>
        <?php if (!empty($product->warehouses)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->warehouses as $warehouses): ?>
            <tr>
                <td><?= h($warehouses->id) ?></td>
                <td><?= h($warehouses->name) ?></td>
                <td><?= h($warehouses->status) ?></td>
                <td><?= h($warehouses->created) ?></td>
                <td><?= h($warehouses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Warehouses', 'action' => 'view', $warehouses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Warehouses', 'action' => 'edit', $warehouses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Warehouses', 'action' => 'delete', $warehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="well">
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($product->providers)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Person Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->providers as $providers): ?>
            <tr>
                <td><?= h($providers->id) ?></td>
                <td><?= h($providers->person_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="well">
        <h4><?= __('Related Voucher Details') ?></h4>
        <?php if (!empty($product->voucher_details)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Voucher Header Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->voucher_details as $voucherDetails): ?>
            <tr>
                <td><?= h($voucherDetails->id) ?></td>
                <td><?= h($voucherDetails->quantity) ?></td>
                <td><?= h($voucherDetails->price) ?></td>
                <td><?= h($voucherDetails->product_id) ?></td>
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

