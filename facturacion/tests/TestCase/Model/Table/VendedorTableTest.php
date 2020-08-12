<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendedorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendedorTable Test Case
 */
class VendedorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendedorTable
     */
    public $Vendedor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Vendedor',
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
        $config = TableRegistry::getTableLocator()->exists('Vendedor') ? [] : ['className' => VendedorTable::class];
        $this->Vendedor = TableRegistry::getTableLocator()->get('Vendedor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vendedor);

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
