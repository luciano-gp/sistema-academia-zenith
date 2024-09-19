<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 * @var string[]|\Cake\Collection\CollectionInterface $plano
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aula->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aula->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Aula'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="aula form content">
            <?= $this->Form->create($aula) ?>
            <fieldset>
                <legend><?= __('Edit Aula') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('plano._ids', ['options' => $plano]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
