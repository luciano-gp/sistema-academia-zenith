<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treino $treino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Treino'), ['action' => 'edit', $treino->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Treino'), ['action' => 'delete', $treino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treino->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Treino'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Treino'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="treino view content">
            <h3><?= h($treino->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($treino->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($treino->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Exercicio') ?></h4>
                <?php if (!empty($treino->exercicio)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Video') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($treino->exercicio as $exercicio) : ?>
                        <tr>
                            <td><?= h($exercicio->id) ?></td>
                            <td><?= h($exercicio->nome) ?></td>
                            <td><?= h($exercicio->video) ?></td>
                            <td><?= h($exercicio->descricao) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Exercicio', 'action' => 'view', $exercicio->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Exercicio', 'action' => 'edit', $exercicio->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercicio', 'action' => 'delete', $exercicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercicio->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Pessoa') ?></h4>
                <?php if (!empty($treino->pessoa)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Dt Nascimento') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Endereco') ?></th>
                            <th><?= __('Telefone') ?></th>
                            <th><?= __('Genero') ?></th>
                            <th><?= __('Ref Usuario') ?></th>
                            <th><?= __('Ref Cidade') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($treino->pessoa as $pessoa) : ?>
                        <tr>
                            <td><?= h($pessoa->id) ?></td>
                            <td><?= h($pessoa->nome) ?></td>
                            <td><?= h($pessoa->dt_nascimento) ?></td>
                            <td><?= h($pessoa->cpf) ?></td>
                            <td><?= h($pessoa->endereco) ?></td>
                            <td><?= h($pessoa->telefone) ?></td>
                            <td><?= h($pessoa->genero) ?></td>
                            <td><?= h($pessoa->ref_usuario) ?></td>
                            <td><?= h($pessoa->ref_cidade) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pessoa', 'action' => 'view', $pessoa->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pessoa', 'action' => 'edit', $pessoa->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pessoa', 'action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?>
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
