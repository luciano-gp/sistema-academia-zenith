<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pessoa'), ['action' => 'edit', $pessoa->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pessoa'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pessoa'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pessoa'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pessoa view content">
            <h3><?= h($pessoa->cpf) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($pessoa->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($pessoa->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genero') ?></th>
                    <td><?= h($pessoa->genero) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $pessoa->hasValue('usuario') ? $this->Html->link($pessoa->usuario->email, ['controller' => 'Usuario', 'action' => 'view', $pessoa->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pessoa->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Cidade') ?></th>
                    <td><?= $this->Number->format($pessoa->ref_cidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Nascimento') ?></th>
                    <td><?= h($pessoa->dt_nascimento) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Nome') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pessoa->nome)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Endereco') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pessoa->endereco)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Treino') ?></h4>
                <?php if (!empty($pessoa->treino)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pessoa->treino as $treino) : ?>
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
