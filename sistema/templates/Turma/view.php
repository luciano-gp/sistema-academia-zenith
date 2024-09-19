<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turma $turma
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Turma'), ['action' => 'edit', $turma->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Turma'), ['action' => 'delete', $turma->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turma->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Turma'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Turma'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="turma view content">
            <h3><?= h($turma->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($turma->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Pessoa') ?></th>
                    <td><?= $this->Number->format($turma->ref_pessoa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Ocorrencia Aula') ?></th>
                    <td><?= $this->Number->format($turma->ref_ocorrencia_aula) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
