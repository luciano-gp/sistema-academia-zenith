<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercicio $exercicio
 * @var \Cake\Collection\CollectionInterface|string[] $treino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Exercicio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exercicio form content">
            <?= $this->Form->create($exercicio) ?>
            <fieldset>
                <legend><?= __('Add Exercicio') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('video');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('treino._ids', ['options' => $treino]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
