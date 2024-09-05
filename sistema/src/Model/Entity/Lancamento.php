<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lancamento Entity
 *
 * @property int $id
 * @property float $valor
 * @property string $descricao
 * @property int $ref_titulo
 * @property int $ref_historico
 * @property \Cake\I18n\Date $dt_emissao
 * @property \Cake\I18n\Date $dt_contabil
 */
class Lancamento extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
