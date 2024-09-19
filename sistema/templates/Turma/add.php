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
            <?= $this->Html->link(__('List Turma'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="turma form content">
            <?= $this->Form->create($turma) ?>
            <fieldset>
                <legend><?= __('Add Turma') ?></legend>
                <?php
                    echo $this->Form->control('ref_pessoa');
                    echo $this->Form->control('ref_ocorrencia_aula');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
