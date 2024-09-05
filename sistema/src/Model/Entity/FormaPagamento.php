<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FormaPagamento Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $metodo
 */
class FormaPagamento extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
