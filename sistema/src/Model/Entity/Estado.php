<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estado Entity
 *
 * @property int $id
 * @property string|null $nome
 */
class Estado extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
