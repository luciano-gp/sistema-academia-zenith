<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contrato Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $dt_contratacao
 * @property \Cake\I18n\DateTime|null $dt_final
 * @property int $ref_pessoa
 * @property int $ref_plano
 * @property int|null $ref_motivo_cancelamento
 * @property \Cake\I18n\DateTime|null $dt_suspencao
 * @property int|null $meses_suspensao
 * @property int|null $ref_pessoa_indicacao
 * @property string|null $caminho_contrato
 * @property int $ref_forma_pagamento
 * @property int|null $numero_parcelas_pagamento
 */
class Contrato extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
