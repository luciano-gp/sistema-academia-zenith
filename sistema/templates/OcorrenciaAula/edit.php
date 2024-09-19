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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ocorrenciaAula->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaAula->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ocorrencia Aula'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ocorrenciaAula form content">
            <?= $this->Form->create($ocorrenciaAula) ?>
            <fieldset>
                <legend><?= __('Edit Ocorrencia Aula') ?></legend>
                <?php
                    echo $this->Form->control('ref_aula');
                    echo $this->Form->control('vagas');
                    echo $this->Form->control('dia_semana');
                    echo $this->Form->control('horario_inicial');
                    echo $this->Form->control('horario_final');
                    echo $this->Form->control('profissional');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
