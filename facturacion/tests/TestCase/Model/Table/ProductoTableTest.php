<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductoTable Test Case
 */
class ProductoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductoTable
     */
    public $Producto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Producto',
        'app.TipoProducto',
        'app.ComprobanteDet',
        'app.Almacen',
        'app.Proveedor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Producto') ? [] : ['className' => ProductoTable::class];
        $this->Producto = TableRegistry::getTableLocator()->get('Producto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Producto);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
