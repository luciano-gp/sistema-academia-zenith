<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RegistroPresenca Entity
 *
 * @property int $id
 * @property string $dt_entrada
 * @property int $ref_pessoa
 */
class RegistroPresenca extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
