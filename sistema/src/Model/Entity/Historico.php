<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Historico Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $indice_operacao
 */
class Historico extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
