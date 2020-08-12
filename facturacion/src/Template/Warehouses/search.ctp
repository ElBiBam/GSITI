<table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($warehouses as $warehouse): ?>
                    <tr>
                        <td><?= $this->Number->format($warehouse->id) ?></td>
                        <td><?= h($warehouse->name) ?></td>
                        <td><?= $this->Number->format($warehouse->status) ?></td>
                        <td><?= h($warehouse->created) ?></td>
                        <td><?= h($warehouse->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $warehouse->id], ['class'=>'btn btn-sm btn-info']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $warehouse->id], ['class' =>'btn btn-sm btn-warning'] ) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $warehouse->id],
	 ['confirm' => __('Are you sure you want to delete # {0}?', $warehouse->id), 'class'=>'btn btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
