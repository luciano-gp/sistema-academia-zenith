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
 * @property string $endereco
 * @property string $telefone
 * @property string|null $genero
 * @property int $ref_usuario
 * @property int $ref_cidade
 *
 * @property \App\Model\Entity\Treino[] $treino
 * @property \App\Model\Entity\Contrato[] $contrato
 * @property \App\Model\Entity\Turma[] $turma
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Cidade $cidade
 */
class Pessoa extends Entity
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
        'nome' => true,
        'dt_nascimento' => true,
        'cpf' => true,
        'endereco' => true,
        'telefone' => true,
        'genero' => true,
        'ref_usuario' => true,
        'ref_cidade' => true,
        'treino' => true,
        'contrato' => true,
        'turma' => true,
        'usuario' => true,
        'cidade' => true,
    ];
}
