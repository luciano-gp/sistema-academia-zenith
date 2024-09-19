<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contrato> $contrato
 */
?>
<div class="contrato index content">
    <?= $this->Html->link(__('New Contrato'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contrato') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dt_contratacao') ?></th>
                    <th><?= $this->Paginator->sort('dt_final') ?></th>
                    <th><?= $this->Paginator->sort('ref_pessoa') ?></th>
                    <th><?= $this->Paginator->sort('ref_plano') ?></th>
                    <th><?= $this->Paginator->sort('ref_motivo_cancelamento') ?></th>
                    <th><?= $this->Paginator->sort('dt_suspencao') ?></th>
                    <th><?= $this->Paginator->sort('meses_suspensao') ?></th>
                    <th><?= $this->Paginator->sort('ref_pessoa_indicacao') ?></th>
                    <th><?= $this->Paginator->sort('caminho_contrato') ?></th>
                    <th><?= $this->Paginator->sort('ref_forma_pagamento') ?></th>
                    <th><?= $this->Paginator->sort('numero_parcelas_pagamento') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contrato as $contrato): ?>
                <tr>
                    <td><?= $this->Number->format($contrato->id) ?></td>
                    <td><?= h($contrato->dt_contratacao) ?></td>
                    <td><?= h($contrato->dt_final) ?></td>
                    <td><?= $this->Number->format($contrato->ref_pessoa) ?></td>
                    <td><?= $this->Number->format($contrato->ref_plano) ?></td>
                    <td><?= $contrato->ref_motivo_cancelamento === null ? '' : $this->Number->format($contrato->ref_motivo_cancelamento) ?></td>
                    <td><?= h($contrato->dt_suspencao) ?></td>
                    <td><?= $contrato->meses_suspensao === null ? '' : $this->Number->format($contrato->meses_suspensao) ?></td>
                    <td><?= $contrato->ref_pessoa_indicacao === null ? '' : $this->Number->format($contrato->ref_pessoa_indicacao) ?></td>
                    <td><?= h($contrato->caminho_contrato) ?></td>
                    <td><?= $this->Number->format($contrato->ref_forma_pagamento) ?></td>
                    <td><?= $contrato->numero_parcelas_pagamento === null ? '' : $this->Number->format($contrato->numero_parcelas_pagamento) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contrato->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contrato->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id)]) ?>
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
