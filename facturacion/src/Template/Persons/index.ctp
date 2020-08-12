<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>

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
                <li class="nav-item">
        		<?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index'], ['class' => 'nav-link']) ?>
        	</li>
        	<li class="nav-item">
        		<?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add'], ['class' => 'nav-link']) ?>
        	</li>
            
	</ul>
</div>



<div class="row" background="">
    <div class="col-md-12">
        <div class='page-header'>
            <h3>
                <?= __('Persons') ?>
                
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).__('New'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 
                'btn btn-sm btn-primary', 'escape' => false]) ?>
            </h3>

    <?=   $this->Form->control('search', ['label'=> __('Search by name')]); ?>

        </div>
        <div class="table-responsive">            
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persons as $person): ?>
                    <tr>
                        <td><?= $this->Number->format($person->id) ?></td>
                        <td><?= h($person->name) ?></td>
                        <td><?= h($person->surname) ?></td>
                        <td><?= $this->Number->format($person->dni) ?></td>
                        <td><?= h($person->phone) ?></td>
                        <td><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td>
                        <td><?= $person->has('user') ? $this->Html->link($person->user->email, ['controller' => 'Users', 'action' => 'view', $person->user->id]) : '' ?></td>
                        <td><?= $this->Number->format($person->status) ?></td>
                        <td><?= h($person->created) ?></td>
                        <td><?= h($person->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $person->id], ['class'=>'btn btn-sm btn-info'] ) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id],  ['class' =>'btn btn-sm btn-warning'] ) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id],
	 ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class'=>'btn btn-sm btn-danger' ]) ?>
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
<script>
    $('document').ready(function(){
        $('#search').keyup(function(){
            var searchkey = $(this).val();
            searchTags( searchkey);
        });

        function searchTags( keyword){
            var data = keyword;
            $.ajax({

                    method: 'get',
                    url: "<?php echo $this->Url->build( ['controller'
                        => 'Persons' , 'action'=> 'Search']); ?>",
                    data: {keyword:data},

                    success: function( response){
                        $('.table-responsive').html(response);
                    }
                            
            });
        };
    });

</script>
