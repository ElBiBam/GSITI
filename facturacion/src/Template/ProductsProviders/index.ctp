<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsProvider[]|\Cake\Collection\CollectionInterface $productsProviders
 */
?>
<!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet">
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
              
            <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
            </ul>
    </div>
</br>

<div class="row" background="">
    <div class="col-md-12">
        <div class='page-header'>
            <h3>
                <h3><?= __('Products Providers') ?></h3>
                
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).__('New'), ['controller' => 'ProductsProviders', 'action' => 'add'], ['class' => 
                'btn btn-sm btn-primary', 'escape' => false]) ?>
            </h3>
        </div>
        <div class="table-responsive">            
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('provider_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productsProviders as $productsProvider): ?>
                    <tr>
                        <td><?= $this->Number->format($productsProvider->id) ?></td>
                        <td><?= $productsProvider->has('product') ? $this->Html->link($productsProvider->product->id, ['controller' => 'Products', 'action' => 'view', $productsProvider->product->id]) : '' ?></td>
                        <td><?= $productsProvider->has('provider') ? $this->Html->link($productsProvider->provider->id, ['controller' => 'Providers', 'action' => 'view', $productsProvider->provider->id]) : '' ?></td>
                        <td><?= $this->Number->format($productsProvider->stock) ?></td>
                        <td><?= $this->Number->format($productsProvider->price) ?></td>
                        <td><?= h($productsProvider->date) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $productsProvider->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsProvider->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsProvider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsProvider->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>

        <div class="paginator">
                <ul class="pagination">    
                     <?php
                        echo $this->BootsCakePaginator->first();
                        echo $this->BootsCakePaginator->prev();
                        echo $this->BootsCakePaginator->numbers();
                        echo $this->BootsCakePaginator->next();
                        echo $this->BootsCakePaginator->last();
                     /*
                    $this->Paginator->templates([
                        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                    ]); ?>            
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous'), ['tag' => 'li', 'escape' => false], '<a href="#">&laquo;</a>', ['class' => 'prev disabled', 'tag' => 'li', 'escape' => false]) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>')*/ 
                    ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page').' {{page}} '.__('of').' {{pages}}, '.__('showing')
                .' {{current}} '.__('record').'(s) '.__('out of total').' {{count}} ']) ?></p>

        </div>
    </div>
</div>
