<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Titulo> $titulo
 */
?>
<div class="titulo index content">
    <?= $this->Html->link(__('New Titulo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Titulo') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('dt_vencimento') ?></th>
                    <th><?= $this->Paginator->sort('num_parcela') ?></th>
                    <th><?= $this->Paginator->sort('dt_emissao') ?></th>
                    <th><?= $this->Paginator->sort('cod_boleto') ?></th>
                    <th><?= $this->Paginator->sort('cod_barras') ?></th>
                    <th><?= $this->Paginator->sort('dt_remessa') ?></th>
                    <th><?= $this->Paginator->sort('dt_retorno') ?></th>
                    <th><?= $this->Paginator->sort('ref_contrato') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($titulo as $titulo): ?>
                <tr>
                    <td><?= $this->Number->format($titulo->id) ?></td>
                    <td><?= $this->Number->format($titulo->valor) ?></td>
                    <td><?= h($titulo->dt_vencimento) ?></td>
                    <td><?= $this->Number->format($titulo->num_parcela) ?></td>
                    <td><?= h($titulo->dt_emissao) ?></td>
                    <td><?= h($titulo->cod_boleto) ?></td>
                    <td><?= h($titulo->cod_barras) ?></td>
                    <td><?= h($titulo->dt_remessa) ?></td>
                    <td><?= h($titulo->dt_retorno) ?></td>
                    <td><?= $this->Number->format($titulo->ref_contrato) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $titulo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $titulo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $titulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id)]) ?>
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
