<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lancamento $lancamento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lancamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lancamento->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lancamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="lancamento form content">
            <?= $this->Form->create($lancamento) ?>
            <fieldset>
                <legend><?= __('Edit Lancamento') ?></legend>
                <?php
                    echo $this->Form->control('valor');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('ref_titulo');
                    echo $this->Form->control('ref_historico');
                    echo $this->Form->control('dt_emissao');
                    echo $this->Form->control('dt_contabil');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
