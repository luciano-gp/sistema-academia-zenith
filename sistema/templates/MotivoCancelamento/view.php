<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MotivoCancelamento $motivoCancelamento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Motivo Cancelamento'), ['action' => 'edit', $motivoCancelamento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Motivo Cancelamento'), ['action' => 'delete', $motivoCancelamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $motivoCancelamento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Motivo Cancelamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Motivo Cancelamento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="motivoCancelamento view content">
            <h3><?= h($motivoCancelamento->descricao) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($motivoCancelamento->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($motivoCancelamento->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fl Gera Multa') ?></th>
                    <td><?= $this->Number->format($motivoCancelamento->fl_gera_multa) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
