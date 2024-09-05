<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cidade Entity
 *
 * @property int $id
 * @property int $ref_estado
 * @property string|null $nome
 */
class Cidade extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
