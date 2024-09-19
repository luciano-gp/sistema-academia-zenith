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
            <?= $this->Html->link(__('List Historico'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="historico form content">
            <?= $this->Form->create($historico) ?>
            <fieldset>
                <legend><?= __('Add Historico') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('indice_operacao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
