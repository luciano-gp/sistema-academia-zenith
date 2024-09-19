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
            <?= $this->Html->link(__('Edit Forma Pagamento'), ['action' => 'edit', $formaPagamento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Forma Pagamento'), ['action' => 'delete', $formaPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formaPagamento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Forma Pagamento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forma Pagamento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="formaPagamento view content">
            <h3><?= h($formaPagamento->metodo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Metodo') ?></th>
                    <td><?= h($formaPagamento->metodo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($formaPagamento->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($formaPagamento->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
