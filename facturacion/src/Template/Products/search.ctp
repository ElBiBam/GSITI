<table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('nom_producto') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('product_type_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $this->Number->format($product->id) ?></td>
                        <td><?= h($product->nom_producto) ?></td>
                        <td><?= h($product->description) ?></td>
                        <td><?= $this->Number->format($product->precio) ?></td>
                        <td><?= $this->Number->format($product->quantity) ?></td>
                        <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                        <td><?= $this->Number->format($product->status) ?></td>
                        <td><?= h($product->created) ?></td>
                        <td><?= h($product->modified) ?></td>
                        <td class="actions">
                         	  <?= $this->Html->link(__('View'), ['action' => 'view', $product->id],['class'=>'btn btn-sm btn-info']  ) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' =>'btn btn-sm btn-warning']  ) ?>
                         <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], 
                     ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class'=>'btn btn-sm btn-danger']) ?>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
