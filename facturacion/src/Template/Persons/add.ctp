<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>


<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
            
                  <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add']) ?></li>
                    
            
            </ul>
</div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($person) ?>
        <fieldset>
            <legend><?= __('Add Person') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('surname');
                echo $this->Form->control('dni');
                echo $this->Form->control('phone');
                echo $this->Form->control('contact');
                echo $this->Form->control('code');
                echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
