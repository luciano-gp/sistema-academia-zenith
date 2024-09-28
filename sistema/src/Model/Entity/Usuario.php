<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $email
 * @property string $senha
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Usuario extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];

    protected function _setSenha($senha)
    {
        return Security::hash($senha);
    }
}
