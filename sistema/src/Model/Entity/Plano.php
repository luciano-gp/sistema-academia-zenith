<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plano Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property \Cake\I18n\DateTime $dt_inicio
 * @property \Cake\I18n\DateTime|null $dt_fim
 * @property int|null $numero_meses_contrato
 * @property float $valor_mensal
 * @property string $modelo_contrato
 * @property int $diarias
 * @property int $ref_historico
 *
 * @property \App\Model\Entity\Aula[] $aula
 */
class Plano extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
