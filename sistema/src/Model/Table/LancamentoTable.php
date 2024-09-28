<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lancamento Model
 *
 * @method \App\Model\Entity\Lancamento newEmptyEntity()
 * @method \App\Model\Entity\Lancamento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Lancamento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lancamento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Lancamento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Lancamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Lancamento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lancamento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Lancamento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Lancamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lancamento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lancamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lancamento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lancamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lancamento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Lancamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Lancamento> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LancamentoTable extends Table
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

        $this->setTable('lancamento');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->belongsTo('Historico', [
            'foreignKey' => 'ref_historico',
        ]);

        $this->belongsTo('Titulo', [
            'foreignKey' => 'ref_titulo',
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
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->integer('ref_titulo')
            ->requirePresence('ref_titulo', 'create')
            ->notEmptyString('ref_titulo');

        $validator
            ->integer('ref_historico')
            ->requirePresence('ref_historico', 'create')
            ->notEmptyString('ref_historico');

        $validator
            ->date('dt_emissao')
            ->requirePresence('dt_emissao', 'create')
            ->notEmptyDate('dt_emissao');

        $validator
            ->date('dt_contabil')
            ->requirePresence('dt_contabil', 'create')
            ->notEmptyDate('dt_contabil');

        return $validator;
    }
}
