<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoProductoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoProductoTable Test Case
 */
class TipoProductoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoProductoTable
     */
    public $TipoProducto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TipoProducto',
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
        $config = TableRegistry::getTableLocator()->exists('TipoProducto') ? [] : ['className' => TipoProductoTable::class];
        $this->TipoProducto = TableRegistry::getTableLocator()->get('TipoProducto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoProducto);

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
