<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Titulo $titulo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Titulo'), ['action' => 'edit', $titulo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Titulo'), ['action' => 'delete', $titulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Titulo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Titulo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="titulo view content">
            <h3><?= h($titulo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cod Boleto') ?></th>
                    <td><?= h($titulo->cod_boleto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cod Barras') ?></th>
                    <td><?= h($titulo->cod_barras) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($titulo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($titulo->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num Parcela') ?></th>
                    <td><?= $this->Number->format($titulo->num_parcela) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Contrato') ?></th>
                    <td><?= $this->Number->format($titulo->ref_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Vencimento') ?></th>
                    <td><?= h($titulo->dt_vencimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Emissao') ?></th>
                    <td><?= h($titulo->dt_emissao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Remessa') ?></th>
                    <td><?= h($titulo->dt_remessa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Retorno') ?></th>
                    <td><?= h($titulo->dt_retorno) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
