<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FormaPagamento> $formaPagamento
 */
?>
<div class="formaPagamento index content">
    <?= $this->Html->link(__('New Forma Pagamento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forma Pagamento') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('metodo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($formaPagamento as $formaPagamento): ?>
                <tr>
                    <td><?= $this->Number->format($formaPagamento->id) ?></td>
                    <td><?= h($formaPagamento->metodo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $formaPagamento->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formaPagamento->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formaPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formaPagamento->id)]) ?>
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
