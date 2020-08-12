<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComprobanteCabFixture
 */
class ComprobanteCabFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'comprobante_cab';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha_emision' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_comprobante_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vendedor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cliente_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_comprobante_cab_tipo_comprobante1_idx' => ['type' => 'index', 'columns' => ['tipo_comprobante_id'], 'length' => []],
            'fk_comprobante_cab_vendedor1_idx' => ['type' => 'index', 'columns' => ['vendedor_id'], 'length' => []],
            'fk_comprobante_cab_cliente1_idx' => ['type' => 'index', 'columns' => ['cliente_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_comprobante_cab_cliente1' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['cliente', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_comprobante_cab_tipo_comprobante1' => ['type' => 'foreign', 'columns' => ['tipo_comprobante_id'], 'references' => ['tipo_comprobante', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_comprobante_cab_vendedor1' => ['type' => 'foreign', 'columns' => ['vendedor_id'], 'references' => ['vendedor', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'fecha_emision' => '2019-05-29 22:23:53',
                'tipo_comprobante_id' => 1,
                'vendedor_id' => 1,
                'cliente_id' => 1,
                'status' => 1,
                'created' => '2019-05-29 22:23:53',
                'modified' => '2019-05-29 22:23:53'
            ],
        ];
        parent::init();
    }
}
