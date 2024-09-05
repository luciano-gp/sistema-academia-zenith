<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AulaPlano Entity
 *
 * @property int $ref_aula
 * @property int $ref_plano
 */
class AulaPlano extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
