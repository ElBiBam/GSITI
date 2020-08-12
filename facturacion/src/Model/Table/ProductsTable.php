<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductTypesTable|\Cake\ORM\Association\BelongsTo $ProductTypes
 * @property \App\Model\Table\VoucherDetailsTable|\Cake\ORM\Association\HasMany $VoucherDetails
 * @property \App\Model\Table\ProvidersTable|\Cake\ORM\Association\BelongsToMany $Providers
 * @property \App\Model\Table\WarehousesTable|\Cake\ORM\Association\BelongsToMany $Warehouses
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductTypes', [
            'foreignKey' => 'product_type_id'
        ]);
        $this->hasMany('VoucherDetails', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsToMany('Providers', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'provider_id',
            'joinTable' => 'products_providers'
        ]);
        $this->belongsToMany('Warehouses', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'warehouse_id',
            'joinTable' => 'products_warehouses'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 245)
            ->allowEmptyString('description')
            ->add('description', 'length', [
            'rule' => ['minLength', 3],
            'message' => __('Insert at least 3 characters.')
            ]);

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_type_id'], 'ProductTypes'));

        return $rules;
    }
}
