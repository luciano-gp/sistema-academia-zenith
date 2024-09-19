<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercicio $exercicio
 * @var string[]|\Cake\Collection\CollectionInterface $treino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exercicio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exercicio->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exercicio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exercicio form content">
            <?= $this->Form->create($exercicio) ?>
            <fieldset>
                <legend><?= __('Edit Exercicio') ?></legend>
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
