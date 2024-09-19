<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 * @var \Cake\Collection\CollectionInterface|string[] $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $treino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pessoa'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pessoa form content">
            <?= $this->Form->create($pessoa) ?>
            <fieldset>
                <legend><?= __('Add Pessoa') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('dt_nascimento');
                    echo $this->Form->control('cpf');
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('telefone');
                    echo $this->Form->control('genero');
                    echo $this->Form->control('ref_usuario', ['options' => $usuario]);
                    echo $this->Form->control('ref_cidade');
                    echo $this->Form->control('treino._ids', ['options' => $treino]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
