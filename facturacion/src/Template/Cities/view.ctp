<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
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
            
                   <li class="nav-link"><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?></li>
                    <li class="nav-link"><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?></li>
                    <li class="nav-link"><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
                    <li class="nav-link"><?= $this->Html->link(__('New City'), ['action' => 'add']) ?></li>
                    <li class="nav-link"><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
                    <li class="nav-link"><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?></li>
                    
            
            </ul>
</div>

<div class="well">
    <h3><?= h($city->id) ?></h3>
    <table class="table table-bordered table-hover">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
    </table>
    <div class="well">
        <h4><?= __('Related Persons') ?></h4>
        <?php if (!empty($city->persons)): ?>
        <table class='table table-bordered table-hover' cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('Civil Status') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->persons as $persons): ?>
            <tr>
                <td><?= h($persons->id) ?></td>
                <td><?= h($persons->name) ?></td>
                <td><?= h($persons->surname) ?></td>
                <td><?= h($persons->civil_status) ?></td>
                <td><?= h($persons->phone) ?></td>
                <td><?= h($persons->contact) ?></td>
                <td><?= h($persons->code) ?></td>
                <td><?= h($persons->city_id) ?></td>
                <td><?= h($persons->user_id) ?></td>
                <td><?= h($persons->status) ?></td>
                <td><?= h($persons->created) ?></td>
                <td><?= h($persons->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Persons', 'action' => 'view', $persons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Persons', 'action' => 'edit', $persons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Persons', 'action' => 'delete', $persons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

