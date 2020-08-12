<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                    <li><?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Rol'), ['controller' => 'Roles', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?=__('Add User')?></legend>
            <?php
                echo $this->Form->control('email');
                echo $this->Form->control('password');
                echo $this->Form->control('role_id', ['options' => $roles]);
                //echo $this->Form->control('token');
                //echo $this->Form->control('verification', ['type' => 'checkbox']);
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
