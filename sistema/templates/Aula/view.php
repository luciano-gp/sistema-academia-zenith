<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Aula'), ['action' => 'edit', $aula->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Aula'), ['action' => 'delete', $aula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aula->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Aula'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Aula'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="aula view content">
            <h3><?= h($aula->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($aula->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($aula->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($aula->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Plano') ?></h4>
                <?php if (!empty($aula->plano)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Titulo') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Dt Inicio') ?></th>
                            <th><?= __('Dt Fim') ?></th>
                            <th><?= __('Numero Meses Contrato') ?></th>
                            <th><?= __('Valor Mensal') ?></th>
                            <th><?= __('Modelo Contrato') ?></th>
                            <th><?= __('Diarias') ?></th>
                            <th><?= __('Ref Historico') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($aula->plano as $plano) : ?>
                        <tr>
                            <td><?= h($plano->id) ?></td>
                            <td><?= h($plano->titulo) ?></td>
                            <td><?= h($plano->descricao) ?></td>
                            <td><?= h($plano->dt_inicio) ?></td>
                            <td><?= h($plano->dt_fim) ?></td>
                            <td><?= h($plano->numero_meses_contrato) ?></td>
                            <td><?= h($plano->valor_mensal) ?></td>
                            <td><?= h($plano->modelo_contrato) ?></td>
                            <td><?= h($plano->diarias) ?></td>
                            <td><?= h($plano->ref_historico) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Plano', 'action' => 'view', $plano->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Plano', 'action' => 'edit', $plano->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Plano', 'action' => 'delete', $plano->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plano->id)]) ?>
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
