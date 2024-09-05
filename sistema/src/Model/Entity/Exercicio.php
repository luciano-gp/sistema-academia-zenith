<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exercicio Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $video
 * @property string|null $descricao
 *
 * @property \App\Model\Entity\Treino[] $treino
 */
class Exercicio extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
