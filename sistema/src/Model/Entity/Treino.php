<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treino Entity
 *
 * @property int $id
 * @property string $descricao
 *
 * @property \App\Model\Entity\Exercicio[] $exercicio
 * @property \App\Model\Entity\Pessoa[] $pessoa
 */
class Treino extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
