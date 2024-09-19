<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contrato'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contrato form content">
            <?= $this->Form->create($contrato) ?>
            <fieldset>
                <legend><?= __('Add Contrato') ?></legend>
                <?php
                    echo $this->Form->control('dt_contratacao');
                    echo $this->Form->control('dt_final', ['empty' => true]);
                    echo $this->Form->control('ref_pessoa');
                    echo $this->Form->control('ref_plano');
                    echo $this->Form->control('ref_motivo_cancelamento');
                    echo $this->Form->control('dt_suspencao', ['empty' => true]);
                    echo $this->Form->control('meses_suspensao');
                    echo $this->Form->control('ref_pessoa_indicacao');
                    echo $this->Form->control('caminho_contrato');
                    echo $this->Form->control('ref_forma_pagamento');
                    echo $this->Form->control('numero_parcelas_pagamento');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
