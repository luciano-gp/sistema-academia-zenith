<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contrato'), ['action' => 'edit', $contrato->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contrato'), ['action' => 'delete', $contrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contrato'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contrato'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contrato view content">
            <h3><?= h($contrato->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Caminho Contrato') ?></th>
                    <td><?= h($contrato->caminho_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contrato->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Pessoa') ?></th>
                    <td><?= $this->Number->format($contrato->ref_pessoa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Plano') ?></th>
                    <td><?= $this->Number->format($contrato->ref_plano) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Motivo Cancelamento') ?></th>
                    <td><?= $contrato->ref_motivo_cancelamento === null ? '' : $this->Number->format($contrato->ref_motivo_cancelamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Meses Suspensao') ?></th>
                    <td><?= $contrato->meses_suspensao === null ? '' : $this->Number->format($contrato->meses_suspensao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Pessoa Indicacao') ?></th>
                    <td><?= $contrato->ref_pessoa_indicacao === null ? '' : $this->Number->format($contrato->ref_pessoa_indicacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Forma Pagamento') ?></th>
                    <td><?= $this->Number->format($contrato->ref_forma_pagamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Parcelas Pagamento') ?></th>
                    <td><?= $contrato->numero_parcelas_pagamento === null ? '' : $this->Number->format($contrato->numero_parcelas_pagamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Contratacao') ?></th>
                    <td><?= h($contrato->dt_contratacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Final') ?></th>
                    <td><?= h($contrato->dt_final) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Suspencao') ?></th>
                    <td><?= h($contrato->dt_suspencao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
