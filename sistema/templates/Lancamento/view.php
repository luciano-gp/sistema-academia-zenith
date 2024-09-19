<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lancamento $lancamento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lancamento'), ['action' => 'edit', $lancamento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lancamento'), ['action' => 'delete', $lancamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lancamento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lancamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lancamento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lancamento view content">
            <h3><?= h($lancamento->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($lancamento->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lancamento->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($lancamento->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Titulo') ?></th>
                    <td><?= $this->Number->format($lancamento->ref_titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Historico') ?></th>
                    <td><?= $this->Number->format($lancamento->ref_historico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Emissao') ?></th>
                    <td><?= h($lancamento->dt_emissao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Contabil') ?></th>
                    <td><?= h($lancamento->dt_contabil) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
