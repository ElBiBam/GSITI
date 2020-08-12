<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductoAlmacenFixture
 */
class ProductoAlmacenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'producto_almacen';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'almacen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'producto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_producto_almacen_almacen1_idx' => ['type' => 'index', 'columns' => ['almacen_id'], 'length' => []],
            'fk_producto_almacen_producto1_idx' => ['type' => 'index', 'columns' => ['producto_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_producto_almacen_almacen1' => ['type' => 'foreign', 'columns' => ['almacen_id'], 'references' => ['almacen', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_producto_almacen_producto1' => ['type' => 'foreign', 'columns' => ['producto_id'], 'references' => ['producto', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'almacen_id' => 1,
                'producto_id' => 1,
                'stock' => 1,
                'fecha' => '2019-05-29 22:24:37'
            ],
        ];
        parent::init();
    }
}
