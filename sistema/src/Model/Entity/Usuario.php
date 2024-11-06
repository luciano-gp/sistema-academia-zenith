<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $email
 * @property string $senha
 * @property int $tipo
 * @property bool $ativo
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Usuario extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'email' => true,
        'senha' => true,
        'tipo' => true,
        'ativo' => true,
        'pessoa' => true,
    ];

    protected array $_hidden = ['senha'];
}
