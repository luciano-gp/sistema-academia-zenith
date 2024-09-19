<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plano $plano
 * @var string[]|\Cake\Collection\CollectionInterface $aula
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plano->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plano->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Plano'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="plano form content">
            <?= $this->Form->create($plano) ?>
            <fieldset>
                <legend><?= __('Edit Plano') ?></legend>
                <?php
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('dt_inicio');
                    echo $this->Form->control('dt_fim', ['empty' => true]);
                    echo $this->Form->control('numero_meses_contrato');
                    echo $this->Form->control('valor_mensal');
                    echo $this->Form->control('modelo_contrato');
                    echo $this->Form->control('diarias');
                    echo $this->Form->control('ref_historico');
                    echo $this->Form->control('aula._ids', ['options' => $aula]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
