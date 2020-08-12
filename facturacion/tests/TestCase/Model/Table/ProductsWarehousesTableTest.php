<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsWarehousesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsWarehousesTable Test Case
 */
class ProductsWarehousesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsWarehousesTable
     */
    public $ProductsWarehouses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductsWarehouses',
        'app.Warehouses',
        'app.Products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductsWarehouses') ? [] : ['className' => ProductsWarehousesTable::class];
        $this->ProductsWarehouses = TableRegistry::getTableLocator()->get('ProductsWarehouses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsWarehouses);

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
