<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RegistroPresenca> $registroPresenca
 */
?>
<div class="registroPresenca index content">
    <?= $this->Html->link(__('New Registro Presenca'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Registro Presenca') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dt_entrada') ?></th>
                    <th><?= $this->Paginator->sort('ref_pessoa') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registroPresenca as $registroPresenca): ?>
                <tr>
                    <td><?= $this->Number->format($registroPresenca->id) ?></td>
                    <td><?= h($registroPresenca->dt_entrada) ?></td>
                    <td><?= $this->Number->format($registroPresenca->ref_pessoa) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $registroPresenca->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registroPresenca->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registroPresenca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registroPresenca->id)]) ?>
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
