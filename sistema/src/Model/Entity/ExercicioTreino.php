<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExercicioTreino Entity
 *
 * @property int $ref_exercicio
 * @property int $ref_treino
 * @property int|null $num_series
 * @property int|null $num_repeticoes
 * @property int|null $carga
 * @property string|null $observacao
 */
class ExercicioTreino extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
