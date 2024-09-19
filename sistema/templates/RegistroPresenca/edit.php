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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $registroPresenca->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $registroPresenca->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Registro Presenca'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registroPresenca form content">
            <?= $this->Form->create($registroPresenca) ?>
            <fieldset>
                <legend><?= __('Edit Registro Presenca') ?></legend>
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
