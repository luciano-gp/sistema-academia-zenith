<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Historico> $historico
 */
?>
<div class="historico index content">
    <?= $this->Html->link(__('New Historico'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Historico') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('indice_operacao') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historico as $historico): ?>
                <tr>
                    <td><?= $this->Number->format($historico->id) ?></td>
                    <td><?= h($historico->descricao) ?></td>
                    <td><?= $this->Number->format($historico->indice_operacao) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $historico->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historico->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historico->id)]) ?>
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
