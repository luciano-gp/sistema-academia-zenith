<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Aula> $aula
 */
?>
<div class="aula index content">
    <?= $this->Html->link(__('New Aula'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Aula') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aula as $aula): ?>
                <tr>
                    <td><?= $this->Number->format($aula->id) ?></td>
                    <td><?= h($aula->nome) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $aula->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aula->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aula->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
