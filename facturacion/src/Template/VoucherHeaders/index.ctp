<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VoucherHeader[]|\Cake\Collection\CollectionInterface $voucherHeaders
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
    .nav-scroller.bg-white.shadow-sm{
        margin-top: 10px;
    }
    
    </style>

<div  style="background: #0D1D52;">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                <?= $this->Html->link(__('List Voucher Types'), ['controller' => 'VoucherTypes', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= $this->Html->link(__('New Voucher Type'), ['controller' => 'VoucherTypes', 'action' => 'add'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= $this->Html->link(__('List Sellers'), ['controller' => 'Sellers', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= $this->Html->link(__('New Seller'), ['controller' => 'Sellers', 'action' => 'add'], ['class' => 'nav-link']) ?>
                </li><li class="nav-item">
                <?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                <?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add'], ['class' => 'nav-link']) ?>
                </li>
                <!--li class="nav-item">
                <a class="nav-link" href="/~u20180584/facturacion/voucher-details"><?=__("List Voucher Details")?></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/~u20180584/facturacion/voucher-details/add"><?=__("New Voucher Detail")?></a> 
                </li-->
                </ul>
</div>                      

<div class="row" background="">
    <div class="col-md-12">
        <div class='page-header'>
            <h3>
                <?= __('Vouchers') ?>
                
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).__('New')
                    , ['controller' => 'VoucherHeaders', 'action' => 'add'], ['class' => 
                'btn btn-sm btn-primary', 'escape' => false]) ?>
            </h3>

        <?=   $this->Form->control('search', ['label'=> __('Search by issue date')]); ?>

        </div>
        <div class="table-responsive">            
            <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('issue_date') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('voucher_type_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('seller_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voucherHeaders as $voucherHeader): ?>
                    <tr>
                        <td><?= $this->Number->format($voucherHeader->id) ?></td>
                        <td><?= h($voucherHeader->issue_date) ?></td>
                        <td><?= $voucherHeader->has('voucher_type') ? $this->Html->link($voucherHeader->voucher_type->name, ['controller' => 'VoucherTypes', 'action' => 'view', $voucherHeader->voucher_type->id]) : '' ?></td>
                        <td><?= $voucherHeader->has('seller') ? $this->Html->link($voucherHeader->seller->person->name, ['controller' => 'Sellers', 'action' => 'view', $voucherHeader->seller->id]) : '' ?></td>
                        <td><?= $voucherHeader->has('client') ? $this->Html->link($voucherHeader->client->person->name, ['controller' => 'Clients', 'action' => 'view', $voucherHeader->client->id]) : '' ?></td>
                        <td><?= $this->Number->format($voucherHeader->status) ?></td>
                        <td><?= h($voucherHeader->created) ?></td>
                        <td><?= h($voucherHeader->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $voucherHeader->id],['class'=>'btn btn-sm btn-info']  ) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $voucherHeader->id], ['class' =>'btn btn-sm btn-warning']  ) ?>
                         <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $voucherHeader->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $voucherHeader->id), 'class'=>'btn btn-sm btn-danger']) ?>
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
                        => 'VoucherHeaders' , 'action'=> 'Search']); ?>",
                    data: {keyword:data},

                    success: function( response){
                        $('.table-responsive').html(response);
                    }
                            
            });
        };
    });

    

</script>
