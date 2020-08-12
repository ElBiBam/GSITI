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
                            <?= $this->Html->link(__('View'), ['action' => 'view', $voucherHeader->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $voucherHeader->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $voucherHeader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucherHeader->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>