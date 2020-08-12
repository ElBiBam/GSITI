<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvidersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvidersTable Test Case
 */
class ProvidersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvidersTable
     */
    public $Providers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Providers',
        'app.Persons',
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
        $config = TableRegistry::getTableLocator()->exists('Providers') ? [] : ['className' => ProvidersTable::class];
        $this->Providers = TableRegistry::getTableLocator()->get('Providers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Providers);

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
