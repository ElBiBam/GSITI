<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComprobanteDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComprobanteDetTable Test Case
 */
class ComprobanteDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComprobanteDetTable
     */
    public $ComprobanteDet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ComprobanteDet',
        'app.Producto',
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
        $config = TableRegistry::getTableLocator()->exists('ComprobanteDet') ? [] : ['className' => ComprobanteDetTable::class];
        $this->ComprobanteDet = TableRegistry::getTableLocator()->get('ComprobanteDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ComprobanteDet);

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
