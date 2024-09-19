<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treino $treino
 * @var string[]|\Cake\Collection\CollectionInterface $exercicio
 * @var string[]|\Cake\Collection\CollectionInterface $pessoa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $treino->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $treino->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Treino'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="treino form content">
            <?= $this->Form->create($treino) ?>
            <fieldset>
                <legend><?= __('Edit Treino') ?></legend>
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
