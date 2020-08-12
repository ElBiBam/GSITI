  <table class='table'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('code') ?></th>
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
                        <td><?= h($person->contact) ?></td>
                        <td><?= h($person->code) ?></td>
                        <td><?= $person->has('city') ? $this->Html->link($person->city->name, ['controller' => 'Cities', 'action' => 'view', $person->city->id]) : '' ?></td>
                        <td><?= $person->has('user') ? $this->Html->link($person->user->email, ['controller' => 'Users', 'action' => 'view', $person->user->id]) : '' ?></td>
                        <td><?= $this->Number->format($person->status) ?></td>
                        <td><?= h($person->created) ?></td>
                        <td><?= h($person->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $person->id],  ['class'=>'btn btn-sm btn-info'] ) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id],['class' =>'btn btn-sm btn-warning']   ) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], 
			['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class'=>'btn btn-sm btn-danger' ]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
