<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lancamento> $lancamento
 */
?>
<div class="lancamento index content">
    <?= $this->Html->link(__('New Lancamento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lancamento') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('ref_titulo') ?></th>
                    <th><?= $this->Paginator->sort('ref_historico') ?></th>
                    <th><?= $this->Paginator->sort('dt_emissao') ?></th>
                    <th><?= $this->Paginator->sort('dt_contabil') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lancamento as $lancamento): ?>
                <tr>
                    <td><?= $this->Number->format($lancamento->id) ?></td>
                    <td><?= $this->Number->format($lancamento->valor) ?></td>
                    <td><?= h($lancamento->descricao) ?></td>
                    <td><?= $this->Number->format($lancamento->ref_titulo) ?></td>
                    <td><?= $this->Number->format($lancamento->ref_historico) ?></td>
                    <td><?= h($lancamento->dt_emissao) ?></td>
                    <td><?= h($lancamento->dt_contabil) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lancamento->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lancamento->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lancamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lancamento->id)]) ?>
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
