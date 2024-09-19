<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Plano> $plano
 */
?>
<div class="plano index content">
    <?= $this->Html->link(__('New Plano'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Plano') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('dt_inicio') ?></th>
                    <th><?= $this->Paginator->sort('dt_fim') ?></th>
                    <th><?= $this->Paginator->sort('numero_meses_contrato') ?></th>
                    <th><?= $this->Paginator->sort('valor_mensal') ?></th>
                    <th><?= $this->Paginator->sort('modelo_contrato') ?></th>
                    <th><?= $this->Paginator->sort('diarias') ?></th>
                    <th><?= $this->Paginator->sort('ref_historico') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plano as $plano): ?>
                <tr>
                    <td><?= $this->Number->format($plano->id) ?></td>
                    <td><?= h($plano->titulo) ?></td>
                    <td><?= h($plano->dt_inicio) ?></td>
                    <td><?= h($plano->dt_fim) ?></td>
                    <td><?= $plano->numero_meses_contrato === null ? '' : $this->Number->format($plano->numero_meses_contrato) ?></td>
                    <td><?= $this->Number->format($plano->valor_mensal) ?></td>
                    <td><?= h($plano->modelo_contrato) ?></td>
                    <td><?= $this->Number->format($plano->diarias) ?></td>
                    <td><?= $this->Number->format($plano->ref_historico) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $plano->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plano->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plano->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plano->id)]) ?>
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
