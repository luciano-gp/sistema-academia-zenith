<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Turma Entity
 *
 * @property int $id
 * @property int $ref_pessoa
 * @property int $ref_ocorrencia_aula
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\OcorrenciaAula $ocorrencia_aula
 */
class Turma extends Entity
{
    protected array $_accessible = [
        '*' => true,
    ];
}
