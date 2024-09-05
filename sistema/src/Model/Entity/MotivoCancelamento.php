<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MotivoCancelamento Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $fl_gera_multa
 */
class MotivoCancelamento extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
