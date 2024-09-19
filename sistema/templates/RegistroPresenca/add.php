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
            <?= $this->Html->link(__('List Registro Presenca'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registroPresenca form content">
            <?= $this->Form->create($registroPresenca) ?>
            <fieldset>
                <legend><?= __('Add Registro Presenca') ?></legend>
                <?php
                    echo $this->Form->control('dt_entrada');
                    echo $this->Form->control('ref_pessoa');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
