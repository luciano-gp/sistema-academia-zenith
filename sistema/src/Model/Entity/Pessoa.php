<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\Date $dt_nascimento
 * @property string $cpf
 * @property string $email
 * @property string $endereco
 * @property string $telefone
 * @property string|null $genero
 * @property int $ref_cidade
 *
 * @property \App\Model\Entity\Treino[] $treino
 */
class Pessoa extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
