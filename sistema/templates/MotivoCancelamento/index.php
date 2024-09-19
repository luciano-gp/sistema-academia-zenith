<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MotivoCancelamento> $motivoCancelamento
 */
?>
<div class="motivoCancelamento index content">
    <?= $this->Html->link(__('New Motivo Cancelamento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Motivo Cancelamento') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('fl_gera_multa') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($motivoCancelamento as $motivoCancelamento): ?>
                <tr>
                    <td><?= $this->Number->format($motivoCancelamento->id) ?></td>
                    <td><?= h($motivoCancelamento->descricao) ?></td>
                    <td><?= $this->Number->format($motivoCancelamento->fl_gera_multa) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $motivoCancelamento->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $motivoCancelamento->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $motivoCancelamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $motivoCancelamento->id)]) ?>
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
