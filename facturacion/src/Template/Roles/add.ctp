<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              
                   <li><?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
            </ul>
    </div>
</br>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($role) ?>
        <fieldset>
            <legend><?= __('Add Role') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('status', ['type' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

