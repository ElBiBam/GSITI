<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductoProveedorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductoProveedorTable Test Case
 */
class ProductoProveedorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductoProveedorTable
     */
    public $ProductoProveedor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductoProveedor',
        'app.Producto',
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
        $config = TableRegistry::getTableLocator()->exists('ProductoProveedor') ? [] : ['className' => ProductoProveedorTable::class];
        $this->ProductoProveedor = TableRegistry::getTableLocator()->get('ProductoProveedor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductoProveedor);

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
