<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Titulo $titulo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $titulo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $titulo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Titulo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="titulo form content">
            <?= $this->Form->create($titulo) ?>
            <fieldset>
                <legend><?= __('Edit Titulo') ?></legend>
                <?php
                    echo $this->Form->control('valor');
                    echo $this->Form->control('dt_vencimento');
                    echo $this->Form->control('num_parcela');
                    echo $this->Form->control('dt_emissao');
                    echo $this->Form->control('cod_boleto');
                    echo $this->Form->control('cod_barras');
                    echo $this->Form->control('dt_remessa', ['empty' => true]);
                    echo $this->Form->control('dt_retorno', ['empty' => true]);
                    echo $this->Form->control('ref_contrato');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
