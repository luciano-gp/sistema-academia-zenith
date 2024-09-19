<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FormaPagamento $formaPagamento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formaPagamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formaPagamento->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Forma Pagamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="formaPagamento form content">
            <?= $this->Form->create($formaPagamento) ?>
            <fieldset>
                <legend><?= __('Edit Forma Pagamento') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('metodo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
