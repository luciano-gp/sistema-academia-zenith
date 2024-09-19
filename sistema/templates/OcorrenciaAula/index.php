<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OcorrenciaAula> $ocorrenciaAula
 */
?>
<div class="ocorrenciaAula index content">
    <?= $this->Html->link(__('New Ocorrencia Aula'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ocorrencia Aula') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ref_aula') ?></th>
                    <th><?= $this->Paginator->sort('vagas') ?></th>
                    <th><?= $this->Paginator->sort('dia_semana') ?></th>
                    <th><?= $this->Paginator->sort('horario_inicial') ?></th>
                    <th><?= $this->Paginator->sort('horario_final') ?></th>
                    <th><?= $this->Paginator->sort('profissional') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ocorrenciaAula as $ocorrenciaAula): ?>
                <tr>
                    <td><?= $this->Number->format($ocorrenciaAula->id) ?></td>
                    <td><?= $this->Number->format($ocorrenciaAula->ref_aula) ?></td>
                    <td><?= $ocorrenciaAula->vagas === null ? '' : $this->Number->format($ocorrenciaAula->vagas) ?></td>
                    <td><?= h($ocorrenciaAula->dia_semana) ?></td>
                    <td><?= h($ocorrenciaAula->horario_inicial) ?></td>
                    <td><?= h($ocorrenciaAula->horario_final) ?></td>
                    <td><?= h($ocorrenciaAula->profissional) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ocorrenciaAula->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ocorrenciaAula->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ocorrenciaAula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaAula->id)]) ?>
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
