<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RegistroPresenca $registroPresenca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Registro Presenca'), ['action' => 'edit', $registroPresenca->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registro Presenca'), ['action' => 'delete', $registroPresenca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registroPresenca->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registro Presenca'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registro Presenca'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registroPresenca view content">
            <h3><?= h($registroPresenca->dt_entrada) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dt Entrada') ?></th>
                    <td><?= h($registroPresenca->dt_entrada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($registroPresenca->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Pessoa') ?></th>
                    <td><?= $this->Number->format($registroPresenca->ref_pessoa) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
