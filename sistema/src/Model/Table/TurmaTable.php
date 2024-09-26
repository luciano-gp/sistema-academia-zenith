<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turma Model
 *
 * @method \App\Model\Entity\Turma newEmptyEntity()
 * @method \App\Model\Entity\Turma newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Turma> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turma get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Turma findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Turma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Turma> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turma|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Turma saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Turma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Turma>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Turma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Turma> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Turma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Turma>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Turma>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Turma> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TurmaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('turma');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasOne('Pessoa', [
            'foreignKey' => 'ref_pessoa',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('ref_pessoa')
            ->requirePresence('ref_pessoa', 'create')
            ->notEmptyString('ref_pessoa');

        $validator
            ->integer('ref_ocorrencia_aula')
            ->requirePresence('ref_ocorrencia_aula', 'create')
            ->notEmptyString('ref_ocorrencia_aula');

        return $validator;
    }
}
