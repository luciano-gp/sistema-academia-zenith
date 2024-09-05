<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AulaPlano Model
 *
 * @method \App\Model\Entity\AulaPlano newEmptyEntity()
 * @method \App\Model\Entity\AulaPlano newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AulaPlano> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AulaPlano get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AulaPlano findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AulaPlano patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AulaPlano> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AulaPlano|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AulaPlano saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AulaPlano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AulaPlano>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AulaPlano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AulaPlano> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AulaPlano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AulaPlano>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AulaPlano>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AulaPlano> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AulaPlanoTable extends Table
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

        $this->setTable('aula_plano');
        $this->setDisplayField(['ref_aula', 'ref_plano']);
        $this->setPrimaryKey(['ref_aula', 'ref_plano']);
    }
}
