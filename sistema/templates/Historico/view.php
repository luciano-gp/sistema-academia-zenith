<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Historico $historico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Historico'), ['action' => 'edit', $historico->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Historico'), ['action' => 'delete', $historico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historico->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Historico'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Historico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="historico view content">
            <h3><?= h($historico->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($historico->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($historico->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Indice Operacao') ?></th>
                    <td><?= $this->Number->format($historico->indice_operacao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
