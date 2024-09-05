<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OcorrenciaAula Entity
 *
 * @property int $id
 * @property int $ref_aula
 * @property int|null $vagas
 * @property string|null $dia_semana
 * @property \Cake\I18n\DateTime|null $horario_inicial
 * @property \Cake\I18n\DateTime|null $horario_final
 * @property string|null $profissional
 */
class OcorrenciaAula extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
