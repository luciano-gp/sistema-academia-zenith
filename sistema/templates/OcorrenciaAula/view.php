<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciaAula $ocorrenciaAula
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ocorrencia Aula'), ['action' => 'edit', $ocorrenciaAula->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ocorrencia Aula'), ['action' => 'delete', $ocorrenciaAula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaAula->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ocorrencia Aula'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ocorrencia Aula'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ocorrenciaAula view content">
            <h3><?= h($ocorrenciaAula->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dia Semana') ?></th>
                    <td><?= h($ocorrenciaAula->dia_semana) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profissional') ?></th>
                    <td><?= h($ocorrenciaAula->profissional) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ocorrenciaAula->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Aula') ?></th>
                    <td><?= $this->Number->format($ocorrenciaAula->ref_aula) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vagas') ?></th>
                    <td><?= $ocorrenciaAula->vagas === null ? '' : $this->Number->format($ocorrenciaAula->vagas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Horario Inicial') ?></th>
                    <td><?= h($ocorrenciaAula->horario_inicial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Horario Final') ?></th>
                    <td><?= h($ocorrenciaAula->horario_final) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
