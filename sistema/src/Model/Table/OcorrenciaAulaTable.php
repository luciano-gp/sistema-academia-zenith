<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OcorrenciaAula Model
 *
 * @method \App\Model\Entity\OcorrenciaAula newEmptyEntity()
 * @method \App\Model\Entity\OcorrenciaAula newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\OcorrenciaAula> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciaAula get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\OcorrenciaAula findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\OcorrenciaAula patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\OcorrenciaAula> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciaAula|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\OcorrenciaAula saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\OcorrenciaAula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OcorrenciaAula>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OcorrenciaAula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OcorrenciaAula> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OcorrenciaAula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OcorrenciaAula>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OcorrenciaAula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OcorrenciaAula> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OcorrenciaAulaTable extends Table
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

        $this->setTable('ocorrencia_aula');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('ref_aula')
            ->requirePresence('ref_aula', 'create')
            ->notEmptyString('ref_aula');

        $validator
            ->integer('vagas')
            ->allowEmptyString('vagas');

        $validator
            ->scalar('dia_semana')
            ->maxLength('dia_semana', 45)
            ->allowEmptyString('dia_semana');

        $validator
            ->dateTime('horario_inicial')
            ->allowEmptyDateTime('horario_inicial');

        $validator
            ->dateTime('horario_final')
            ->allowEmptyDateTime('horario_final');

        $validator
            ->scalar('profissional')
            ->maxLength('profissional', 45)
            ->allowEmptyString('profissional');

        return $validator;
    }
}
