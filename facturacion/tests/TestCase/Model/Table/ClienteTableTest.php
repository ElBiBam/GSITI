<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClienteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClienteTable Test Case
 */
class ClienteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClienteTable
     */
    public $Cliente;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cliente',
        'app.Persona',
        'app.ComprobanteCab'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cliente') ? [] : ['className' => ClienteTable::class];
        $this->Cliente = TableRegistry::getTableLocator()->get('Cliente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cliente);

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
