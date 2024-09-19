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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $motivoCancelamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $motivoCancelamento->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Motivo Cancelamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="motivoCancelamento form content">
            <?= $this->Form->create($motivoCancelamento) ?>
            <fieldset>
                <legend><?= __('Edit Motivo Cancelamento') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('fl_gera_multa');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
