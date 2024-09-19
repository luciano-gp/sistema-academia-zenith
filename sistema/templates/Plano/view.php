<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plano $plano
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Plano'), ['action' => 'edit', $plano->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Plano'), ['action' => 'delete', $plano->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plano->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Plano'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Plano'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="plano view content">
            <h3><?= h($plano->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($plano->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modelo Contrato') ?></th>
                    <td><?= h($plano->modelo_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($plano->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Meses Contrato') ?></th>
                    <td><?= $plano->numero_meses_contrato === null ? '' : $this->Number->format($plano->numero_meses_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Mensal') ?></th>
                    <td><?= $this->Number->format($plano->valor_mensal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diarias') ?></th>
                    <td><?= $this->Number->format($plano->diarias) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref Historico') ?></th>
                    <td><?= $this->Number->format($plano->ref_historico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Inicio') ?></th>
                    <td><?= h($plano->dt_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dt Fim') ?></th>
                    <td><?= h($plano->dt_fim) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($plano->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Aula') ?></h4>
                <?php if (!empty($plano->aula)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($plano->aula as $aula) : ?>
                        <tr>
                            <td><?= h($aula->id) ?></td>
                            <td><?= h($aula->nome) ?></td>
                            <td><?= h($aula->descricao) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Aula', 'action' => 'view', $aula->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Aula', 'action' => 'edit', $aula->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aula', 'action' => 'delete', $aula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aula->id)]) ?>
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
