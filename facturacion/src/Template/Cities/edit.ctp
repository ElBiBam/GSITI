<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
              <li class="nav-item">
        <a class="nav-link"href="/~u20180584/facturacion/cities/index"><?=__('List Cities')?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/persons"><?=__('List Persons')?></a> 
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/~u20180584/facturacion/persons/add"><?=__('New Person')?></a>
        </li>
            </ul>
    </div>

</br>

<div class="row">
    <div class="col-md-6 col-md-offset-3">        
        <?= $this->Form->create($city) ?>
        <fieldset>
            <legend><?= __('Edit City') ?></legend>
            <?php
                echo $this->Form->control(__('name'));                
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
