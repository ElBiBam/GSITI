<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoComprobanteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoComprobanteTable Test Case
 */
class TipoComprobanteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoComprobanteTable
     */
    public $TipoComprobante;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TipoComprobante',
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
        $config = TableRegistry::getTableLocator()->exists('TipoComprobante') ? [] : ['className' => TipoComprobanteTable::class];
        $this->TipoComprobante = TableRegistry::getTableLocator()->get('TipoComprobante', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoComprobante);

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
}
