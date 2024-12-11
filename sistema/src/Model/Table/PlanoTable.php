<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plano Model
 *
 * @property \App\Model\Table\AulaTable&\Cake\ORM\Association\BelongsToMany $Aula
 *
 * @method \App\Model\Entity\Plano newEmptyEntity()
 * @method \App\Model\Entity\Plano newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Plano> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plano get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Plano findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Plano patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Plano> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plano|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Plano saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Plano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Plano>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Plano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Plano> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Plano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Plano>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Plano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Plano> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PlanoTable extends Table
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

        $this->setTable('plano');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Aula', [
            'foreignKey' => 'ref_aula',
            'targetForeignKey' => 'ref_plano',
            'joinTable' => 'aula_plano',
        ]);

        $this->belongsTo('Historico', [
            'foreignKey' => 'ref_historico',
        ]);

        $this->hasMany('Contrato', [
            'foreignKey' => 'ref_plano',
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
            ->scalar('titulo')
            ->maxLength('titulo', 45)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->dateTime('dt_inicio')
            ->requirePresence('dt_inicio', 'create')
            ->notEmptyDateTime('dt_inicio');

        $validator
            ->dateTime('dt_fim')
            ->allowEmptyDateTime('dt_fim');

        $validator
            ->integer('numero_meses_contrato')
            ->allowEmptyString('numero_meses_contrato');

        $validator
            ->numeric('valor_mensal')
            ->requirePresence('valor_mensal', 'create')
            ->notEmptyString('valor_mensal');

        $validator
            ->scalar('modelo_contrato')
            ->maxLength('modelo_contrato', 45)
            ->requirePresence('modelo_contrato', 'create')
            ->notEmptyString('modelo_contrato');

        $validator
            ->integer('diarias')
            ->requirePresence('diarias', 'create')
            ->notEmptyString('diarias');

        $validator
            ->integer('ref_historico')
            ->requirePresence('ref_historico', 'create')
            ->notEmptyString('ref_historico');

        return $validator;
    }
}
