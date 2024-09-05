<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TreinoPessoa Entity
 *
 * @property int $ref_pessoa
 * @property int $ref_treino
 * @property \Cake\I18n\Date $dt_inicial
 * @property \Cake\I18n\Date|null $dt_final
 */
class TreinoPessoa extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
