<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treino $treino
 * @var \Cake\Collection\CollectionInterface|string[] $exercicio
 * @var \Cake\Collection\CollectionInterface|string[] $pessoa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Treino'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="treino form content">
            <?= $this->Form->create($treino) ?>
            <fieldset>
                <legend><?= __('Add Treino') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('exercicio._ids', ['options' => $exercicio]);
                    echo $this->Form->control('pessoa._ids', ['options' => $pessoa]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
