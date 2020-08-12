<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsProvidersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsProvidersTable Test Case
 */
class ProductsProvidersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsProvidersTable
     */
    public $ProductsProviders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductsProviders',
        'app.Products',
        'app.Providers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductsProviders') ? [] : ['className' => ProductsProvidersTable::class];
        $this->ProductsProviders = TableRegistry::getTableLocator()->get('ProductsProviders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsProviders);

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
