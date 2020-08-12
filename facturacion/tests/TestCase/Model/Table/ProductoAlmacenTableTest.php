<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductoAlmacenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductoAlmacenTable Test Case
 */
class ProductoAlmacenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductoAlmacenTable
     */
    public $ProductoAlmacen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductoAlmacen',
        'app.Almacen',
        'app.Producto'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductoAlmacen') ? [] : ['className' => ProductoAlmacenTable::class];
        $this->ProductoAlmacen = TableRegistry::getTableLocator()->get('ProductoAlmacen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductoAlmacen);

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
