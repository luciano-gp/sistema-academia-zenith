<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Titulo Model
 *
 * @method \App\Model\Entity\Titulo newEmptyEntity()
 * @method \App\Model\Entity\Titulo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Titulo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Titulo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Titulo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Titulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Titulo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Titulo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Titulo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Titulo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Titulo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Titulo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Titulo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Titulo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Titulo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Titulo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Titulo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TituloTable extends Table
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

        $this->setTable('titulo');
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
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->date('dt_vencimento')
            ->requirePresence('dt_vencimento', 'create')
            ->notEmptyDate('dt_vencimento');

        $validator
            ->integer('num_parcela')
            ->requirePresence('num_parcela', 'create')
            ->notEmptyString('num_parcela');

        $validator
            ->date('dt_emissao')
            ->requirePresence('dt_emissao', 'create')
            ->notEmptyDate('dt_emissao');

        $validator
            ->scalar('cod_boleto')
            ->maxLength('cod_boleto', 45)
            ->allowEmptyString('cod_boleto');

        $validator
            ->scalar('cod_barras')
            ->maxLength('cod_barras', 45)
            ->allowEmptyString('cod_barras');

        $validator
            ->date('dt_remessa')
            ->allowEmptyDate('dt_remessa');

        $validator
            ->date('dt_retorno')
            ->allowEmptyDate('dt_retorno');

        $validator
            ->integer('ref_contrato')
            ->requirePresence('ref_contrato', 'create')
            ->notEmptyString('ref_contrato');

        return $validator;
    }
}
