<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Titulo Entity
 *
 * @property int $id
 * @property float $valor
 * @property \Cake\I18n\Date $dt_vencimento
 * @property int $num_parcela
 * @property \Cake\I18n\Date $dt_emissao
 * @property string|null $cod_boleto
 * @property string|null $cod_barras
 * @property \Cake\I18n\Date|null $dt_remessa
 * @property \Cake\I18n\Date|null $dt_retorno
 * @property int $ref_contrato
 */
class Titulo extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
