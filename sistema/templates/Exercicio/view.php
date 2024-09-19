<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercicio $exercicio
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exercicio'), ['action' => 'edit', $exercicio->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exercicio'), ['action' => 'delete', $exercicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercicio->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exercicio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exercicio'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="exercicio view content">
            <h3><?= h($exercicio->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($exercicio->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Video') ?></th>
                    <td><?= h($exercicio->video) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exercicio->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($exercicio->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Treino') ?></h4>
                <?php if (!empty($exercicio->treino)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exercicio->treino as $treino) : ?>
                        <tr>
                            <td><?= h($treino->id) ?></td>
                            <td><?= h($treino->descricao) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Treino', 'action' => 'view', $treino->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Treino', 'action' => 'edit', $treino->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Treino', 'action' => 'delete', $treino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treino->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
