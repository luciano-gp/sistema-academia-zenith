<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aula Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property \App\Model\Entity\Plano[] $plano
 */
class Aula extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
